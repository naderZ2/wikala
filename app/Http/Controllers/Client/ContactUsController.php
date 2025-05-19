<?php

namespace App\Http\Controllers\Client;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ContactUs\StoreRequest;

class ContactUsController extends Controller
{ 
    use ResponsesTrait;




    public function store(StoreRequest $request){
        $data=$request->validated();
        $data['user_id']=auth()->id();
        $data['type']="driver";
        $test=ContactUs::create($data);
        return $this->success(null,trans('lang.success_send'));
    }

    public function storeContactUs(StoreRequest $request){
        $data=$request->validated();
        $data['user_id']=auth()->id();
        $data['type']="driver";
        $test=ContactUs::create($data);
        return $this->success(null,trans('lang.success_send'));
    }
    
}

