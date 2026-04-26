<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name')->get();
        return view('admin.permission.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'nullable|string|max:50',
        ]);

        Permission::create([
            'name'       => $request->name,
            'guard_name' => $request->guard_name ?: 'admin',
        ]);

        return to_route('admin.permissions.index')->with('success', trans('lang.created'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'         => 'required|exists:permissions,id',
            'name'       => ['required','string','max:255', Rule::unique('permissions','name')->ignore($request->id)],
            'guard_name' => 'nullable|string|max:50',
        ]);

        $permission = Permission::findOrFail($request->id);
        $permission->update([
            'name'       => $request->name,
            'guard_name' => $request->guard_name ?: $permission->guard_name,
        ]);

        return to_route('admin.permissions.index')->with('success', trans('lang.updated'));
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return back()->with('success', trans('lang.deleted'));
    }
}
