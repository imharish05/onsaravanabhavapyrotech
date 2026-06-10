<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function index()
    {
        $homeSetting = \App\Models\HomeSetting::first();
        if (!$homeSetting) {
            $homeSetting = new \App\Models\HomeSetting();
        }
        $products = \App\Models\Product::orderBy('product_name')->get();
        return view('pages.home-settings', compact('homeSetting', 'products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_eyebrow' => 'nullable|string|max:255',
            'welcome_heading' => 'nullable|string|max:255',
            'welcome_text' => 'nullable|string',
            'welcome_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'welcome_badge_count' => 'nullable|string|max:255',
            'welcome_badge_label' => 'nullable|string|max:255',
            'badge1_text' => 'nullable|string|max:255',
            'badge2_text' => 'nullable|string|max:255',
            'badge3_text' => 'nullable|string|max:255',
            'badge4_text' => 'nullable|string|max:255',
            'welcome_button_text' => 'nullable|string|max:255',
            'welcome_button_link' => 'nullable|string|max:255',
            'offer_heading' => 'nullable|string|max:255',
            'offer_subheading' => 'nullable|string',
            'offer_end_date' => 'nullable|date',
            'offer_button_text' => 'nullable|string|max:255',
            'offer_button_link' => 'nullable|string|max:255',
            'order_steps' => 'nullable|array',
            'products_eyebrow' => 'nullable|string|max:255',
            'products_heading' => 'nullable|string|max:255',
            'featured_product_ids' => 'nullable|array',
            'why_heading_data' => 'nullable|array',
            'why_pillars' => 'nullable|array',
            'why_dials' => 'nullable|array',
            'why_stats' => 'nullable|array',
            'cta_data' => 'nullable|array',
        ]);

        $homeSetting = \App\Models\HomeSetting::first();
        if (!$homeSetting) {
            $homeSetting = new \App\Models\HomeSetting();
        }

        $homeSetting->hero_eyebrow = $request->hero_eyebrow;
        $homeSetting->welcome_heading = $request->welcome_heading;
        $homeSetting->welcome_text = $request->welcome_text;
        $homeSetting->welcome_badge_count = $request->welcome_badge_count;
        $homeSetting->welcome_badge_label = $request->welcome_badge_label;
        $homeSetting->badge1_text = $request->badge1_text;
        $homeSetting->badge2_text = $request->badge2_text;
        $homeSetting->badge3_text = $request->badge3_text;
        $homeSetting->badge4_text = $request->badge4_text;
        $homeSetting->welcome_button_text = $request->welcome_button_text;
        $homeSetting->welcome_button_link = $request->welcome_button_link;
        $homeSetting->offer_heading = $request->offer_heading;
        $homeSetting->offer_subheading = $request->offer_subheading;
        $homeSetting->offer_end_date = $request->offer_end_date;
        $homeSetting->offer_button_text = $request->offer_button_text;
        $homeSetting->offer_button_link = $request->offer_button_link;
        $homeSetting->order_steps = $request->order_steps;
        $homeSetting->products_eyebrow = $request->products_eyebrow;
        $homeSetting->products_heading = $request->products_heading;
        $homeSetting->featured_product_ids = $request->featured_product_ids;
        $homeSetting->why_heading_data = $request->why_heading_data;
        $homeSetting->why_pillars = $request->why_pillars;
        $homeSetting->why_dials = $request->why_dials;
        $homeSetting->why_stats = $request->why_stats;
        $homeSetting->cta_data = $request->cta_data;

        // Handle File Upload
        if ($request->hasFile('welcome_image')) {
            $file = $request->file('welcome_image');
            $fileName = time() . '_welcome_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/home'), $fileName);
            $homeSetting->welcome_image = 'uploads/home/' . $fileName;
        }

        $homeSetting->save();

        return redirect()->back()->with('success', 'Home Page Welcome Settings updated successfully.');
    }
}
