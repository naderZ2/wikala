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
        // $userSocial = Socialite::driver('google')->stateless()->userFromToken('ya29.a0AeXRPp4wJZhITwjHxtpDmCVnjqz9iQrCIKfNcp7H35jvcP27tZRVtVJcKWK1UH7wGW0lpN6_JoMj1hFsG4k49i8sXQiZzEpdKS5jv7oGl47b4kcyabJC1Q4dsmBcBZNYnP8k4MdXTqvqvfzus70uokR-uy7OYpZ0DuTEKH4zmgaCgYKAQkSARESFQHGX2MiE_ttluCwnqTCVLwaoCELJw0177');
        
        // $userSocial = Socialite::driver($request->provider)->stateless()->userFromToken($request->token);
        // $user = Socialite::driver('google')->stateless()->userFromToken($request->token);

        // Log::info('Google User: ' . json_encode($userSocial));
        // Get or create the user
        // dd($userSocial?->user);
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
