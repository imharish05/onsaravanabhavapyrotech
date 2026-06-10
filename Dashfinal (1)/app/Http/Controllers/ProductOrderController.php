<?php

namespace App\Http\Controllers;

use App\Models\Custmer;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductOrderController extends Controller
{
    public function index(){
        $orderdetails = ProductOrder::join('customers','customers.id','=','product_orders.user_id')->select('product_orders.*','customers.name','customers.address','customers.phone_number')->orderBy('product_orders.id', 'desc')->get();
        
           $statusCounts = ProductOrder::select('status', DB::raw('COUNT(*) as total'))
    ->groupBy('status')
    ->pluck('total','status');

         $total = ProductOrder::sum('total');

        $status = OrderStatus::all();
        $product = Product::all();
        
        return view('vendorpages.orders',compact('orderdetails','status','total','product','statusCounts'));
    }

    public function todayorder(){
         $orderdetails = ProductOrder::join('customers','customers.id','=','product_orders.user_id')->select('product_orders.*','customers.name','customers.address','customers.phone_number')->whereDate('product_orders.created_at', Carbon::today())->get();

        $status = OrderStatus::all();
        return view('pages.todayorders',compact('orderdetails','status'));
    }

    public function topcustomer(){
         $orderdetails = ProductOrder::selectRaw('MAX(customers.name) as name, customers.phone_number, SUM(product_orders.total) as total_amount, COUNT(product_orders.id) as order_count')
        ->join('customers', 'product_orders.user_id', '=', 'customers.id')
        ->whereNotNull('customers.phone_number')
        ->groupBy('customers.phone_number')
        ->having('order_count', '>', 1)
        ->orderByDesc('order_count')
        ->get();

        return view('pages.topcustomer',compact('orderdetails'));
    }


    public function ordersolt(Request $request, $id){



        $ordersolts = DB::table('product_slots')->join('products','products.id','=','product_slots.product_id')->select('product_slots.*','products.product_name','products.product_regular_price')->where('product_slots.order_id',$id)->get();
        
         $orderamount = ProductOrder::where('oeder_id',$id)->first();
        $product = Product::all();

        return view('vendorpages.orderslot',compact('ordersolts','orderamount','product'));
    }

    public function getproductdetails($orderid)
    {
        $orderdetails =DB::table('product_slots')->join('products','products.id','=','product_slots.product_id')->select('product_slots.*','products.product_name','products.product_regular_price')->where('product_slots.order_id',$orderid)->get();

        return $orderdetails;
    }

    public function pdfview($orderid, $userid){
        $productord = ProductOrder::leftJoin('city_list', 'product_orders.city', '=', 'city_list.id')
            ->leftJoin('state_list', 'product_orders.state', '=', 'state_list.id')
            ->leftJoin('areas', 'product_orders.area', '=', 'areas.id')
            ->select('product_orders.*', 'city_list.city_name as city_name', 'state_list.state as state_name', 'areas.area_name as area_name')
            ->where('product_orders.oeder_id', $orderid)
            ->first();

        $slot = DB::table('product_slots')->join('products','products.id','=','product_slots.product_id')->select('product_slots.*','products.product_name','products.product_regular_price','products.product_mrp_price')->where('product_slots.order_id',$orderid)->get();
        $customer = Custmer::where('id',$userid)->first();

        return view('pages.pdf',compact('productord','slot','customer'));
    }
    
     public function destroyordersolt(Request $request)
{
    // Cast values to float (or int if you prefer)
    $id       = (int) $request->id;
    $qty      = (float) $request->qty;
    $amt      = (float) $request->amt;
    $totalamt = (float) $request->totalamt;
    $orderid  = $request->orderid;

    // Calculate new total and sub_total
    $qtyamt   = $qty * $amt;
    $newtotal = round($totalamt) - round($qtyamt);

    // Update order total and sub_total (assuming total = sub_total + shipping, so change in sub_total = change in total)
    DB::table('product_orders')
        ->where('oeder_id', $orderid)
        ->update([
            'total'     => $newtotal,
            'sub_total' => $newtotal - floatval(DB::table('product_orders')->where('oeder_id', $orderid)->value('shipping') ?? 0)
        ]);

    // Delete product slot
    DB::table('product_slots')->where('id', $id)->delete();

    return response()->json([
        'status'  => 200,
        'message' => 'Order Slot Deleted Successfully',
    ]);
}


public function updateordersolt(Request $request)
{
    $id       = (int) $request->id;
    $newQty   = (float) $request->qty;
    $oldQty   = (float) $request->oldqty;
    $amt      = (float) $request->amt;
    $totalamt = (float) $request->totalamt;
    $orderid  = $request->orderid;

    $oldRowTotal = $oldQty * $amt;
    $newRowTotal = $newQty * $amt;
    $newTotal    = round($totalamt) - round($oldRowTotal) + round($newRowTotal);

    DB::table('product_slots')
        ->where('id', $id)
        ->update(['qty' => $newQty]);

    DB::table('product_orders')
        ->where('oeder_id', $orderid)
        ->update([
            'total'     => $newTotal,
            'sub_total' => $newTotal - floatval(DB::table('product_orders')->where('oeder_id', $orderid)->value('shipping') ?? 0)
        ]);

    return response()->json([
        'status'  => 200,
        'message' => 'Order Slot Updated Successfully',
    ]);
}

public function getOrderProducts($order_id)
{
    $products = DB::table('product_slots')
        ->select('product_id','qty')
        ->where('order_id',$order_id)
        ->get();

    return response()->json($products);
}

}