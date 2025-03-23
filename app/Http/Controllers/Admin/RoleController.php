<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\{StoreRequest,EditRequest};

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('admin.role.index',compact('roles'));
    }

    public function store(StoreRequest $request){
        Role::create($request->validated());
        return  to_route('roles.index')->with('success',trans('lang.created')); 
    }

    public function update(EditRequest $request){
        Role::whereId($request->id)->update($request->validated());
        return  to_route('roles.index')->with('success',trans('lang.updated')); 
    }
}
