<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.list', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $role = Role::all();
        return view('permissions.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
        ]);
        if ($validator->fails()) {
            return redirect()->route('permissions.create')->withErrors($validator)->withInput();
        }
        $adminrole = Role::where('name', 'admin')->first();
        $permission = Permission::create([
            'name' => $request->name,
        ]);
        if ($adminrole) {
            $adminrole->givePermissionTo($permission);
        }

        return redirect()->route('permissions.index')->with('success', 'Permission Created Successfully!');
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
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,' . $id,
        ]);
        if ($validator->fails()) {
            return redirect()->route('permissions.edit', $id)->withErrors($validator)->withInput();
        }
        $permission->update([
            'name' => $request->name,
        ]);
        $adminrole = Role::where('name', 'admin')->first();
        if ($adminrole && !$adminrole->hasPermissionTo($permission->name)) {
            $adminrole->givePermissionTo($permission);
        }

        return redirect()->route('permissions.index')->with('success', 'Permission Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
