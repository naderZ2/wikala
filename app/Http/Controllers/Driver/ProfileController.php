<?php

namespace App\Http\Controllers\Driver;

use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\Profile\EditRequest;

class ProfileController extends Controller
{
    use ResponsesTrait;
    function index(){
        $user=auth()->user();
        return $this->success($user);
    }

    function update(EditRequest $request){
        $data=$request->validated();
        auth()->user()->update($data);
        return $this->success(null,trans('lang.updated'));
    }

}
