<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\Category;
use App\Models\Custmer;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\SubCategory;
use App\Models\VendorOffers;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardController extends Controller {
    public function index() {
        try {
            $categoryCount = Category::where( 'status', '1' )->count();
            $subcategoryCount = SubCategory::where( 'subcategory_status', '1' )->count();
            $banner = BannerImage::count();
            $productCount = Product::count();
            $productdiscount = Discount::orderBy('created_at', 'desc')->first();
            $order = ProductOrder::count();
            $orderincome = round(ProductOrder::whereIn('status', ['Complete ', 'Paid'])->sum('total'));
            $customer = Custmer::orderBy('created_at', 'desc')->Limit(10)->get();
            $customercount = Custmer::count();
            $today = ProductOrder::join('customers','customers.id','=','product_orders.user_id')->select('product_orders.*','customers.name','customers.phone_number')->orderBy('product_orders.created_at', 'desc')->Limit(5)->get();
            $offerCount = VendorOffers::where( 'vendor_id', Auth::user()->id )->count();

            return view( 'pages.dashboard', compact( 'categoryCount', 'subcategoryCount', 'productCount', 'offerCount','banner','productdiscount', 'order' ,'orderincome','customer','customercount','today') );
        } catch ( \Throwable $th ) {
            Log::error( $th );
        }
    }
}
