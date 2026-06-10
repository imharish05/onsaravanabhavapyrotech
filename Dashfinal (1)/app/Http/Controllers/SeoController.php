<?php

namespace App\Http\Controllers;

use App\Models\SeoData;
use App\Models\SeoHeading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeoController extends Controller
{
    public function index(){

        $seodata = SeoData::get();
         $seohead = SeoHeading::get();
        return view('pages.seo',compact('seodata','seohead'));
    }

    public function storeseo(Request $request){


         try {
            $seoheading_id = $request->seoheading_id;
            $mete_title = $request->mete_title;
            $meta_des = $request->meta_des;
            $meta_key = $request->meta_key;
            $name = $request->name;
            $description = $request->description;
            $alt_key = $request->alt_key;
            $url = $request->url;
            $feet_content = $request->feet_content;
            $canonical = $request->canonical;

            // Handle image upload
            if ($request->hasFile('seo_image')) {
                $image = $request->file('seo_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/seoimages'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/seoimages/' . $imageName;
            } else {
                $imagePath = null;
            }

            SeoData::create([
                'seo_headingId' => $seoheading_id,
                'meta_title' => $mete_title,
                'meta_des' => $meta_des, // Make sure this column exists in your DB
               'meta_key' => $meta_key,
               'name' => $name,
               'description' => $description,
               'image' => $imagePath,
               'alt_key' => $alt_key,
               'url' => $url,
               'canonical' => $canonical,
               'feet_content' => $feet_content,
            ]);

            return response()->json([
                'status' => '200',
                'message' => 'Seo Add Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => '500',
                'message' => 'Unable to add Seo'
            ]);
        }

    }

    public function destroy($id){

          $product = SeoData::where('id', $id)->delete();

          return response()->json([
                'status' => '200',
                'message' => 'SEO Delete Successfully'
            ]);


    }

    public function heading(){
        $seo = SeoHeading::get();


        return view('pages.seoheading',compact('seo'));
    }

    public function addseoheading(Request $request){

         try {
            $seo_title = $request->heading_name;


            // Handle image upload


            SeoHeading::create([
                'heading' => $seo_title,

            ]);

            return response()->json([
                'status' => '200',
                'message' => 'SEO Heading Added Successfully'
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'status' => '500',
                'message' => 'Unable to add SEO Heading'
            ]);
        }

    }


    public function updateseoheading(Request $request){
         $catid = $request->SeoheadingId;
         $catename = $request->heading_name;

         $updatecat = SeoHeading::findOrFail($catid);

             $updatecat->update([
                "heading" => $catename,
            ]);

              return response()->json([
                'status' => '200',
                'message' => 'SEO Heading update Successfully'
            ]);




    }

    public function destroyseo($id){

          $product = SeoHeading::findOrFail($id);
          $product->delete();

          return response()->json([
                'status' => '200',
                'message' => 'SEO Heading Delete Successfully'
            ]);


    }
    
     public function updateseo(Request $request){

    $seo_id = $request->see_id;
    $seo_headingId = $request->seoheading_id;
    $meta_title = $request->mete_title;
    $meta_des = $request->meta_des;
    $meta_key = $request->meta_key;
    $name = $request->name;
    $description = $request->description;
    $alt_key = $request->alt_key;
    $url = $request->url;
   $cleanUrl = preg_replace('/[^A-Za-z0-9\-]/', '-', $url);
   
    $feet_content = $request->feet_content;
    $canonical = $request->canonical;

    $updatepro = SeoData::findOrFail($seo_id);
     if ($request->hasFile('seo_image')) {
                $image = $request->file('seo_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/seoimages'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/seoimages/' . $imageName;

                  $updatepro->update([

                "seo_headingId" => $seo_headingId,
                "meta_title" =>$meta_title ,
                "meta_des" => $meta_des,
                "meta_key" =>$meta_key,
                "name" =>$name,
                "description" =>$description,
                "image" =>$imagePath,
                "alt_key" => $alt_key,
                "url" => $cleanUrl,
                "canonical" => $canonical,
                "feet_content" => $feet_content,


            ]);


              return response()->json([
                'status' => '200',
                'message' => 'Product update Successfully'
            ]);


            }
               else{
                  $updatepro->update([

                  "seo_headingId" => $seo_headingId,
                "meta_title" =>$meta_title ,
                "meta_des" => $meta_des,
                "meta_key" =>$meta_key,
                "name" =>$name,
                "description" =>$description,
                // "image" =>$$imagePath,
                "alt_key" => $alt_key,
                "url" => $cleanUrl,
                "canonical" => $canonical,
                "feet_content" => $feet_content,

            ]);

              return response()->json([
                'status' => '200',
                'message' => 'Seo Details update Successfully'
            ]);

            }
}
}