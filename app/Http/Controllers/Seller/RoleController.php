<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;

class RoleController extends Controller
{
    use ResponsesTrait;

    public function index()
    {
        // Only roles relevant to the seller guard and specifically this seller's shop if we want to isolate them.
        // For simplicity, we just list roles for 'seller' guard. If roles are shared among all sellers, we can just return them.
        // Ideally, roles should be scoped to a seller. But Spatie doesn't directly support tenant scoped roles unless team_id is used.
        // Let's assume roles are shared. If they need to be tailored, we could filter them out.
        $roles = Role::where('guard_name', 'seller-api')->with('permissions')->get();
        return $this->success($roles, 'Roles fetched successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role = Role::create(['name' => $request->name, 'guard_name' => 'seller-api']);
        
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return $this->success($role, 'Role created successfully');
    }

    public function show($id)
    {
        $role = Role::where('guard_name', 'seller-api')->with('permissions')->findOrFail($id);
        return $this->success($role, 'Role fetched successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role = Role::where('guard_name', 'seller-api')->findOrFail($id);
        $role->update(['name' => $request->name]);
        
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return $this->success($role, 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::where('guard_name', 'seller-api')->findOrFail($id);
        $role->delete();

        return $this->success(null, 'Role deleted successfully');
    }

    public function permissions()
    {
        $permissions = Permission::where('guard_name', 'seller-api')->get();
        return $this->success($permissions, 'Permissions fetched successfully');
    }
}
