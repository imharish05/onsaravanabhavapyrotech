<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = \App\Models\AboutUs::first();
        if (!$aboutUs) {
            $aboutUs = new \App\Models\AboutUs();
        }
        return view('pages.about-us-settings', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'eyebrow' => 'nullable|string|max:255',
            'heading' => 'nullable|string',
            'description' => 'nullable|string',
            'products_count' => 'nullable|integer',
            'customers_count' => 'nullable|integer',
            'success_percentage' => 'nullable|integer|max:100',
            'badge1_text' => 'nullable|string|max:255',
            'badge2_text' => 'nullable|string|max:255',
            'badge3_text' => 'nullable|string|max:255',
            'action_text' => 'nullable|string|max:255',
            'action_description' => 'nullable|string',
            'action_button_text' => 'nullable|string|max:255',
            'action_button_link' => 'nullable|string|max:255',
            'hero_eyebrow' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'purpose_eyebrow' => 'nullable|string|max:255',
            'purpose_heading' => 'nullable|string|max:255',
            'p1_icon' => 'nullable|string|max:255',
            'p1_title' => 'nullable|string|max:255',
            'p1_text' => 'nullable|string',
            'p2_icon' => 'nullable|string|max:255',
            'p2_title' => 'nullable|string|max:255',
            'p2_text' => 'nullable|string',
            'p3_icon' => 'nullable|string|max:255',
            'p3_title' => 'nullable|string|max:255',
            'p3_text' => 'nullable|string',
            'p4_icon' => 'nullable|string|max:255',
            'p4_title' => 'nullable|string|max:255',
            'p4_text' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $aboutUs = \App\Models\AboutUs::first();
        if (!$aboutUs) {
            $aboutUs = new \App\Models\AboutUs();
        }

        $aboutUs->eyebrow = $request->eyebrow;
        $aboutUs->heading = $request->heading;
        $aboutUs->description = $request->description;
        $aboutUs->products_count = $request->products_count ?? 0;
        $aboutUs->customers_count = $request->customers_count ?? 0;
        $aboutUs->success_percentage = $request->success_percentage ?? 0;
        $aboutUs->badge1_text = $request->badge1_text;
        $aboutUs->badge2_text = $request->badge2_text;
        $aboutUs->badge3_text = $request->badge3_text;
        $aboutUs->action_text = $request->action_text;
        $aboutUs->action_description = $request->action_description;
        $aboutUs->action_button_text = $request->action_button_text;
        $aboutUs->action_button_link = $request->action_button_link;
        $aboutUs->hero_eyebrow = $request->hero_eyebrow;
        $aboutUs->hero_title = $request->hero_title;
        $aboutUs->hero_subtitle = $request->hero_subtitle;
        $aboutUs->purpose_eyebrow = $request->purpose_eyebrow;
        $aboutUs->purpose_heading = $request->purpose_heading;
        $aboutUs->p1_icon = $request->p1_icon;
        $aboutUs->p1_title = $request->p1_title;
        $aboutUs->p1_text = $request->p1_text;
        $aboutUs->p2_icon = $request->p2_icon;
        $aboutUs->p2_title = $request->p2_title;
        $aboutUs->p2_text = $request->p2_text;
        $aboutUs->p3_icon = $request->p3_icon;
        $aboutUs->p3_title = $request->p3_title;
        $aboutUs->p3_text = $request->p3_text;
        $aboutUs->p4_icon = $request->p4_icon;
        $aboutUs->p4_title = $request->p4_title;
        $aboutUs->p4_text = $request->p4_text;

        // Handle Banner Image
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '_banner_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $fileName);
            $aboutUs->banner_image = 'uploads/about/' . $fileName;
        }

        // Handle Main Image
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = time() . '_main_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $fileName);
            $aboutUs->main_image = 'uploads/about/' . $fileName;
        }

        $aboutUs->save();

        return redirect()->back()->with('success', 'About Us settings updated successfully.');
    }

    public function show()
    {
        $about = \App\Models\AboutUs::first();
        if (!$about) {
            $about = new \App\Models\AboutUs();
        }
        return view('pages.about', compact('about'));
    }
}
