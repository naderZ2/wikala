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
        // Use the access token to retrieve user data from Google
        $userSocial = Socialite::driver('google')->stateless()->userFromToken('ya29.a0AeXRPp4wJZhITwjHxtpDmCVnjqz9iQrCIKfNcp7H35jvcP27tZRVtVJcKWK1UH7wGW0lpN6_JoMj1hFsG4k49i8sXQiZzEpdKS5jv7oGl47b4kcyabJC1Q4dsmBcBZNYnP8k4MdXTqvqvfzus70uokR-uy7OYpZ0DuTEKH4zmgaCgYKAQkSARESFQHGX2MiE_ttluCwnqTCVLwaoCELJw0177');
        $userSocial = Socialite::driver('google')->stateless()->userFromToken('ya29.a0AeXRPp4wJZhITwjHxtpDmCVnjqz9iQrCIKfNcp7H35jvcP27tZRVtVJcKWK1UH7wGW0lpN6_JoMj1hFsG4k49i8sXQiZzEpdKS5jv7oGl47b4kcyabJC1Q4dsmBcBZNYnP8k4MdXTqvqvfzus70uokR-uy7OYpZ0DuTEKH4zmgaCgYKAQkSARESFQHGX2MiE_ttluCwnqTCVLwaoCELJw0177');
        // $user = Socialite::driver('google')->stateless()->userFromToken($request->token);

        // Log::info('Google User: ' . json_encode($userSocial));
        // Get or create the user
        $user = User::firstOrCreate(
            [
                'provider_id' => $userSocial->getId(),
                'provider_name' => $request->provider ?? "google",
            ],
            [
                'email' => $userSocial->getEmail(),
                'name' => $userSocial?->user['name'] ?? "client",
                'phone' => $userSocial?->user['phone_number'] ?? "01",
                'password' => Hash::make(Str::random(16)), 
                'provider_id' => $userSocial->getId(),
                'provider_name' =>  $request->provider ?? "google",
            ]
        );
    
        // Generate API Token
        $user->token = $user->createToken('API Token')->accessToken;
    
        // Return successful response
        return response()->json([
            'status' => true,
            'message' => 'Login Successful',
            'user' => $user,
            'token' => $user->token,
        ]);
    }
    

    // public function redirect(SocialRequest $request)
    // {
    //     // Use the access token to retrieve user data from Google
    //     $userSocial = Socialite::driver($request->provider)->userFromToken($request->token);
    //     //   $name = $userSocial->name; // Get the user's name
    //     //   return $googleId = $userSocial->id; // Get the user's Google ID
    //     // Handle the user data as needed
    //     return  $email = $userSocial?->getEmail();

    //     $user = User::firstOrCreate(
    //         [
    //             'provider_id' => $userSocial->getId(),
    //             'provider_name' => $request->provider ?? "google",
    //         ],
    //         [
    //             'email' => $userSocial->getEmail(),
    //             'phone' => $userSocial?->user['phone_number']??"01",
    //             'password' => $userSocial->getEmail(),
    //             'provider_id' => $userSocial->getId(),
    //             'provider_name' =>  $request->provider ?? "google",
    //         ]
    //     );
    //     $user->token = $user->createToken('API Token')->accessToken;

    //     return $this->success($user);
    // }


    // public function redirect(Request $request)
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleGoogleCallback()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();
    
    //         dd($user);
    //         Log::info('Google User: ' . json_encode($user));
    
    //         $finduser = User::where('email', '=', $user->email)->first();
    
    //         if ($finduser) {
    //             Auth::login($finduser);
    //             return response()->json($finduser);
    //         } else {
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'provider_id' => $user->id,
    //                 'password' => Hash::make('my-google'),
    //                 'provider_name' => "google",
    //             ]);
    //             Auth::login($newUser);
    //             return response()->json($newUser);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Google Auth Error: ' . $e->getMessage());
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
    


}
