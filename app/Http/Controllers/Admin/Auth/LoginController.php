<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AdminLoginRequest;

class LoginController extends Controller
{
    public function login(AdminLoginRequest $request){
        if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->login['password'], 'active' => "1"])) {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['password' => 'Password is incorrect']);
        }   
        return redirect()->route('index'); 
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('login');
    }
}
