<?php

namespace App\Http\Controllers\Client\Auth;


use App\Models\User;
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
    public function redirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
        Log::info($user);
        $finduser = User::where('email', '=',$user->email)->first();
        if($finduser){
            Auth::login($finduser);
            return response()->json($finduser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'social_type' => 'google',
                'password' => Hash::make('my-google'),
            ]);
            Auth::login($newUser);
            return response()->json($newUser);
        }
    } catch (\Exception $e) {
        Log::info('error');
        dd($e->getMessage());
    }
}


}
