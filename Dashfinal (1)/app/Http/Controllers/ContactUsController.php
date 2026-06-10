<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactUs = \App\Models\ContactUs::first();
        if (!$contactUs) {
            $contactUs = new \App\Models\ContactUs();
        }
        return view('pages.contact-us-settings', compact('contactUs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'page_title' => 'nullable|string|max:255',
            'hero_eyebrow' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'heading' => 'nullable|string|max:255',
            'subheading' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'phone_2' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'map_iframe' => 'nullable|string',
            'form_bg_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'step1_title' => 'nullable|string|max:255',
            'step1_text' => 'nullable|string',
            'step2_title' => 'nullable|string|max:255',
            'step2_text' => 'nullable|string',
            'step3_title' => 'nullable|string|max:255',
            'step3_text' => 'nullable|string',
            'step4_title' => 'nullable|string|max:255',
            'step4_text' => 'nullable|string',
        ]);

        $contactUs = \App\Models\ContactUs::first();
        if (!$contactUs) {
            $contactUs = new \App\Models\ContactUs();
        }

        $contactUs->page_title = $request->page_title;
        $contactUs->hero_eyebrow = $request->hero_eyebrow;
        $contactUs->hero_title = $request->hero_title;
        $contactUs->hero_subtitle = $request->hero_subtitle;
        $contactUs->heading = $request->heading;
        $contactUs->subheading = $request->subheading;
        $contactUs->address = $request->address;
        $contactUs->phone = $request->phone;
        $contactUs->phone_2 = $request->phone_2;
        $contactUs->email = $request->email;
        $contactUs->map_iframe = $request->map_iframe;

        $contactUs->step1_title = $request->step1_title;
        $contactUs->step1_text = $request->step1_text;
        $contactUs->step2_title = $request->step2_title;
        $contactUs->step2_text = $request->step2_text;
        $contactUs->step3_title = $request->step3_title;
        $contactUs->step3_text = $request->step3_text;
        $contactUs->step4_title = $request->step4_title;
        $contactUs->step4_text = $request->step4_text;

        // Handle Background Image
        if ($request->hasFile('form_bg_image')) {
            $file = $request->file('form_bg_image');
            $fileName = time() . '_contactbg_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/contact'), $fileName);
            $contactUs->form_bg_image = 'uploads/contact/' . $fileName;
        }

        $contactUs->save();

        return redirect()->back()->with('success', 'Contact Us settings updated successfully.');
    }

    public function show()
    {
        $contact = \App\Models\ContactUs::first();
        if (!$contact) {
            $contact = new \App\Models\ContactUs();
        }
        return view('pages.contact', compact('contact'));
    }
}
