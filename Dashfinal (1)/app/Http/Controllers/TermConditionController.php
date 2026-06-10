<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    public function index()
    {
        $termCondition = \App\Models\TermCondition::first();
        return view('pages.terms-condition', compact('termCondition'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $termCondition = \App\Models\TermCondition::first();
        if ($termCondition) {
            $termCondition->update(['content' => $request->content]);
        } else {
            \App\Models\TermCondition::create(['content' => $request->content]);
        }

        return redirect()->back()->with('success', 'Terms and Conditions updated successfully.');
    }
}
