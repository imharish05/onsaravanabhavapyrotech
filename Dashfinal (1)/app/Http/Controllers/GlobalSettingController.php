<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GlobalSettingController extends Controller
{
    public function index()
    {
        $setting = GlobalSetting::first();
        if (!$setting) {
            $setting = GlobalSetting::create([
                'meta_title' => 'Default Meta Title',
                'company_name' => 'Your Company Name'
            ]);
        }
        return view('admin.global-settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,svg|max:1024',
        ]);

        $setting = GlobalSetting::first();

        if ($request->hasFile('logo')) {
            $logoName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/settings'), $logoName);
            $setting->logo = 'uploads/settings/' . $logoName;
        }

        if ($request->hasFile('favicon')) {
            $faviconName = time() . '_favicon.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads/settings'), $faviconName);
            $setting->favicon = 'uploads/settings/' . $faviconName;
        }

        $setting->update([
            'meta_title' => $request->meta_title,
            'company_name' => $request->company_name,
            'whatsapp_number' => $request->whatsapp_number,
            'phone_number' => $request->phone_number,
            'footer_content' => $request->footer_content,
            'address' => $request->address,
            'header_codes' => $request->header_codes,
            'top_offer_text' => $request->top_offer_text,
            'top_offer_text_2' => $request->top_offer_text_2,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect()->back()->with('success', 'Global Settings Updated Successfully!');
    }
}
