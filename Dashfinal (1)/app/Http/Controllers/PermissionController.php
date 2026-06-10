<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permission')->only(['index']);
        $this->middleware('permission:create permission')->only(['create', 'store']);
        $this->middleware('permission:edit permission')->only(['edit', 'update']);
        $this->middleware('permission:delete permission')->only(['destroy']);
    }

    public function index()
    {
        $permissions = Permission::all();
        return view('authentication.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $navbars = Navbar::all();
        return view('authentication.permissions.create', compact('navbars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'navbar_id' => 'required|exists:navbars,id',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'navbar_id' => $request->navbar_id,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission created!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $navbars = Navbar::all();
        return view('authentication.permissions.edit', compact('permission', 'navbars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'navbar_id' => 'required|exists:navbars,id',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name,
            'navbar_id' => $request->navbar_id,
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
    }
}
