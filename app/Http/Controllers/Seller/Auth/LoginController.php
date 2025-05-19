<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Seller\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        if (!Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->login['password']])) {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['password' => 'Password is incorrect']);
        }

        return to_route('seller.home'); 
    }

    public function logout(){
        auth()->guard('seller')->logout();
        return redirect()->route('seller.login');
    }
    
}
