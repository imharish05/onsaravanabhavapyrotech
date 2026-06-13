<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\OfferBannerImage;
use App\Models\SectionBanner;
use Illuminate\Http\Request;

class BannerController extends Controller {
    public function index() {
        $bannerImages =  BannerImage::orderBy( 'id', 'asc' )->get();
        $webbannerImages = SectionBanner::orderBy( 'id', 'asc' )->get();
        return view( 'pages.banner', compact( 'bannerImages', 'webbannerImages' ) );
    }

    // ADD

    public function addbanner( Request $request ) {
        $request->validate( [
            'banner_image' => 'nullable|image|mimes:png,jpg,webp,jpeg,gif|max:15360' // 15MB max
        ] );

        if ( $request->hasFile( 'banner_image' ) ) {


        $file = $request->file('banner_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/bannerimages'), $filename);
         $path= 'uploads/bannerimages/' . $filename;

            BannerImage::create( [
                'banner_image' =>  $path,
            ] );

            $bannerImages =  BannerImage::orderBy( 'id', 'asc' )->get();
            // $webbannerImages = OfferBannerImage::orderBy( 'id', 'asc' )->get();
            return response()->json( [
                'status'=>'200',
                'message' => 'Banner Image Added Successfully',
            ] );
        }
        return redirect( '/banner/view' )->with( 'error', 'No Image found' );
    }

    // UPDATE BANNER

    public function updatebanner(Request $request) {
        $request->validate([
            'bannerid' => 'required',
            'banner_image' => 'nullable|image|mimes:png,jpg,webp,jpeg,gif|max:15360'
        ]);

        $bannerid = $request->bannerid;
        $postion = $request->positionid;

        $updatebanner = BannerImage::find($bannerid);

        if (!$updatebanner) {
            return response()->json([
                'status' => '404',
                'message' => 'Banner not found',
            ], 404);
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            
            if (!$file->isValid()) {
                return response()->json([
                    'status' => '422',
                    'message' => 'File upload failed: ' . $file->getErrorMessage(),
                ], 422);
            }

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/bannerimages'), $filename);
            $path = 'uploads/bannerimages/' . $filename;
            $updatebanner->banner_image = $path;
        }

        $updatebanner->banner_position = $postion;
        $updatebanner->save();

        return response()->json([
            'status' => '200',
            'message' => 'Banner Updated Successfully',
        ]);
    }


    public function addsection(Request $request){

          $request->validate( [
            'section_image' => 'nullable|mimes:png,jpg,webp,jpeg,gif|max:15360'
        ] );

        if ( $request->hasFile( 'section_image' ) ) {


        $file = $request->file('section_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/sectionimages'), $filename);
         $path= 'uploads/sectionimages/' . $filename;

            SectionBanner::create( [
                'banner' =>  $path,
            ] );

            $bannerImages =  SectionBanner::orderBy( 'id', 'asc' )->get();
            // $webbannerImages = OfferBannerImage::orderBy( 'id', 'asc' )->get();
            return response()->json( [
                'status'=>'200',
                'message' => 'Section Image Added Successfully',
            ] );
        }
        return redirect( '/banner/view' )->with( 'error', 'No Image found' );

    }

    // update section
    public function updatesection(Request $request){
        $request->validate([
            'sectionid' => 'required',
            'section_image' => 'nullable|image|mimes:png,jpg,webp,jpeg,gif|max:15360'
        ]);

        $sectionid = $request->sectionid;
        $section =  SectionBanner::find($sectionid);

        if (!$section) {
            return response()->json([
                'status' => '404',
                'message' => 'Section Banner not found',
            ], 404);
        }

        if ( $request->hasFile( 'section_image' ) ) {
            $file = $request->file('section_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/sectionimages'), $filename);
            $path= 'uploads/sectionimages/' . $filename;
            $section->banner = $path;
            $section->save();
        }

        return response()->json( [
            'status'=>'200',
            'message' => 'Section Banner Updated Successfully',
        ] );
    }


}