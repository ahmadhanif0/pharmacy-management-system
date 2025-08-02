<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Permissions";
        $permissions = Permission::get();
        return view('permissions', compact(
            'title',
            'permissions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'permission' => 'required|max:200',
        ]);
        foreach (explode(',', $request->permission) as  $perm) {
            $permission = Permission::create(['name' => $perm]);
            $permission->assignRole('super-admin');
        }
        $notification = array(
            'message' => "Permission Created Successfully!!",
            'alert-type' => "success"
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $permission = Permission::find($request->id);
        $permission->delete();
        $notification = array(
            'message' => "Permission has been deleted",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
