<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\{StoreRequest,EditRequest};

class AdminController extends Controller
{
    public function index(){
        $admins = Admin::get();
        return view('admin.admins.index',compact('admins'));
    }

    public function create(){
        $roles=Role::get(['id','name']);
        return view('admin.admins.add',compact('roles'));
    }

    public function Store(StoreRequest $request){
        $admin = Admin::create($request->validated());
        $role=Role::find($request->role_id);
        $admin->assignRole($role);
        return  to_route('admins.index')->with('success',trans('lang.created')); 
    }

    public function edit($id){
        $roles=Role::get(['id','name']);
        $admin=Admin::find($id);
        return view('admin.admins.edit',compact('admin','roles'));
    }

    public function update(EditRequest $request){
        $admin=Admin::find($request->id);
        $admin->update($request->validated());
        $admin->syncRoles([$request->role_id]);
        return  to_route('admins.index')->with('success',trans('lang.updated')); 
    }
}
