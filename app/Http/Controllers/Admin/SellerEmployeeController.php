<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerEmployeeController extends Controller
{
    public function index($sellerId)
    {
         // Find the parent seller
         $parentSeller = Seller::findOrFail($sellerId);

         // Fetch all employees of this seller
         $employees = Seller::where('parent_id', $parentSeller->id)->with('roles')->get();

         return view('admin.seller.employees.index', compact('parentSeller', 'employees'));
    }

    public function create($sellerId)
    {
        $parentSeller = Seller::findOrFail($sellerId);
        
        // Fetch seller-api roles to assign
        $roles = Role::where('guard_name', 'seller-api')->get();

        return view('admin.seller.employees.add', compact('parentSeller', 'roles'));
    }

    public function store(Request $request, $sellerId)
    {
        $parentSeller = Seller::findOrFail($sellerId);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'phone' => 'nullable|string|max:20|unique:sellers',
            'password' => 'required|string|min:6',
            'roles' => 'required|array'
        ]);

        $employee = new Seller();
        $employee->name = $validatedData['name'];
        $employee->email = $validatedData['email'];
        $employee->phone = $validatedData['phone'] ?? null;
        // Password mutator exists on Seller model, so it may auto-hash. 
        // If it doesn't auto hash, we just assign it directly or hash it here if needed.
        // Based on EmployeeController for Seller API it was: `$employee->password = $validatedData['password'];`
        // We will assign it directly.
        $employee->password = $validatedData['password'];
        $employee->parent_id = $parentSeller->id;
        $employee->active = 1; // Mark them as active by default
        $employee->save();

        // Assign Roles (guard explicit definition to avoid issues)
        if (!empty($validatedData['roles'])) {
            $employee->assignRole($validatedData['roles']);
        }

        return redirect()->route('admin.seller.employees.index', $parentSeller->id)->with('success', trans('lang.created'));
    }

    public function edit($employeeId)
    {
        $employee = Seller::with('roles')->findOrFail($employeeId);
        $parentSeller = $employee->parent;
        
        $roles = Role::where('guard_name', 'seller-api')->get();
        $employeeRoles = $employee->roles->pluck('name')->toArray();

        return view('admin.seller.employees.edit', compact('employee', 'parentSeller', 'roles', 'employeeRoles'));
    }

    public function update(Request $request, $employeeId)
    {
        $employee = Seller::findOrFail($employeeId);
        $parentSeller = $employee->parent;

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers,email,'.$employee->id,
            'phone' => 'nullable|string|max:20|unique:sellers,phone,'.$employee->id,
            'password' => 'nullable|string|min:6',
            'roles' => 'required|array'
        ]);

        $employee->name = $validatedData['name'];
        $employee->email = $validatedData['email'];
        $employee->phone = $validatedData['phone'] ?? null;

        if(!empty($validatedData['password'])){
             $employee->password = $validatedData['password'];
        }
        $employee->save();

        if (isset($validatedData['roles'])) {
            $employee->syncRoles($validatedData['roles']);
        }

        return redirect()->route('admin.seller.employees.index', $parentSeller->id)->with('success', trans('lang.updated'));
    }

    public function destroy($employeeId)
    {
        $employee = Seller::findOrFail($employeeId);
        $parentSellerId = $employee->parent_id;

        $employee->roles()->detach();
        $employee->delete();
        
        return redirect()->route('admin.seller.employees.index', $parentSellerId)->with('success', trans('lang.deleted'));
    }
}
