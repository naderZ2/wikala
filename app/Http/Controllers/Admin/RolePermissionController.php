<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\{Role,Permission};
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolePermission\EditRequest;

class RolePermissionController extends Controller
{
    public function show($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::where('guard_name', $role->guard_name)->get();
        $rolePermissions = $role->permissions()->pluck('id');
        return view('admin.role.edit',compact('permissions','rolePermissions','role'));
    }

    public function update(EditRequest $request){
        $role = Role::find($request->role_id);
        $role->syncPermissions($request->permissions);
        return  to_route('roles.index')->with('success',trans('lang.updated')); 
    }
}
