<?php

namespace App\Http\Controllers;

use App\Models\Testmonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestimonialController extends Controller
{
    public function index(){
        $testimonial = Testmonial::get();
        return view('pages.testmonial', compact('testimonial'));
    }


      public function addtest(Request $request) {
        try {
            $categoryname = $request->test_name;
            $content = $request->test_content;

            // Handle image upload
            if ($request->hasFile('test_name_image')) {
                $image = $request->file('test_name_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/categories'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/categories/' . $imageName;
            } else {
                $imagePath = null;
            }

            Testmonial::create([
                'name' => $categoryname,
                'content' => $content, // Make sure this column exists in your DB
               'image' => $imagePath,
            ]);

            return response()->json([
                'status' => '200',
                'message' => 'Testimonials Added Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => '500',
                'message' => 'Unable to add Testimonials'
            ]);
        }
    }

    public function updatetest(Request $request){
         $catid = $request->testId;
         $catename = $request->test_name;
         $content = $request->test_content;

         $updatecat = Testmonial::findOrFail($catid);

           if ($request->hasFile('test_image')) {
                $image = $request->file('test_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/categories'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/categories/' . $imageName;

                  $updatecat->update([
                "name" => $catename,
                "content" =>$content,
                "image" => $imagePath,
            ]);


              return response()->json([
                'status' => '200',
                'message' => 'Testimnonials update Successfully'
            ]);


            }
            else{
                 $updatecat->update([
                 "name" => $catename,
                "content" =>$content,
            ]);

              return response()->json([
                'status' => '200',
                'message' => 'Testimnonials update Successfully'
            ]);

            }


    }

     public function destroy($id){
        $category = Testmonial::findOrFail($id);
        $category->delete();


          return response()->json([
                'status' => '200',
                'message' => 'TestiMonials Delete Successfully'
            ]);

    }
}
