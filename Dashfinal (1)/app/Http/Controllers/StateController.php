<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller {
    public function index() {
        $states = State::all();
        return view('pages.state', compact('states'));
    }

    public function addstate(Request $request) {
        $validator = Validator::make($request->all(), [
            'state' => 'required|string|max:255|unique:state_list,state',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()->first()]);
        }

        State::create(['state' => $request->state]);

        return response()->json(['status' => '200', 'message' => 'State Added Successfully']);
    }

    public function updatestate(Request $request) {
        $validator = Validator::make($request->all(), [
            'state' => 'required|string|max:255',
            'state_id' => 'required|exists:state_list,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'message' => $validator->errors()->first()]);
        }

        $state = State::findOrFail($request->state_id);
        $state->update(['state' => $request->state]);

        return response()->json(['status' => '200', 'message' => 'State Updated Successfully']);
    }

    public function deletestate(Request $request, $id) {
        State::where('id', $id)->delete();
        return response()->json(['status' => '200', 'message' => 'State Deleted Successfully']);
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
            $stateName = trim($data['state'] ?? '');

            if (empty($stateName)) {
                $skipped++;
                continue;
            }

            $state = State::updateOrCreate(['state' => $stateName]);

            if ($state->wasRecentlyCreated) {
                $inserted++;
            } else {
                $updated++;
            }
        }

        fclose($fileHandle);
        return response()->json(['status' => 200, 'message' => "Upload complete. Inserted: $inserted, Updated: $updated, Skipped: $skipped"]);
    }

    public function exportStates() {
        $states = State::all();
        $filename = "states_current_" . date('Y-m-d') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['state']);
        foreach ($states as $state) {
            fputcsv($handle, [$state->state]);
        }
        fclose($handle);
        exit;
    }
}
