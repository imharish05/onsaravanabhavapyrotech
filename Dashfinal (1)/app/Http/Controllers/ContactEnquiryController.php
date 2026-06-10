<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = \App\Models\ContactEnquiry::latest()->get();
        return view('pages.contact-enquiries', compact('enquiries'));
    }
}
