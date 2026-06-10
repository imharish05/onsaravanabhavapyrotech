<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::all();
        $roles = Role::all();
        return view('pages.staff_management', compact('staffs', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        return redirect()->back()->with('success', 'Staff added successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:6'
        ]);

        $user = User::findOrFail($id);
        
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        if($user->hasRole('Super Admin') || $user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Cannot delete this user.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Staff deleted successfully.');
    }
}
