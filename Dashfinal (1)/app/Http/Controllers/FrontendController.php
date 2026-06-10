<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        // 1. Fetch Top Banners
        $banners = \App\Models\BannerImage::orderBy('id', 'desc')->get();
        // 2. Fetch Welcome Settings
        $homeSetting = \App\Models\HomeSetting::first();
        // 3. Fetch Product Categories
        $categories = \App\Models\Category::where('status', 1)->get();
        // 4. Fetch Brands
        $brands = \App\Models\Brand::all();

        return view('pages.home', compact('banners', 'homeSetting', 'categories', 'brands'));
    }
}
