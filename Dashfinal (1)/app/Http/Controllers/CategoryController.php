<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller {
    public function index() {
       $category =  Category::orderBy( 'id', 'asc' )->get();

        return view( 'pages.category', compact( 'category' ) );
    }

    public function addcategory(Request $request) {
        try {
            $categoryname = $request->category_name;

            // Handle image upload
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/categories'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/categories/' . $imageName;
            } else {
                $imagePath = null;
            }

            Category::create([
                'category_name' => $categoryname,
                'category_image' => $imagePath, // Make sure this column exists in your DB
                'status' => 1,
            ]);

            return response()->json([
                'status' => '200',
                'message' => 'Category Added Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => '500',
                'message' => 'Unable to add category'
            ]);
        }
    }

    public function updatecategory(Request $request){
         $catid = $request->categoryId;
         $catename = $request->category_name;

         $updatecat = Category::findOrFail($catid);

           if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/categories'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/categories/' . $imageName;

                  $updatecat->update([
                "category_name" => $catename,
                "category_image" =>$imagePath ,
            ]);


              return response()->json([
                'status' => '200',
                'message' => 'Category update Successfully'
            ]);


            }
            else{
                 $updatecat->update([
                "category_name" => $catename,
            ]);

              return response()->json([
                'status' => '200',
                'message' => 'Category update Successfully'
            ]);

            }


    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        $product = Product::where('category_id', $id)->delete();

          return response()->json([
                'status' => '200',
                'message' => 'Category Delete Successfully'
            ]);

    }


    public function getCategories() {
        return datatables()->eloquent( Category::query() )->toJson();
    }
}
