<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index(){
        $area = Area::join('city_list','city_list.id','=','areas.city_id')
            ->join('state_list', 'state_list.id', '=', 'city_list.state_code')
            ->select('areas.*','city_list.city_name', 'state_list.state as state_name')
            ->get();
        $states = State::all();
        return view( 'pages.area',compact( 'area', 'states') );
    }

     public function getStateCities($state_id)
    {

       $cities = DB::table('city_list')
          ->select('city_name','id')
          ->where('state_code', '=', $state_id)
          ->get();

       return response()->json($cities);
    }

public function addarea(Request $request)
{
    $city_id = $request->city_bill;
    $areas_raw = $request->area;
    $pincode = $request->pincode;

    $areas = array_filter(array_map('trim', explode(',', $areas_raw)));

    $inserted = [];
    $duplicates = [];

    foreach ($areas as $areaName) {

        $exists = Area::where('city_id', $city_id)
                      ->where('area_name', $areaName)
                      ->exists();

        if ($exists) {
            $duplicates[] = $areaName;
        } else {

            Area::create([
                'city_id' => $city_id,
                'area_name' => $areaName,
                'pincode' => $pincode
            ]);

            $inserted[] = $areaName;
        }
    }

    return response()->json([
        'status' => '200',
        'message' => 'Area Added Successfully',
        'inserted' => $inserted,
        'duplicates' => $duplicates,
    ]);
}

// delete area
public function deletearea(Request $request, $id){

    $Area = Area::where('id',$id)->delete();

      return response()->json([
        'status' => '200',
        'message' => 'Area delete successfully.'
    ]);

}

public function bulkUpload(Request $request)
{
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'file' => 'required|file|mimes:csv,txt',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'message' => 'Invalid file format. Please upload a CSV file.',
        ]);
    }

    $file = $request->file('file');
    $fileHandle = fopen($file->getRealPath(), 'r');

    $header = fgetcsv($fileHandle); // Get column names

    $inserted = 0;
    $updated = 0;
    $skipped = 0;

    while (($row = fgetcsv($fileHandle)) !== false) {

        $data = array_combine($header, $row);

        $city_id = isset($data['city_id']) && is_numeric(trim($data['city_id'])) ? (int) trim($data['city_id']) : null;
        $area_name = trim($data['area_name'] ?? '');
        $pincode = trim($data['pincode'] ?? '');

        if (empty($city_id) || empty($area_name)) {
            $skipped++;
            continue;
        }

        $area = Area::updateOrCreate(
            ['city_id' => $city_id, 'area_name' => $area_name],
            ['pincode' => $pincode]
        );

        if ($area->wasRecentlyCreated) {
            $inserted++;
        } else {
            $updated++;
        }
    }

    fclose($fileHandle);

    return response()->json([
        'status' => 200,
        'message' => "Upload complete. Inserted: $inserted, Updated: $updated, Skipped: $skipped",
    ]);
}

// update area
public function upadtearea(Request $request){

    $area_id = $request->area_id;
    $area_name = $request->area;

    $updatearea = Area::findOrFail($area_id);

    $updatearea->update([
        "area_name" =>  $area_name,
        "pincode" => $request->pincode
    ]);

          return response()->json([
        'status' => '200',
        'message' => 'Area Update successfully.'
    ]);
}


//    public function placeOrder(Request $request)
// {
//     DB::beginTransaction();

//     try {
//         $request->validate([
//             'customer.name' => 'required|string|max:255',
//             'customer.phone' => 'required|string|max:20',
//             'customer.email' => 'nullable|email',
//             'customer.address' => 'required|string',
//             'customer.state' => 'nullable|string',
//             'customer.city' => 'nullable|string',
//             'customer.pincode' => 'nullable|string',
//             'pro_ids' => 'required|array',
//             'qtys' => 'required|array',
//             'subtotal' => 'required|numeric',
//             'discount' => 'required|numeric',
//             'total' => 'required|numeric',
//         ]);

//         // Check if customer exists by phone number
//         $customer = Customer::where('phone_number', $request->customer['phone'])->first();

//         if ($customer) {
//             // Update existing customer
//             $customer->name = $request->customer['name'];
//             $customer->email = $request->customer['email'];
//             $customer->address = $request->customer['address'];
//             $customer->state = $request->customer['state'];
//             $customer->city = $request->customer['city'];
//             $customer->pincode = $request->customer['pincode'];
//             $customer->save();
//         } else {
//             // Insert new customer
//             $customer = new Customer();
//             $customer->name = $request->customer['name'];
//             $customer->phone_number = $request->customer['phone'];
//             $customer->email = $request->customer['email'];
//             $customer->address = $request->customer['address'];
//             $customer->state = $request->customer['state'];
//             $customer->city = $request->customer['city'];
//             $customer->pincode = $request->customer['pincode'];
//             $customer->save();
//         }

//         // Generate order ID
//         $maxValue = ProductOrder::max('id');
//         $invID = ($maxValue !== null) ? $maxValue + 1 : 1;
//         $invID = str_pad($invID, 5, '0', STR_PAD_LEFT);
//         $orderid = "order" . $invID;

//         // Save order
//         $order = new ProductOrder();
//         $order->user_id = $customer->id;
//         $order->sub_total = $request->subtotal;
//         $order->discount = $request->discount;
//         $order->total = $request->total;
//         $order->oeder_id = $orderid;
//         $order->save();

//         // Save product slots
//         foreach ($request->pro_ids as $index => $productId) {
//             DB::table('product_slots')->insert([
//                 'order_id' => $orderid,
//                 'user_id' => $customer->id,
//                 'product_id' => $productId,
//                 'qty' => $request->qtys[$index],
//                 'created_at' => now(),
//                 'updated_at' => now(),
//             ]);
//         }

//         // Optional: Send confirmation email
//       if ($customer->email) {
//     Mail::to($customer->email)->send(new OrderPlacedMail($order, $customer));
// }

//         DB::commit();

//         // Authenticate user
//         Auth::guard('customer')->login($customer);

//         return response()->json([
//             'status' => 'success',
//             'redirect' => url('/thankyou')
//         ]);

//     } catch (\Exception $e) {
//         DB::rollBack();
//         return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
//     }
// }



    public function exportAreas()
    {
        $areas = \App\Models\Area::all();
        $filename = "areas_current_" . date('Y-m-d') . ".csv";

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $handle = fopen('php://output', 'w');

        // Headers matching bulkUpload columns
        fputcsv($handle, ['city_id', 'area_name', 'pincode']);

        foreach ($areas as $area) {
            fputcsv($handle, [
                $area->city_id,
                $area->area_name,
                $area->pincode
            ]);
        }

        fclose($handle);
        exit;
    }
}
