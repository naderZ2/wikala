<?php

namespace App\Http\Controllers\Driver\Auth;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Driver\Auth\LoginRequest;

class LoginController extends Controller
{
    use ResponsesTrait;

    public function login($request)
    {
        // if(!filter_var($request->phone, FILTER_VALIDATE_EMAIL))
        //     $data['phone']=$request->phone;
        // else
        $data['email']=$request->phone;
        $user = Driver::where($data)->first();
        if(!isset($user)){
            return $this->failed(null,trans("lang.account_Not_found"));
        }

        if (!Hash::check(request('password'), $user->password)) {
            return $this->failed(null,trans('lang.Incorrect_password'));
        } 
        if($user->active !=1)
            return $this->failed(null,trans('lang.not_active'));
       
        $user->token = $user->createToken('API Token')->accessToken;
        $user->type =2;
        return $this->success($user) ;        
    }

    public function logout(Request $request)
    {
        if(auth()->user())
        {
            auth()->user()->token()->revoke();
        }
        return $this->success(null,trans('logout_success')) ;
    }
}
