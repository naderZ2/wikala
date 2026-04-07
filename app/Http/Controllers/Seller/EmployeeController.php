<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    use ResponsesTrait;

    public function index()
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $employees = Seller::where('parent_id', $mainSellerId)
                    ->with('roles')
                    ->get();

        return $this->success($employees, 'Employees fetched successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'phone' => 'required|string|max:20|unique:sellers',
            'password' => 'required|string|min:6',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name'
        ]);

        $mainSellerId = auth('seller-api')->user()->getMainSellerId();

        $employee = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // model mutator might hash it again, but if mutator exists it handles raw string. Wait, mutator already hashes: ->attributes['password'] = bcrypt($value);
            // So we should pass plain string instead of Hash::make to avoid double hashing!
            'parent_id' => $mainSellerId,
            'active' => 1
        ]);

        // Fix potential double hashing issues due to Seller::setPasswordAttribute
        $employee->password = $request->password;
        $employee->save();

        $employee->assignRole($request->roles);

        return $this->success($employee->load('roles'), 'Employee created successfully');
    }

    public function show($id)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $employee = Seller::where('parent_id', $mainSellerId)
                    ->with('roles')
                    ->findOrFail($id);

        return $this->success($employee, 'Employee fetched successfully');
    }

    public function update(Request $request, $id)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        $employee = Seller::where('parent_id', $mainSellerId)->findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:sellers,email,' . $id,
            'phone' => 'sometimes|string|max:20|unique:sellers,phone,' . $id,
            'password' => 'nullable|string|min:6',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name'
        ]);

        if ($request->has('name')) $employee->name = $request->name;
        if ($request->has('email')) $employee->email = $request->email;
        if ($request->has('phone')) $employee->phone = $request->phone;
        if ($request->has('password') && $request->password) {
            $employee->password = $request->password; // mutator handles bcrypt
        }
        
        $employee->save();

        if ($request->has('roles')) {
            $employee->syncRoles($request->roles);
        }

        return $this->success($employee->load('roles'), 'Employee updated successfully');
    }

    public function destroy($id)
    {
        $mainSellerId = auth('seller-api')->user()->getMainSellerId();
        
        $employee = Seller::where('parent_id', $mainSellerId)->findOrFail($id);
        $employee->delete();

        return $this->success(null, 'Employee deleted successfully');
    }
}
