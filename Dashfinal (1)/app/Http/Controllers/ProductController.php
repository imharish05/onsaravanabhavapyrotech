<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductChildImage;
use App\Models\ProductStock;
use App\Models\ProductVarient;
use App\Models\SubCategory;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {
    public function index( ProductDataTable $datatable ) {
       $product =  Product::join('categories','categories.id','=','products.category_id')->select('products.*','categories.category_name')->orderBy( 'id', 'asc' )->get();

       $category = Category::get();

        return view( 'pages.product', compact( 'product','category' ) );
    }

    public function addview() {
        try {
            $categories = Category::all();


            return view( 'pages.product_add', compact( 'categories') );
        } catch ( \Throwable $th ) {
            Log::error( $th );
        }
    }

    // FETCH SUBCATEGORY

    public function fetchsubcategory( $id ) {
        try {
            $subcategories = SubCategory::where( 'category_id', $id )->get();
            return response()->json( $subcategories );
        } catch ( \Throwable $th ) {
            Log::error( $th );
        }
    }

    // STORE PRODUCT

    // public function storeproduct( Request $request ) {
    //     try {

    //         dd( $request );

    //         $validated = $request->validate( [
    //             'category_id' => 'required',
    //             'subcategory_id' => 'required',
    //             'product_name' => 'required',
    //             // 'product_quantity.*' => 'required',
    //             // 'product_mrp_price' => 'required',
    //             // 'product_offer_price' => 'required',
    //             'product_specification' => 'required',
    //             'product_image' => 'required|mimes:png,jpg,webp,jpeg',
    //             'product_description' => 'required',
    //             'brand_name'=>'required',
    //             'brand_material'=>'required',
    //             'brand_type'=>'required',
    //             'approval_days'=>'required',
    //             // 'unit_value' => 'required',
    //             // 'product_value' => 'required',
    // ] );

    //         $subcate = $request->subcategory_id;
    //         $subcatedisplay = SubCategory::where( 'id', $subcate )->first();
    //         $displayname = $subcatedisplay->subcategory_name;

    //         $cate = $request->category_id;
    //         $catedisplay = Category::where( 'id', $cate )->first();
    //         $catedisplayname = $catedisplay->category_name;

    //         $sizecheck = $request->size_check;

    //         $productName = $request->product_name;
    //         $productQuantity = $request->product_quantity;
    //         $productMrpPrice = $request->product_mrp_price;
    //         $productOfferPrice = $request->product_offer_price;
    //         $productSpec = $request->product_specification;
    //         $productImage = $request->product_image;
    //         $productdesc = $request->product_description;
    //         $productunit = $request->unit_value;
    //         $brandName = $request->brand_name;
    //         $brandMaterial = $request->brand_material;
    //         $brandType = $request->brand_type;
    //         $approvalDays = $request->approval_days;

    //         if ( $request->hasFile( 'product_image' ) ) {
    //             $productImage = $request->file( 'product_image' );
    //             $path =  $productImage->store( 'product_images', 'public' );
    //             $product = Product::create( [
    //                 'category_id'=>$cate,
    //                 'subcategory_id'=>$subcate,
    //                 'product_name'=>$productName,
    //                 'product_quantity'=>$productQuantity,
    //                 'product_mrp_price'=>$productMrpPrice,
    //                 'product_regular_price'=>$productOfferPrice,
    //                 'product_desc'=>$productdesc,
    //                 'product_image' => $path,
    //                 'product_spec'=>$productSpec,
    //                 'product_brand_name'=>$brandName,
    //                 'product_brand_material'=>$brandMaterial,
    //                 'product_brand_type'=>$brandType,
    //                 'product_approval_days'=>$approvalDays,
    //                 'product_unit_value'=>$productunit,
    //                 'product_cate_name'=>$catedisplayname,
    //                 'product_subcate_name'=>$displayname,
    //                 'product_size_value'=>$sizecheck
    // ] );
    //             $imageArray = $request->product_image1;
    //             $afterRemoval = [];
    //             $thumpArray = $request->product_image_count;
    //             // dd( $thumpArray );
    //             // $product = Product::create( [ ...$validated, 'cate_name'=>$catedisplayname, 'subcate_name'=>$displayname ] );

    //             foreach ( $request->Varient_image as $key => $productCode ) {

    //                 if ( count( $afterRemoval ) != 0 ) {
    //                     $tempImageArray = $afterRemoval;
    //                 }

    //                 if ( $productCode->isFile() ) {
    //                     // $varientImage = $request->file( 'Varient_image' );
    //                     $varientImage = $productCode;
    //                     // dd( $varientImage );
    //                     $vpath =  $varientImage->store( 'varient_images', 'public' );
    //                 }

    //                 $createdProduct =  ProductVarient::create( [
    //                     'category_id' =>$product->category_id,
    //                     'subcategory_id'=>$product->subcategory_id,
    //                     'product_id' => $product->id,
    //                     'varient' => $request->unit_value[ $key ],
    //                     'varient_img'=> $vpath,
    //                     // 'varient_name'=>$request->varient_name,
    //                     'varient_name'=>$request->varient_name[ $key ],
    //                     'value' => $request->product_value[ $key ],
    //                     'offer_price' => $request->product_offer_price[ $key ],
    //                     'mrp_price' => $request->product_mrp_price[ $key ],
    //                     'product_qty' => $request->product_quantity[ $key ],
    //                     'low_stock'=> $request->low_stock[ $key ],
    //                     'hot_deals'=> $request->hot_deals[ $key ] ?? 0,
    //                     'Popular_products'=> $request->popular_prod[ $key ] ?? 0,
    //                     'product_gst'=>$request->product_gst[ $key ] ?? 0,
    //                     'size_value'=>$sizecheck,
    // ] );

    //                 ProductStock::create( [
    //                     'product_id' => $product->id,
    //                     'category_id' =>  $cate,
    //                     'subcategory_id'=> $subcate,
    //                     'varient_id'=>$createdProduct->id,
    //                     'productname' => $productName,
    //                     'overallstock' =>  $request->product_quantity[ $key ],
    //                     'availablestock' => $request->product_quantity[ $key ],
    //                     'salestock' => 0,
    //                     'low_stocks'=> $request->low_stock[ $key ],
    //                     'last_stockupdate_date' => date( 'Y-m-d' ),
    // ] );

    //                 foreach ( $request->product_image1 as $thumpkey => $img ) {
    //                     // dd( $request->product_image1 );
    //                     if ( $img->isFile() ) {
    //                         if ( count( $afterRemoval ) == 0 ) {
    //                             if ( $thumpArray[ $key ] > $thumpkey ) {
    //                                 $productImage = $img;
    //                                 $path =  $productImage->store( 'product_images1', 'public' );
    //                                 $product1 = ProductChildImage::create( [ 'product_id' => $product->id, 'product_child_image' => $path, 'varient_id' => $createdProduct->id ] );

    //                             }
    //                         } else {
    //                             if ( $thumpArray[ $key ] > $thumpkey ) {
    //                                 $productImage = $afterRemoval[ $thumpkey ];
    //                                 $path =  $productImage->store( 'product_images1', 'public' );
    //                                 $product1 = ProductChildImage::create( [ 'product_id' => $product->id, 'product_child_image' => $path, 'varient_id' => $createdProduct->id ] );

    //                             }
    //                         }

    //                     }
    //                 }

    //                 $afterRemoval = array_slice( count( $afterRemoval ) != 0 ? $tempImageArray : $imageArray, $thumpArray[ $key ] );
    //                 // print_r( $afterRemoval );
    //                 // array_slice( $request->product_image1, 2 );

    //             }
    //             // dd( $request->product_image1 );

    //             // foreach ( $request->product_image1 as $imgkey => $img ) {

    //             //         if ( $img->isFile() ) {
    //             //             $productImage = $img;
    //             //             $path =  $productImage->store( 'product_images1', 'public' );
    //             //             $product1 = ProductChildImage::create( [ 'product_id' => $product->id, 'product_child_image' => $path, 'variant_id' => $createdProduct->id ] );
    //             //         }
    //             // }

    //             // foreach ( $request->product_image1 as $key => $img ) {

    //             //     if ( $img->isFile() ) {
    //             //         $productImage = $img;
    //             //         $path =  $productImage->store( 'product_images1', 'public' );
    //             //         $product1 = ProductChildImage::create( [ 'product_id' => $product->id, 'product_child_image' => $path, 'variant_id' => $createdProduct->id ] );
    //             //     }
    //             // }
    //             $products =  Product::all();

    //             return response()->json( [
    //                 'message' => 'Product Added Successfully',
    //                 'products' => $products
    // ] );
    //         }
    //     } catch ( \Throwable $th ) {
    //         Log::error( $th );
    //     }
    // }

    public function storeproduct( Request $request ) {
        // Validate request data before entering try-catch block to allow Laravel to send 422 response
        $validated = $request->validate( [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_mrp_price' => 'required|numeric',
            'product_content' => 'required',
            'product_image' => 'nullable|image|mimes:png,jpg,webp,jpeg',
        ] );

        try {
            // Fetch category and subcategory names
            $category = Category::findOrFail( $request->category_id );


            if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/productimage'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/productimage/' . $imageName;
            } else {
                $imagePath = null;
            }


            // Store main product image


            // Create Product entry
            $product = Product::create( [
                'category_id' => $request->category_id,
                'subcategory_id' => null,
                'product_name' => $request->product_name,
                'product_desc' => $request->product_desc,
                'product_image' => $imagePath,
                'product_quantity' => $request->product_quantity,
                'product_video' => $request->product_video,
                'product_mrp_price' => $request->product_mrp_price,
                'product_regular_price' => $request->product_regular_price,
                'product_content'=> $request->product_content,
                'product_stock' => $request->product_quantity ?? 0,

            ] );

            // Loop through variants






            // Retrieve updated product list
            $products = Product::all();

            return response()->json( [
                'message' => 'Product Added Successfully',
                'products' => $products
            ] );
        } catch ( \Throwable $th ) {
            Log::error( $th );
            return response()->json( [
                'message' => 'Error processing the request',
                'error' => $th->getMessage()
            ], 500 );
        }
    }

    public function destroy($id){

        $product = Product::where('id', $id)->delete();

          return response()->json([
                'status' => '200',
                'message' => 'Product Delete Successfully'
            ]);

    }
    public function destroyall(){

        $product = Product::query()->delete();

          return response()->json([
                'status' => '200',
                'message' => 'Product Delete Successfully'
            ]);

    }


    public function bulkUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid file format. Please upload a CSV file.',
            ]);
        }

        $file = $request->file('file');
        $fileHandle = fopen($file->getRealPath(), 'r');
        $header = fgetcsv($fileHandle); // Get column names

        $inserted = 0;
        $updated = 0;
        $skipped = 0;

        $currentDiscount = Discount::latest()->first()->discount ?? 0;

        while (($row = fgetcsv($fileHandle)) !== false) {
            $data = array_combine($header, $row);

            // Clean and trim data
            $category_id = isset($data['category_id']) && is_numeric(trim($data['category_id'])) ? (int) trim($data['category_id']) : null;
            $product_name = trim($data['product_name'] ?? '');
            $product_quantity = trim($data['product_quantity'] ?? '');
            $sale_price = trim($data['sale_price'] ?? '');
            $product_desc = trim($data['product_desc'] ?? '');
            $product_content = trim($data['product_content'] ?? '');
            $product_video = trim($data['product_video'] ?? '');

            // Skip if required fields are missing
            if (empty($category_id) || empty($product_name)) {
                $skipped++;
                continue;
            }

            // Calculate MRP based on Sale Price and Current Global Discount
            $sale = (float) $sale_price;
            $mrp = ($currentDiscount < 100 && $currentDiscount > 0) 
                   ? ($sale / (1 - ($currentDiscount / 100))) 
                   : $sale;

            // Sync product by name
            $product = Product::updateOrCreate(
                ['product_name' => $product_name],
                [
                    'category_id' => $category_id,
                    'product_quantity' => $product_quantity ?: null,
                    'product_mrp_price' => round($mrp, 2),
                    'product_regular_price' => $sale,
                    'product_desc' => $product_desc,
                    'product_content' => $product_content,
                    'product_video' => $product_video ?: null,
                    'product_stock' => $product_quantity ?: 0,
                ]
            );

            if ($product->wasRecentlyCreated) {
                $inserted++;
            } else {
                $updated++;
            }
        }

        fclose($fileHandle);

        return response()->json([
            'status' => 200,
            'message' => "Upload complete. Inserted: $inserted, Updated: $updated, Skipped: $skipped",
        ]);
    }

