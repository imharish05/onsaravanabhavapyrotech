<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use App\Models\Product;
use App\Models\SectionProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomesectionController extends Controller
{
    public function index(){
        $section = HomeSection::get();
        $product = Product::get();
        return view('pages.homesection',compact('section','product'));
    }

    public function addsectionhead(Request $request) {
        try {
            $categoryname = $request->section_name;

            // Handle image upload


            HomeSection::create([
                'section_name' => $categoryname,

            ]);

            return response()->json([
                'status' => '200',
                'message' => 'Home Section Added Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => '500',
                'message' => 'Unable to Home Section'
            ]);
        }
    }

    public function addproductupdate(Request $request)
{


    $section_id = $request->section_id;
    $product_ids = $request->product_id;

    // Optional: clear old entries first if needed
    DB::table('section_products')->where('section_id', $section_id)->delete();

    // Insert new entries
    foreach ($product_ids as $product_id) {
        DB::table('section_products')->insert([
            'section_id' => $section_id,
            'product_id' => $product_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

      return response()->json([
                'status' => '200',
                'message' => 'Home product Added Successfully'
            ]);
}


public function updatesectionheading(Request $request)
    {
        $catid = $request->sectionId;
        $catename = $request->section_name;

        $updatecat = HomeSection::findOrFail($catid);

        $updatecat->update([
            "section_name" => $catename,
        ]);

        return response()->json([
            'status' => '200',
            'message' => 'section update Successfully'
        ]);
    }

        public function destroysectionheading($id){
        $category = HomeSection::findOrFail($id);
        $category->delete();
        $product = SectionProducts::where('section_id', $id)->delete();

          return response()->json([
                'status' => '200',
                'message' => 'Section Delete Successfully'
            ]);

    }



}