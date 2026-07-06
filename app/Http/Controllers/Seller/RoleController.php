<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    use ResponsesTrait;

    public function index()
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $roles = Role::where('guard_name', 'seller-api')
                     ->where('seller_id', $mainSellerId)
                     ->with('permissions')
                     ->get();
                     
        return $this->success($roles, 'Roles fetched successfully');
    }

    public function store(Request $request)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();

        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('roles', 'name')->where(function ($query) use ($mainSellerId) {
                    return $query->where('guard_name', 'seller-api')
                                 ->where('seller_id', $mainSellerId);
                })
            ],
            'permissions' => 'nullable|array',
            'permissions.*' => [
                'exists:permissions,name',
                function ($attribute, $value, $fail) {
                    if (!Permission::where('name', $value)->where('guard_name', 'seller-api')->exists()) {
                        $fail("The permission {$value} is invalid for sellers.");
                    }
                },
            ]
        ]);

        $role = Role::create([
            'name' => $request->name, 
            'guard_name' => 'seller-api',
        ]);
        $role->seller_id = $mainSellerId;
        $role->save();
        
        if ($request->has('permissions') && !empty($request->permissions)) {
            $role->syncPermissions($request->permissions);
        }

        return $this->success($role->load('permissions'), 'Role created successfully');
    }

    public function show($id)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $role = Role::where('guard_name', 'seller-api')
                    ->where('seller_id', $mainSellerId)
                    ->with('permissions')
                    ->findOrFail($id);
                    
        return $this->success($role, 'Role fetched successfully');
    }

    public function update(Request $request, $id)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $role = Role::where('guard_name', 'seller-api')
                    ->where('seller_id', $mainSellerId)
                    ->findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('roles', 'name')->where(function ($query) use ($mainSellerId) {
                    return $query->where('guard_name', 'seller-api')
                                 ->where('seller_id', $mainSellerId);
                })->ignore($role->id)
            ],
            'permissions' => 'nullable|array',
            'permissions.*' => [
                'exists:permissions,name',
                function ($attribute, $value, $fail) {
                    if (!Permission::where('name', $value)->where('guard_name', 'seller-api')->exists()) {
                        $fail("The permission {$value} is invalid for sellers.");
                    }
                },
            ]
        ]);

        $role->update(['name' => $request->name]);
        
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return $this->success($role->load('permissions'), 'Role updated successfully');
    }

    public function destroy($id)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $role = Role::where('guard_name', 'seller-api')
                    ->where('seller_id', $mainSellerId)
                    ->findOrFail($id);
                    
        $role->delete();

        return $this->success(null, 'Role deleted successfully');
    }

    public function permissions()
    {
        // Only fetch permissions specifically meant for sellers
        $permissions = Permission::where('guard_name', 'seller-api')->get();
        return $this->success($permissions, 'Permissions fetched successfully');
    }
}
