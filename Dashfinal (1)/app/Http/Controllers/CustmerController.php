<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\DataTables\CustomerDataTable;
use App\Models\Custmer;

class CustmerController extends Controller
{
     public function index() {
       $customer = Custmer::all();
        return view('pages.customer',compact('customer'));
    }

     public function getCustomer() {
        return datatables()->eloquent( Custmer::query() )->toJson();
    }

}
