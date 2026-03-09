<?php

namespace App\Http\Controllers\Client\Auth;

use DB;
use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\AboutUs;
use App\Traits\SendSmsTrait;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Models\ConfirmationCode;
use App\Models\ConfirmationCodes;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Client\CheckPhoneExists;
use App\Http\Requests\Client\CheckPhoneRequest;
use App\Http\Controllers\Driver\Auth\LoginController;
use App\Http\Requests\Client\CheckClientExistsRequest;

class UserAuthController extends Controller
{
    use ResponsesTrait,SendSmsTrait;

    public function checkClientExists(CheckClientExistsRequest $request){
        $user = User::where("phone" , $request->phone)->first();
        // where("email" , $request->email)
                // ->or
        if($user)
            return $this->failed(null, trans('lang.emailorphone'));
        return $this->success();
    }
    public function testotpwasage(Request $request){
          // Log::info("testotpwasage" );
        return $this->success();
    }

    public function register(RegisterRequest $request){
        Log::info("register request type:-" . $request->type );
        $data=$request->validated();
        Log::info("register request data:-" . json_encode($data));

        $user = User::withTrashed()
        // ->where("email" , $request->email)
        ->where("phone" , $request->phone)->first();
        $phone= $request->phone;
        $confirmationCode=ConfirmationCodes::where('phone',$phone)
        ->orderByDESC('id')
        ->first();
        // Log::info("confirmationCode:-" .$confirmationCode );

        if($user && !is_null($user->deleted_at)){
            if(!$confirmationCode || $confirmationCode->code != $request->otpCode || $confirmationCode->active ==0 ){
                return $this->failed(null,trans('lang.wrong_otp_number') );
            }
            if ($confirmationCode->created_at->addMinutes(5) < Carbon::now()) {
                    return $this->failed(null, trans('lang.otp_expired'));
            }
            $data['deleted_at'] = null ;
            $user->update($data);
            $confirmationCode->update(['active'=>0]);
        }elseif($user){
            return $this->failed(null, trans('lang.phoneExist'));
        }
        else{
            if(!$confirmationCode || $confirmationCode->code != $request->otpCode || $confirmationCode->active ==0 ){
                return $this->failed(null, trans('lang.wrong_otp_number'));
            }
            if ($confirmationCode->created_at->addMinutes(5) < Carbon::now()) {
                    return $this->failed(null, trans('lang.otp_expired'));
            }

            
            // if ($data['type'] == 'business') {
            //     $limit = AboutUs::whereId(1)->select('free_ads_business')->first();
            //     $data['limit_ad'] = $limit->value('free_ads_business');
            //     Log::info("business  limit:-" . $limit );
            //     Log::info("  limit in business:-" . $data['limit_ad'] );
            // } else {
            //     $limit = AboutUs::whereId(1)->select('free_ads_user')->first();
            //     $data['limit_ad'] = $limit->value('free_ads_user');
            //     Log::info("user limit:-" . $limit );
            //     Log::info("  limit in user:-" . $data['limit_ad'] );
            // }
            Log::info("befor create data:-" . json_encode($data));
            $user = User::create($data);
            $confirmationCode->update(['active'=>0]);

        }
        $user->token = $user->createToken('API Token')->accessToken;
        Log::info( "user data:-" . $user);
        return $this->success($user);
    }

    public function login(LoginRequest $request){
        Log::info("login request data:-" . json_encode($request->all()));
        $data['phone']=$request->phone;
        $data['password']=$request->password;
        
        if (!auth()->attempt($data))
            return $this->failed(null,trans('lang.wrong_username_or_password'));

        $user=auth()->user();
        $user->update(['device_id'=>$request->device_id]);
        $user->token = $user->createToken('API Token')->accessToken;
        $user->type =1;
        return $this->success($user) ;
    }

    public function logout(Request $request)
    {
        if(auth()->user())
        {
            auth()->user()->update(['device_id'=>null]);
            auth()->user()->token()->revoke();
        }
        return $this->success(null,trans('logout_success')) ;
    }

    public function sendOtpPassword(Request $request){
        $code   = rand(1111,9999);
        // $phone = '+965'.$request->phone;
        $phone = $request->phone;
        // $phone = "201142645054";

        // $this->sendSMS($phone, "OTP code is: $code" );
        // $this->sendOtpAsync($phone, "OTP code is: $code" );
        ConfirmationCodes::create(['phone'=>$request->phone,'code'=>$code]);
        $res= $this->sendOtpAsync($phone, $code);
        if (isset($res['data']) && $res['data']['status'] == 'error') {
            return $this->failed(null,$res['data']['message']);
        }
        $data['otp_code'] = $code;
        return $this->success($data);
    }

    public function sendOtpRegister(CheckPhoneRequest $request){
        $code   = rand(1111,9999);
        $phone = $request->phone;
        // return $phone;
        // $phone = "201142645054";

        ConfirmationCodes::create(["phone" => $phone,"code"=>$code]);
        $res= $this->sendOtpAsync($phone, $code);
        // $res= $this->sendSmsWhatsApp($phone, $code);

        $data['otpCode'] = $code;
        return $this->success($data);
    }

