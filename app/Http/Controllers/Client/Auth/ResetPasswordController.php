<?php

namespace App\Http\Controllers\Client\Auth;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Carbon;
use App\Models\ConfirmationCodes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\CheckPhoneExists;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Client\Password\CheckRequest;

class ResetPasswordController extends Controller
{
    use ResponsesTrait;
    public function __construct()
    {
        $this->model="App\Models\User";
    }

    public function editPassword(CheckRequest $request){
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return $this->failed(null,trans('lang.Incorrect_old_password'));
        } 
        auth()->user()->update(['password' => $request->password]);
        return $this->success(null,trans('lang.password_changed'));
    }

    public function resetPassword(ResetPasswordRequest $request){
        $data = $request->validated();
        
        $confirmationCode=ConfirmationCodes::where('phone',$request->phone)
        ->orderByDESC('id')
        ->first();

    
        
        if(!$confirmationCode || $confirmationCode->code != $request->otpCode || $confirmationCode->active ==0 ){
                return $this->failed(null,trans('lang.wrong_otp_number') );
            }
        if ($confirmationCode->created_at->addMinutes(5) < Carbon::now()) {
                return $this->failed(null, trans('lang.otp_expired'));
        }

        $data['password']=$request->password;

        $user=$this->model::wherePhone($request->phone)->first();
        
        $user->update($data);


        $confirmationCode->update(['active'=>0]);

        return $this->success(null,trans('lang.new_password_created'));
    }

}
