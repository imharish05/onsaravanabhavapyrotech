<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Navbar;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role')->only(['index']);
        $this->middleware('permission:create role')->only(['create', 'store']);
        $this->middleware('permission:edit role')->only(['edit', 'update', 'assignPermissionPage', 'assignPermission']);
        $this->middleware('permission:delete role')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::oldest()->get();
        return view('authentication.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('authentication.roles.create', [
            'role' => new Role()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required'
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('authentication.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'guard_name' => 'required|string',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name'       => $request->name,
            'guard_name' => $request->guard_name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        // Final fallback guard against tampering
        $this->authorize('delete role'); 
        
        $role = Role::findOrFail($id);
        
        // Anti-Lockout Strategy: Never allow deleting the Super Admin 
        if($role->name === 'Super Admin') {
            abort(403, 'SYSTEM: Super Admin cannot be deleted.');
        }
        
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted!');
    }

    public function assignPermissionPage($id)
    {
        $role = Role::findOrFail($id);
        $navbars = Navbar::with('permissions')
            ->where('navbar_name', '!=', 'Permissions')
            ->get();

        return view('authentication.roles.assignpermission', compact('role', 'navbars'));
    }

    public function assignPermission(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $role = Role::findOrFail($request->role_id);
        $permissions = Permission::whereIn('id', $request->permissions ?? [])->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Permissions assigned successfully!');
    }
}