    public function sendSMS($phone, $message){
        $curl = curl_init();
        $obj=json_encode(["src"=> "+14152225555",
            "dst"=> $phone,
            "text"=> $message,
            "type"=> "sms",
            "url"=> "https://foo.com/sms status",
            "method"=> "POST",
            "log"=> "true",
            "trackable"=> false
        ]);
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.plivo.com/v1/Account/MAZGY3ZJC0OTQXNTJMYJ/Message/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>$obj,
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic TUFaR1kzWkpDME9UUVhOVEpNWUo6Tmpsak9XVTFPRGs0TlRnek56UmlZbUpqWXpVM01XVmpObVZqTmpabQ==',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
    }

    public function sendSMSWasage($phone, $message){

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://wasage.com/api/otp/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode(array(
            "username" => "6ad6af778a09b00c995e211a8f8a55cf317604fd3f2fb2ceceeb51db76503b88",
            "password" => "ae29f5599b9f8a58dd5e47999a5b4512ea352cb160a519f093ceec68d7b2f90a",
            "reference" => "User12345",
            "message" => $message,
            "secret" => "ac793d0a2254e8cd3dc00588cf520965ddb94ffaee5cb0c1d2fc3ae7e69fa873"
          )),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiZWUwYzE2NjkxYzZiOWIzNTExM2FjMjg4YmVjMjFmYjI3ODkyY2FlM2FhYTBkMTY2ZTM2NjJjOGZmMjhhNzVlMzJjM2EwN2JjNzQ4MjhiYjUiLCJpYXQiOjE3MTcxODMyMzYuOTg2NTU3OTYwNTEwMjUzOTA2MjUsIm5iZiI6MTcxNzE4MzIzNi45ODY1NjcwMjA0MTYyNTk3NjU2MjUsImV4cCI6MTc0ODcxOTIzNi45Nzk1MjAwODI0NzM3NTQ4ODI4MTI1LCJzdWIiOiI3Iiwic2NvcGVzIjpbXX0.4pebpwZAR7DGokinEz61GOvfgPMKzbLR-osI8k4G_rP7P3V7dTejnzizXzYBqusZQeu7mrxSiFLKXSV4JZjuKSz7MgTDtOZHBvhY9CatxD5eEKankehi_CM8NGfgsa0zgS2R2j0mM1fKkWQHESD1I4PQcjW7zAeGoYT3oGLae8RMnXH0hvNLAVFQ0jNyKv8B4f1dQFxOgtcYg52xId986HjaMsoJFltNp1Gv0dqzgv6ZZicQjnv6FZXMGoRQ56LB9B7oLHsMNlU64afsb5fmMgwqc1qeaQ26DKY4WoP67x-kGIUvLlO---nl3w62vVr5HId80yCmyC2LMSyI2NhVQkDtPoIcKDVUaE2CaiaCk4AXZ6u3VzCa_I0-e0-AUqDO7vRIIDe2ygoHiXJaRRiRfGBJAIfI9mzD5DCwr9O4YLwulNjoTTg4SaUBf1327cXFeXyBbg5xgZcUD3EQj44GuOMVD9c8Z7RCaFp430Kwt8TYesP8GC99VTtjTDM0dzQqOj_vF8m_K50hZwUFw-5c7S8E1Wx5v1QkHpep26wsenxsl6sjDXvcJ3XgWYYLyiFixniAW4JLpoS5k9W7-QYq7OK0f4nyIYZk5L3k5v7H0o0_s17ypF0OHX1hMKngUdNgJCV3uG_bNV1MPVDAoKWMv1VXESLTQCwGY-vEkT2ST-4',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $res=json_decode($response);
        return $res;
    }


    public static function sendOtpAsync($phoneNumber, $message)
    {
        // $countryCode = '965';
        // $formattedNumber = $countryCode . ltrim($phoneNumber, '');
        $formattedNumber = '965'.ltrim($phoneNumber, '+');
        // $formattedNumber = $phoneNumber;
                //   // Log::info("sendOtpAsync:-" .$formattedNumber );


        $url = 'https://app.arrivewhats.com/api/send';

        $data = AboutUs::whereId(1)->get();

        $params = [
            'query' => [
                'number' => $formattedNumber,
                'type' => 'text',
                'message' => $message,
                'instance_id' => $data[0]->instance_id,
                'access_token' => $data[0]->access_token,
            ],
        ];

        Log::info('sendOtpAsync request', ['url' => $url, 'params' => $params['query']]);

        $client = new Client();
        $promise = $client->getAsync($url, $params);

        try {
            $response = $promise->wait(); // Block until the request is complete
            $responseData = json_decode($response->getBody(), true);

            Log::info('sendOtpAsync response', ['status' => $response->getStatusCode(), 'response' => $responseData]);

            return [
                'success' => true,
                'data' => $responseData,
            ];
        } catch (\Throwable $exception) {
            Log::error('Failed to send WhatsApp OTP.', ['error' => $exception->getMessage()]);
                // Log::info("sendOtpAsync:success"  );

            return [
                'success' => false,
                'error' => $exception->getMessage(),
            ];
        }
    }





}
