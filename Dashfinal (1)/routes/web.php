<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustmerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomesectionController;
use App\Http\Controllers\OnOffController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\TestimonialController;
use App\Models\OrderStatus;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GlobalSettingController;
use Illuminate\Support\Facades\Route;
use OpenSpout\Common\Entity\Row;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/', function () {
        return redirect()->route('login');
    });

    Route::post('/login',[LoginController::class,'login']);
    Route::post('/forgetpassword',[LoginController::class,'forgetpassword']);
    
});

Route::view('/forget','auth.forget');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::post('/logout',[LoginController::class,'logout']);

    // CATEGORY
    Route::GET('/category/view',[CategoryController::class,'index']);
    Route::GET('/onoff/view',[OnOffController::class,'index']);
    Route::POST('/pageoff/update',[OnOffController::class, 'updatepage']);
    Route::POST('/price/update',[PriceListController::class, 'updateprice']);
    Route::POST('/header/update',[PriceListController::class, 'updateheader']);

    Route::POST('/category/add',[CategoryController::class,'addcategory']);
    Route::POST('/category/update',[CategoryController::class,'updatecategory']);
    Route::POST('/destroyCategories/{id}',[CategoryController::class, 'destroy']);
    Route::GET('/categories/data', [CategoryController::class, 'getCategories'])->name('categories.data');


    // seoheading
    Route::GET('/seoheading/view',[SeoController::class,'heading']);
     Route::POST('/sechead/add',[SeoController::class,'addseoheading']);
     Route::POST('/seoheading/update',[SeoController::class,'updateseoheading']);
      Route::POST('/deleteseoheading/{id}',[SeoController::class, 'destroyseo']);
      
       //   ordersolts
    Route::POST('/destroyordersolt',[ProductOrderController::class, 'destroyordersolt']);

      
          // Blog
    Route::GET('/blog/view',[BlogController::class,'index']);
    Route::POST('/blog/add',[BlogController::class,'storeblog']);
    Route::POST('/blog/edit',[BlogController::class,'updateblog']);
    Route::POST('/destroyBlog/{id}',[BlogController::class,'destroy']); 




    // home sections
    Route::GET('/homesection/view',[HomesectionController::class, 'index']);
    Route::POST('/sectionhead/add',[HomesectionController::class, 'addsectionhead']);
    Route::POST('/addproduct/update',[HomesectionController::class, 'addproductupdate']);
    Route::POST('/sectionheading/update',[HomesectionController::class,'updatesectionheading']);
    Route::POST('/seoheading/delete/{id}',[SeoController::class,'destroyseo']);
    Route::POST('/destroysectionheading/{id}',[HomesectionController::class,'destroysectionheading']);

    // testimonial
    Route::GET('/testmonial/view',[TestimonialController::class, 'index']);
    Route::POST('/test/add',[TestimonialController::class,'addtest']);
     Route::POST('/test/update',[TestimonialController::class,'updatetest']);
     Route::POST('/destroyTest/{id}',[TestimonialController::class, 'destroy']);


    // Customer
    Route::resource('/customer',CustmerController::class);
    Route::GET('/customer/data', [CustmerController::class, 'getCustomer'])->name('customers.data');
    Route::resource('/vendor/ordersstatus', OrderStatusController::class);


      Route::resource('/vendor/orders', ProductOrderController::class);
       Route::GET('/todayorder', [ProductOrderController::class, 'todayorder']);
       Route::GET('/topcustomer',[ProductOrderController::class, 'topcustomer']);
    Route::get('/ordersolt/{id}', [ProductOrderController::class, 'ordersolt'])->name('ordersolt');
    Route::GET('/getproductdetails/{orderid}',[ProductOrderController::class,'getproductdetails']);
    Route::GET('/pdf/{orderid}/{userid}',[ProductOrderController::class,'pdfview']);

    // BILLING
    Route::GET('/billing',[BillingController::class,'index']);
    Route::GET('/billing/create', [BillingController::class, 'create'])->name('billing.create');
    Route::POST('/billing/store', [BillingController::class, 'store'])->name('billing.store');

    // DISCOUNT
    Route::POST('/discount/add',[DiscountController::class,'adddiscount']);
    Route::POST('/pricelist/add',[PriceListController::class,'addpricelist']);
    Route::POST('/status/add',[OrderStatusController::class,'addstatus']);
    Route::POST('/status/update',[OrderStatusController::class,'updatestatus']);
     Route::POST('/destroyOrderStatus/{id}',[OrderStatusController::class,'destroy']);
    Route::POST('/banner/add',[BannerController::class,'addbanner']);
    Route::POST('/banner/update',[BannerController::class,'updatebanner']);

    // section
    Route::POST('/section/add',[BannerController::class,'addsection']);
    Route::POST('/section/update',[BannerController::class,'updatesection']);

    //SUBCATEGORY
    Route::GET('/subcategory/view',[SubCategoryController::class,'index']);
    Route::POST('/subcategory/add',[SubCategoryController::class,'addsubcategory']);

    // PRODUCT
    Route::GET('/product/view',[ProductController::class,'index']);
    Route::GET('/product/addview',[ProductController::class,'addview']);
    Route::GET('/product/fetchsubcategory/{id}',[ProductController::class,'fetchsubcategory']);
    Route::POST('/product/store',[ProductController::class,'storeproduct']);
    Route::POST('/destroyProduct/{id}',[ProductController::class, 'destroy']);
    Route::POST('/destroyProductall',[ProductController::class, 'destroyall']);
    Route::post('/bulk/update', [ProductController::class, 'bulkUpload'])->name('product.bulkUpload');
    Route::POST('/product/update',[ProductController::class, 'updateproduct']);
    Route::POST('/image/update',[ProductController::class, 'updateimage']);
    Route::GET('/product/export',[ProductController::class, 'exportProducts'])->name('product.export');

    // SEO
    Route::GET('/seo/view',[SeoController::class,'index']);
    Route::POST('/seo/add',[SeoController::class,'storeseo']);
     Route::POST('/seo/edit',[SeoController::class,'updateseo']);
    Route::POST('/destroySeo/{id}',[SeoController::class,'destroy']);


    // BANNER
    Route::GET('/banner/view',[BannerController::class,'index']);

    // brand logo
    Route::GET('/brand/view',[BrandController::class,'index']);
      Route::POST('/brand/add',[BrandController::class,'addbrand']);
    Route::POST('/brand/update',[BrandController::class,'upadetbrand']);
      Route::POST('/destroybrand/{id}',[BrandController::class, 'destroy']);


    // Area
    Route::GET('/area',[AreaController::class,'index']);
    Route::get('stateCity/{state_id}',[AreaController::class,'getStateCities']);
     Route::POST('/area/add',[AreaController::class,'addarea'])->name('area.add');
     Route::POST('/destroyArea/{id}',[AreaController::class, 'deletearea'])->name('area.delete');
     Route::POST('/area/update', [AreaController::class, 'upadtearea'])->name('area.update');
     Route::POST('/area/bulk/update', [AreaController::class, 'bulkUpload'])->name('area.bulkUpload');
     Route::GET('/area/export',[AreaController::class, 'exportAreas'])->name('area.export');

    // State
    Route::GET('/state', [StateController::class, 'index'])->name('state.index');
    Route::POST('/state/add', [StateController::class, 'addstate'])->name('state.add');
    Route::POST('/state/update', [StateController::class, 'updatestate'])->name('state.update');
    Route::GET('/state/delete/{id}', [StateController::class, 'deletestate'])->name('state.delete');
    Route::POST('/state/bulkUpload', [StateController::class, 'bulkUpload'])->name('state.bulkUpload');
    Route::GET('/state/export', [StateController::class, 'exportStates'])->name('state.export');

    // City
    Route::GET('/city', [CityController::class, 'index'])->name('city.index');
    Route::POST('/city/add', [CityController::class, 'addcity'])->name('city.add');
    Route::POST('/city/update', [CityController::class, 'updatecity'])->name('city.update');
    Route::GET('/city/delete/{id}', [CityController::class, 'deletecity'])->name('city.delete');
    Route::POST('/city/bulkUpload', [CityController::class, 'bulkUpload'])->name('city.bulkUpload');
    Route::GET('/city/export', [CityController::class, 'exportCities'])->name('city.export');

    // VENDORS
    Route::GET('/vendor/view',[VendorController::class,'index']);
    Route::GET('/vendor/addview',[VendorController::class,'addview']);

    Route::GET('/vendor/offers',[VendorController::class,'vendoroffers']);
    Route::POST('/vendor/store',[VendorController::class,'storevendor']);
    Route::GET('/vendor/productstock',[VendorController::class,'vendorStockView']);
    Route::POST('/vendor/fetchproductstock',[VendorController::class,'fetchproductstock']);
    Route::POST('/vendor/editprodstock',[VendorController::class,'editprodstock']);
    Route::POST('/vendor/addprodstock',[VendorController::class,'addprodstock']);
    Route::POST('/vendor/fetchorders',[VendorController::class,'fetchorders']);
    Route::POST('/vendor/fetchoffers',[VendorController::class,'fetchoffers']);
    Route::POST('/vendor/fetchproddetail',[VendorController::class,'fetchproductdetail']);
    Route::POST('/vendor/addoffer',[VendorController::class,'addvendoroffer']);
    Route::POST('/vendor/editoffer',[VendorController::class,'editvendoroffer']);
    
     Route::post('/save-product-solt', [VendorController::class, 'saveProductSolt']);
    
     // THEME SETTINGS
    Route::GET('/theme-settings', [App\Http\Controllers\ThemeSettingController::class, 'index'])->name('theme-settings.index');
    Route::POST('/theme-settings', [App\Http\Controllers\ThemeSettingController::class, 'update'])->name('theme-settings.update');

    // TERMS & CONDITIONS (Admin)
    Route::GET('/terms-conditions', [App\Http\Controllers\TermConditionController::class, 'index'])->name('terms-conditions.index');
    Route::POST('/terms-conditions', [App\Http\Controllers\TermConditionController::class, 'update'])->name('terms-conditions.update');

    // ABOUT US SETTINGS (Admin)
    Route::GET('/about-us-settings', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about-us-settings.index');
    Route::POST('/about-us-settings', [App\Http\Controllers\AboutUsController::class, 'update'])->name('about-us-settings.update');

    // ABOUT US (Public Frontend)
    Route::GET('/about', [App\Http\Controllers\AboutUsController::class, 'show'])->name('about');

    // CONTACT US SETTINGS (Admin)
    Route::GET('/contact-us-settings', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contact-us-settings.index');
    Route::POST('/contact-us-settings', [App\Http\Controllers\ContactUsController::class, 'update'])->name('contact-us-settings.update');
        // CONTACT ENQUIRIES (Admin)
    Route::GET('/contact-enquiries', [App\Http\Controllers\ContactEnquiryController::class, 'index'])->name('contact-enquiries.index');


    // CONTACT US (Public Frontend)
    Route::GET('/contact', [App\Http\Controllers\ContactUsController::class, 'show'])->name('contact');

    // HOME SETTINGS (Admin)
    Route::GET('/home-settings', [App\Http\Controllers\HomeSettingController::class, 'index'])->name('home-settings.index');
    Route::POST('/home-settings', [App\Http\Controllers\HomeSettingController::class, 'update'])->name('home-settings.update');

    // HOME PAGE (Public Frontend)
    Route::GET('/home', [App\Http\Controllers\FrontendController::class, 'home'])->name('home');

    // PAYMENT SETTINGS (Admin)
    Route::GET('/payment-settings', [App\Http\Controllers\PaymentSettingController::class, 'index'])->name('payment-settings.index');
    Route::POST('/payment-settings', [App\Http\Controllers\PaymentSettingController::class, 'update'])->name('payment-settings.update');

    // PAYMENT PAGE (Public Frontend)
    Route::GET('/payment-information', [App\Http\Controllers\PaymentSettingController::class, 'show'])->name('payment');

    // Global Settings (Admin) — auth protected
    Route::get('/admin/global-settings', [GlobalSettingController::class, 'index'])->name('admin.global-settings.index');
    Route::put('/admin/global-settings/update', [GlobalSettingController::class, 'update'])->name('admin.global-settings.update');

    //   updatestock
   Route::post('/updatestock/{id}',[ProductController::class, 'updatestock']);

    // Roles & Permissions
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::get('roles/{id}/assign-permission', [RoleController::class, 'assignPermissionPage'])->name('roles.assign_permission_page');
    Route::post('roles/assign-permission', [RoleController::class, 'assignPermission'])->name('roles.assign_permission');
    
    Route::resource('permissions', PermissionController::class)->except(['show']);

    // Manage Staffs
    Route::get('/manage-staffs', [StaffController::class, 'index'])->name('staff.index');
    Route::post('/manage-staffs/add', [StaffController::class, 'store'])->name('staff.store');
    Route::post('/manage-staffs/update/{id}', [StaffController::class, 'updatePassword'])->name('staff.update');
    Route::post('/manage-staffs/delete/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

    Route::post('/order-slot/update', [ProductOrderController::class, 'updateordersolt']);
    Route::get('/get-order-products/{order_id}', [ProductOrderController::class, 'getOrderProducts']);
});