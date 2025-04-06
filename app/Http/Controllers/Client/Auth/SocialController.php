<?php

namespace App\Http\Controllers\Client\Auth;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\Client\Auth\SocialRequest;

// use Socialite;
class SocialController extends Controller
{
    use ResponsesTrait;
    // use Socialite;


    public function redirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request)
    {
        // $data=$request->validated();
        // Use the access token to retrieve user data from Google
        $userSocial = Socialite::driver('google')->stateless()->user();
    
        $user = User::firstOrCreate(
            [
                'provider_id' => $userSocial->getId(),
                'provider_name' => $request->provider ?? "google",
            ],
            [
                'email' => $userSocial->getEmail(),
                'name' => $userSocial?->user['name'] ?? "client",
                'phone' => $userSocial?->user['phone_number'] ?? "00",
                'password' => Hash::make(Str::random(16)), 
                'provider_id' => $userSocial->getId(),
                // 'provider_name' =>  $request->provider ?? "google",
                'provider_name' =>  $request->provider ?? "google",
            ]
        );
    
        // Generate API Token
        $user->token = $user->createToken('API Token')->accessToken;
    
        Auth::login($user);

        
        // return $this->success(auth()->user());
        return $this->success($user);
    }
    


}
