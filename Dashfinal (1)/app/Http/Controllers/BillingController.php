<?php

namespace App\Http\Controllers;

use App\Models\Custmer;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        // Get all billing orders with customer info
        $billings = ProductOrder::join('customers', 'customers.id', '=', 'product_orders.user_id')
            ->select(
                'product_orders.*',
                'customers.name',
                'customers.address',
                'customers.phone_number',
                'customers.city',
                'customers.state'
            )
            ->orderBy('product_orders.created_at', 'desc')
            ->get();

        // Summary stats
        $totalBilled = ProductOrder::sum('total');
        $totalOrders = ProductOrder::count();
        $todayBilled = ProductOrder::whereDate('created_at', Carbon::today())->sum('total');
        $todayOrders = ProductOrder::whereDate('created_at', Carbon::today())->count();

        // Status-wise breakdown
        $paidCount = ProductOrder::where('status', 'Delivered')->count();
        $pendingCount = ProductOrder::where('status', 'Pending')->count();
        $cancelledCount = ProductOrder::whereIn('status', ['Cancelled', 'Rejected'])->count();

        // Monthly revenue for chart (last 6 months)
        $monthlyRevenue = ProductOrder::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(total) as revenue')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $status = OrderStatus::all();

        return view('pages.billing', compact(
            'billings',
            'totalBilled',
            'totalOrders',
            'todayBilled',
            'todayOrders',
            'paidCount',
            'pendingCount',
            'cancelledCount',
            'monthlyRevenue',
            'status'
        ));
    }

    public function create()
    {
        // Get all categories ordered by name
        $categories = \App\Models\Category::orderBy('category_name')->get();
        $categoryIds = $categories->pluck('id')->toArray();
        
        // Fetch ALL products from the database
        $allProducts = \App\Models\Product::all();
        $groupedProducts = $allProducts->groupBy('category_id');

        // Identify products that may not be in the current categories list (missing or null category)
        $uncategorized = $allProducts->filter(function($product) use ($categoryIds) {
            return !in_array($product->category_id, $categoryIds);
        });

        return view('pages.create-bill', compact('categories', 'groupedProducts', 'uncategorized'));
    }

    public function store(Request $request)
    {
        // 1. Validate incoming request structure
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_phone'   => 'required|string|max:20',
            'customer_address' => 'nullable|string|max:500',
            'products'         => 'required|array',
            'prices'           => 'required|array',
        ]);

        // 2. Build validated item list — quantity must be a positive integer
        $selectedItems = [];

        foreach ($request->products as $productId => $qty) {
            $qty = (int) $qty;
            if ($qty <= 0) continue;

            // 3. SECURITY: Fetch the canonical price directly from DB — never trust the client price
            $productModel = Product::find((int) $productId);

            if (!$productModel) {
                return redirect()->back()->with('error', "Product ID {$productId} not found in the catalog.");
            }

            // 4. SERVER-SIDE STOCK VALIDATION — prevent overselling
            // if ($productModel->product_stock < $qty) {
            //     return redirect()->back()->with(
            //         'error',
            //         "Insufficient stock for \"{$productModel->product_name}\". Available: {$productModel->product_stock}, Requested: {$qty}."
            //     );
            // }

            $canonicalPrice = floatval($productModel->product_regular_price ?? $productModel->product_mrp_price);

            $selectedItems[$productId] = [
                'qty'          => $qty,
                'price'        => $canonicalPrice,
                'product_name' => $productModel->product_name,
                'model'        => $productModel,
            ];
        }

        if (empty($selectedItems)) {
            return redirect()->back()->with('error', 'Please select at least one product with a valid quantity.');
        }

        // 5. Calculate verified subtotal from server-side prices only
        $subTotal = collect($selectedItems)->sum(fn($item) => $item['price'] * $item['qty']);

        // 6. Wrap ALL database writes in a transaction — atomic operation
        try {
            DB::transaction(function () use ($request, $selectedItems, $subTotal) {

                // Find or create customer
                $customer = Custmer::firstOrCreate(
                    ['phone_number' => $request->customer_phone],
                    [
                        'name'     => $request->customer_name,
                        'address'  => $request->customer_address ?? '',
                        'city'     => '',
                        'state'    => '',
                        'pincode'  => '',
                    ]
                );

                // Update customer info if it has changed
                $dirty = false;
                if ($customer->name !== $request->customer_name) {
                    $customer->name = $request->customer_name;
                    $dirty = true;
                }
                if (!empty($request->customer_address) && $customer->address !== $request->customer_address) {
                    $customer->address = $request->customer_address;
                    $dirty = true;
                }
                if ($dirty) $customer->save();

                // Generate unique Order ID
                $maxValue = ProductOrder::lockForUpdate()->max('id');
                $invID    = ($maxValue !== null) ? $maxValue + 1 : 1;
                $orderId  = 'order' . str_pad($invID, 5, '0', STR_PAD_LEFT);

                // Create the master order record
                $order               = new ProductOrder();
                $order->oeder_id     = $orderId;
                $order->user_id      = $customer->id;
                $order->name         = $customer->name;
                $order->address      = $customer->address;
                $order->sub_total    = $subTotal;
                $order->discount     = 0;
                $order->shipping     = 0;
                $order->total        = $subTotal;
                $order->status       = 'Pending';
                $order->order_source = 'billing';
                $order->save();

                // Insert line items and decrement stock
                foreach ($selectedItems as $pId => $item) {
                    DB::table('product_slots')->insert([
                        'order_id'      => $orderId,
                        'user_id'       => $customer->id,
                        'product_id'    => $pId,
                        'product_name'  => $item['product_name'],
                        'product_total' => $item['price'] * $item['qty'],
                        'qty'           => $item['qty'],
                        'created_at'    => Carbon::now(),
                        'updated_at'    => Carbon::now(),
                    ]);

                    // Decrement stock atomically — clamp to 0 as a safety floor
                    $item['model']->decrement('product_stock', $item['qty']);
                    if ($item['model']->product_stock < 0) {
                        $item['model']->update(['product_stock' => 0]);
                    }
                }

                session()->flash('success', 'Bill created successfully! Order ID: ' . $orderId);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Transaction failed. Please try again. (' . $e->getMessage() . ')');
        }

        return redirect('/billing')->with(session('success'));
    }
}
