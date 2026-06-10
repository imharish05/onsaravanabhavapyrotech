<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $paymentSetting = \App\Models\PaymentSetting::first();
        if (!$paymentSetting) {
            $paymentSetting = new \App\Models\PaymentSetting();
        }
        return view('pages.payment-settings', compact('paymentSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'page_title' => 'nullable|string|max:255',
            'hero_eyebrow' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'gpay_label' => 'nullable|string|max:255',
            'gpay_number' => 'nullable|string|max:255',
            'gpay_qr_code' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'phonepe_label' => 'nullable|string|max:255',
            'phonepe_number' => 'nullable|string|max:255',
            'phonepe_qr_code' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'bank_name' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'additional_notes' => 'nullable|string',
            'assist_1_text' => 'nullable|string|max:255',
            'assist_2_text' => 'nullable|string|max:255',
            'assist_3_text' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
        ]);

        $paymentSetting = \App\Models\PaymentSetting::first();
        if (!$paymentSetting) {
            $paymentSetting = new \App\Models\PaymentSetting();
        }

        $paymentSetting->page_title = $request->page_title;
        $paymentSetting->hero_eyebrow = $request->hero_eyebrow;
        $paymentSetting->hero_title = $request->hero_title;
        $paymentSetting->hero_subtitle = $request->hero_subtitle;
        $paymentSetting->heading = $request->heading;
        $paymentSetting->gpay_label = $request->gpay_label;
        $paymentSetting->gpay_number = $request->gpay_number;
        $paymentSetting->phonepe_label = $request->phonepe_label;
        $paymentSetting->phonepe_number = $request->phonepe_number;
        $paymentSetting->bank_name = $request->bank_name;
        $paymentSetting->account_name = $request->account_name;
        $paymentSetting->account_number = $request->account_number;
        $paymentSetting->ifsc_code = $request->ifsc_code;
        $paymentSetting->branch_name = $request->branch_name;
        $paymentSetting->additional_notes = $request->additional_notes;
        $paymentSetting->assist_1_text = $request->assist_1_text;
        $paymentSetting->assist_2_text = $request->assist_2_text;
        $paymentSetting->assist_3_text = $request->assist_3_text;
        $paymentSetting->whatsapp_number = $request->whatsapp_number;

        if ($request->hasFile('gpay_qr_code')) {
            $file = $request->file('gpay_qr_code');
            $fileName = time() . '_gpay_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/payment'), $fileName);
            $paymentSetting->gpay_qr_code = 'uploads/payment/' . $fileName;
        }

        if ($request->hasFile('phonepe_qr_code')) {
            $file = $request->file('phonepe_qr_code');
            $fileName = time() . '_phonepe_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/payment'), $fileName);
            $paymentSetting->phonepe_qr_code = 'uploads/payment/' . $fileName;
        }

        $paymentSetting->save();

        return redirect()->back()->with('success', 'Payment Settings updated successfully.');
    }

    public function show()
    {
        $paymentSetting = \App\Models\PaymentSetting::first();
        return view('pages.payment', compact('paymentSetting'));
    }
}
