<?php

namespace App\Http\Controllers;

use App\DataTables\SubCategoryDataTable;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubCategoryController extends Controller {
    public function index( SubCategoryDataTable $datatable ) {
        try {
            $categories = Category::all();
            return $datatable->render( 'pages.subcategory', compact( 'categories' ) );
        } catch ( \Throwable $th ) {
            Log::error( $th );
            return response()->json( [
                'status'=>'500',
                'message'=>'Unable To open Subcategory page'
            ] );
        }
    }

    public function addsubcategory( Request $request ) {
        try {
            $categoryname = $request->category;
            $subcategoryname = $request->subcategoryname;

            $category = Category::where( 'id', $categoryname )->first();

            // Handle image upload
            if ($request->hasFile('subcategory_image')) {
                $image = $request->file('subcategory_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/categories'), $imageName);
                $imagePath = 'uploads/categories/' . $imageName;
            } else {
                $imagePath = null;
            }

            SubCategory::create( [
                'category_id'=> $categoryname,
                'subcategory_name'=> $subcategoryname,
                'subcategory_image' => $imagePath,
                'category_display_name'=> $category->category_name,
                'status'=>1,
            ] );

            return response()->json( [
                'status'=>'200',
                'message'=>'SubCategory Added Successfully'
            ] );
        } catch ( \Throwable $th ) {
            Log::error( $th );
            return response()->json( [
                'status'=>'500',
                'message'=>'Unable add category'
            ] );
        }
    }
}