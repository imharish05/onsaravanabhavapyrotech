<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller {
    public function index() {
        $cities = City::join('state_list', 'state_list.id', '=', 'city_list.state_code')
            ->select('city_list.*', 'state_list.state as state_name')
            ->get();
        $states = State::all();
        return view('pages.city', compact('cities', 'states'));
    }

    public function addcity(Request $request) {
        $validator = Validator::make($request->all(), [
            'city_name' => 'required|string|max:255',
            'city_code' => 'nullable|string|max:255',
            'state_code' => 'required|exists:state_list,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()->first()]);
        }

        City::create([
            'city_name' => $request->city_name,
            'city_code' => $request->city_code,
            'state_code' => $request->state_code,
        ]);

        return response()->json(['status' => '200', 'message' => 'City Added Successfully']);
    }

    public function updatecity(Request $request) {
        $validator = Validator::make($request->all(), [
            'city_name' => 'required|string|max:255',
            'city_code' => 'nullable|string|max:255',
            'city_id' => 'required|exists:city_list,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()->first()]);
        }

        $city = City::findOrFail($request->city_id);
        $city->update([
            'city_name' => $request->city_name,
            'city_code' => $request->city_code,
        ]);

        return response()->json(['status' => '200', 'message' => 'City Updated Successfully']);
    }

    public function deletecity(Request $request, $id) {
        City::where('id', $id)->delete();
        return response()->json(['status' => '200', 'message' => 'City Deleted Successfully']);
    }

    public function bulkUpload(Request $request) {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => 'Invalid file format. Please upload a CSV file.']);
        }

        $file = $request->file('file');
        $fileHandle = fopen($file->getRealPath(), 'r');
        $header = fgetcsv($fileHandle);
        $inserted = 0; $updated = 0; $skipped = 0;

        while (($row = fgetcsv($fileHandle)) !== false) {
            $data = array_combine($header, $row);
            $cityName = trim($data['city_name'] ?? '');
            $cityCode = trim($data['city_code'] ?? '');
            $stateCode = trim($data['state_code'] ?? '');

            if (empty($cityName) || empty($stateCode)) {
                $skipped++;
                continue;
            }

            $city = City::updateOrCreate(
                ['city_name' => $cityName, 'state_code' => $stateCode],
                ['city_code' => $cityCode]
            );

            if ($city->wasRecentlyCreated) {
                $inserted++;
            } else {
                $updated++;
            }
        }

        fclose($fileHandle);
        return response()->json(['status' => 200, 'message' => "Upload complete. Inserted: $inserted, Updated: $updated, Skipped: $skipped"]);
    }

    public function exportCities() {
        $cities = City::join('state_list', 'state_list.id', '=', 'city_list.state_code')
            ->select('city_list.*', 'state_list.state as state_name')
            ->get();
        $filename = "cities_current_" . date('Y-m-d') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['state_code', 'city_name', 'city_code']);
        foreach ($cities as $city) {
            fputcsv($handle, [$city->state_code, $city->city_name, $city->city_code]);
        }
        fclose($handle);
        exit;
    }
}