// edit products
public function updateproduct(Request $request){

    $product_id = $request->product_id;
    $cate_id = $request->category_id;
    $product_name = $request->product_name;
    $product_desc = $request->product_desc;
    $product_mrp_price = $request->product_mrp_price;
    $product_video = $request->product_video;
    $product_content = $request->product_content;
    // $product_quantity = $request->product_quantity;

    $updatepro = Product::findOrFail($product_id);
     if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/productimage'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/productimage/' . $imageName;

                  $updatepro->update([

                "category_id" => $cate_id,
                "product_name" =>$product_name ,
                // "product_quantity" => $product_quantity,
                "product_mrp_price" =>$product_mrp_price,
                "product_regular_price" => $request->product_regular_price,
                // "product_desc" =>$product_desc,
                "product_image" =>$imagePath,
                "product_content" =>$product_content,
                // "product_video" => $product_video


            ]);


              return response()->json([
                'status' => '200',
                'message' => 'Product update Successfully'
            ]);


            }
               else{
                  $updatepro->update([

                "category_id" => $cate_id,
                "product_name" =>$product_name ,
                // "product_quantity" => $product_quantity,
                "product_mrp_price" =>$product_mrp_price,
                "product_regular_price" => $request->product_regular_price,
                // "product_desc" =>$product_desc,

                "product_content" =>$product_content,
                // "product_video" => $product_video


            ]);

              return response()->json([
                'status' => '200',
                'message' => 'Product update Successfully'
            ]);

            }
}

