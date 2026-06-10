<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   public function index(){
    $brand = Brand::get();
    return view('pages.brand',compact('brand'));
   }

   public function addbrand(Request $request){

          $request->validate( [
            'section_image' => 'nullable|mimes:png,jpg,webp,jpeg'
        ] );

        if ( $request->hasFile( 'section_image' ) ) {


        $file = $request->file('section_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/sectionimages'), $filename);
         $path= 'uploads/sectionimages/' . $filename;

            Brand::create( [
                'logo' =>  $path,
            ] );

            $bannerImages =  Brand::orderBy( 'id', 'asc' )->get();
            // $webbannerImages = OfferBannerImage::orderBy( 'id', 'asc' )->get();
            return response()->json( [
                'status'=>'200',
                'message' => 'logo Added Successfully',
            ] );
        }
        // return redirect( 'bannerImages' )->with( 'error', 'No Image found' );

    }

    // update section
    public function upadetbrand(Request $request){
        $sectionid = $request->sectionid;
        
        
        $brand = Brand::where('id',$sectionid)->first();

          if ( $request->hasFile( 'section_image' ) ) {


        $file = $request->file('section_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/sectionimages'), $filename);
         $path= 'uploads/sectionimages/' . $filename;

            $brand->update( [
                'logo' =>  $path,

            ] );

            $bannerImages =  Brand::orderBy( 'id', 'asc' )->get();
            // $webbannerImages = OfferBannerImage::orderBy( 'id', 'asc' )->get();
            return response()->json( [
                'status'=>'200',
                'message' => 'Brand logo Added Successfully',
            ] );
        }
        
        else{
             return response()->json( [
                'status'=>'200',
                'message' => 'Brand logo Not Selected',
            ] );
        }



    }
    
     public function destroy($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();


          return response()->json([
                'status' => '200',
                'message' => 'Brand Delete Successfully'
            ]);

    }
}