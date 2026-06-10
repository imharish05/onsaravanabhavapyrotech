<?php

namespace App\Http\Controllers;

use App\Models\HeaderText;
use App\Models\PriceList;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function addpricelist(Request $request){
         $request->validate([
        'file' => 'required|mimes:pdf|max:2048', // Max 2MB
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/pricelists'), $filename); // Save to public/uploads/categories

                $path= 'uploads/pricelists/' . $filename;

         PriceList::create([
            // 'price_data' => $filename,
            'price_data' => $path, // public access path
        ]);

         return response()->json([
            'status' => 200,
            'message' => 'Price list uploaded and saved successfully!',
        ]);
    }

    return response()->json([
        'status' => 400,
        'message' => 'No file uploaded.',
    ]);
    }

    public function updateprice(Request $request){
         $catid = $request->price_id;
        $status = $request->statusprice;
        $priclist = $request->price_pdf;

        $updatecat = PriceList::findOrFail($catid);

        $updatecat->update([
            "status" => $status,
            "price_data" => $priclist,
        ]);





        return response()->json([
            'status' => '200',
            'message' => 'Minimum Order Value update Successfully'
        ]);
    }


     public function updateheader(Request $request){
        $status= $request->headerstatus;
          $header_id = $request->header_id;
          $text  = $request->headertext;

          $updatecat = HeaderText::findOrFail($header_id);

           $updatecat->update([
                "text" => $text,
                "action" => $status,
            ]);

              return response()->json([
                'status' => '200',
                'message' => 'HeaderText update Successfully'
            ]);


    }
}