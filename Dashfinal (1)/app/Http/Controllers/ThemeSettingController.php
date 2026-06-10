<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ThemeSetting;

class ThemeSettingController extends Controller
{
    public function index()
    {
        $setting = ThemeSetting::first();
        return view('pages.theme-settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'primary_color' => 'nullable|string|max:50',
            'secondary_color' => 'nullable|string|max:50',
            'tertiary_color' => 'nullable|string|max:50',
            'quaternary_color' => 'nullable|string|max:50',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $setting = ThemeSetting::first();
        if (!$setting) {
            $setting = new ThemeSetting();
        }

        $setting->primary_color = $request->primary_color;
        $setting->secondary_color = $request->secondary_color;
        $setting->tertiary_color = $request->tertiary_color;
        $setting->quaternary_color = $request->quaternary_color;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/theme'), $fileName);
            $setting->logo = 'uploads/theme/' . $fileName;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Theme Settings updated successfully.');
    }
}