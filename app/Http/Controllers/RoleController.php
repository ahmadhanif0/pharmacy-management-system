<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = "user Roles";
        $roles = Role::with('permissions')->get();
        $permissions = Permission::get();
        return view('roles', compact(
            'title',
            'roles',
            'permissions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|max:100',
            'permission' => 'required'
        ]);
        $role = Role::create(['name' => $request->role]);
        $permissions = $request->permission;
        $role->syncPermissions($permissions);
        $notification = array(
            'message' => "Role Created Successfully!!",
            'alert-type' => "success"
        );
        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('edit_roles', compact('role', 'permissions', 'rolePermissions'));
    }


    /**
     * Update the specified role and its permissions.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles')
            ->with('message', 'Role updated successfully!')
            ->with('alert-type', 'success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        $notification = array(
            'message' => "Role deleted successfully!!.",
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
