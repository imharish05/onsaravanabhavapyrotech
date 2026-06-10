<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index(){

        $orderstatus = OrderStatus::all();
        return view('vendorpages.orderstatus',compact('orderstatus'));
    }

    public function addstatus(Request $request){

        $status = $request->status;
           OrderStatus::create([
        "order_status" => $status,
    ]);
     $orderstatus = OrderStatus::all();

     return response()->json([
            'status' => 200,
            'message' => 'Status uploaded and saved successfully!',
        ]);


    }

    public function updatestatus(Request $request){
        $id = $request->id;
        $status = $request->status;
        

         $orderstatus = ProductOrder::where('id',$id);
         
       

          $orderstatus->update([
                "status" => $request->status,
            ]);
            
            

            $orderstatus =  ProductOrder::all();

               return response()->json([
            'status' => 200,
            'message' => 'Status uploaded and saved successfully!',
        ]);

    }
    
    public function destroy($id){
        OrderStatus::findOrFail($id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Order Status deleted successfully'
        ]);
    }
}