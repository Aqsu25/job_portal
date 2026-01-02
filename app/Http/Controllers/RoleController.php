<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(10);
        $roles = Role::orderBy('created_at', 'DESC')->paginate(10);
        return view('roles.list', compact('permissions', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'permission' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $role = Role::create([
            'name' => $request->name,
        ]);
        if ($role->name !== 'admin') {
            $role->syncPermissions($request->permission);
        }
        return redirect()->route('roles.index')->with('success', 'Role Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'permission' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $role->update([
            'name' => $request->name,
        ]);
        if ($role->name !== 'admin') {
            $role->syncPermissions($request->permission);
        } 
        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role Deleted successfully.');
    }
}