// delete image

public function updateimage(Request $request){

    $product_id = $request->product_id;
    $delete_id = $request->delete_id;




    $updatepro = Product::findOrFail($product_id);

    if($delete_id == 1){
         $updatepro->update([

                        "product_image" =>"",]);

                 return response()->json([
                'status' => '200',
                'message' => 'Image delete Successfully'
            ]);



                    }


     if ($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/productimage'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/productimage/' . $imageName;

                  $updatepro->update([



                "product_image" =>$imagePath,



            ]);


              return response()->json([
                'status' => '200',
                'message' => 'Image update Successfully'
            ]);


            }
               else{

              return response()->json([
                'status' => '200',
                'message' => 'Not Image Selected'
            ]);

            }
}

public function updatestock(Request $request, $id){

    $product_stock = $request->product_stock;



    $updatepro = Product::findOrFail($id);

    $updatepro->update([

        "product_stock" => $product_stock,
    ]);

     return response()->json([
        'status' => '200',
        'message' => 'Stock update Successfully'
    ]);
}

public function exportProducts()
{
    $products = Product::all();
    $filename = "products_current_" . date('Y-m-d') . ".csv";

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $handle = fopen('php://output', 'w');

    // Headers matching bulkUpload columns
    fputcsv($handle, [
        'category_id', 
        'product_name', 
        'product_quantity', 
        'sale_price', 
        'product_desc', 
        'product_content', 
        'product_video'
    ]);

    foreach ($products as $product) {
        fputcsv($handle, [
            $product->category_id,
            $product->product_name,
            $product->product_stock, // product_quantity column maps to product_stock
            $product->product_regular_price, // product_regular_price maps to sale_price
            $product->product_desc,
            $product->product_content,
            $product->product_video
        ]);
    }

    fclose($handle);
    exit;
}


}