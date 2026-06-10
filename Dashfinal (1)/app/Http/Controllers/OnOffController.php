<?php

namespace App\Http\Controllers;

use App\Models\HeaderText;
use App\Models\PageOff;
use App\Models\PriceList;
use Illuminate\Http\Request;

class OnOffController extends Controller
{
    public function index(){
       $page = PageOff::get();
       $pdf =PriceList::get();
       $headertext = HeaderText::get();

       return view('pages.pageoff',compact('page','pdf','headertext'));
    }

    public function updatepage(Request $request){

          $catid = $request->page_id;
          $status = $request->statusoff;

          $updatecat = PageOff::findOrFail($catid);
           if ($request->hasFile('page_image')) {
                $image = $request->file('page_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/categories'), $imageName); // Save to public/uploads/categories

                $imagePath = 'uploads/categories/' . $imageName;

                  $updatecat->update([
                "status" => $status,
                "image" =>$imagePath ,
            ]);


              return response()->json([
                'status' => '200',
                'message' => 'PageOff update Successfully'
            ]);


            }
            else{
                 $updatecat->update([
                "status" => $status,
            ]);

              return response()->json([
                'status' => '200',
                'message' => 'PageOff update Successfully'
            ]);

            }


    }
}
