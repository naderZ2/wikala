<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\EditProfileRequest;

class ProfileController extends Controller
{
    use ResponsesTrait;
    function index(){
        $this->lang();
        $user = auth()->user();
        $userAddress = $user->address;
        
        foreach ($userAddress as $address) {
            $address->region = $address->region()->select('id', 'parent_id', $this->name)->first();
            
            if ($address->region) {
                $address->region_parent = $address->region->parent()->select('id', 'parent_id', $this->name)->first();
            } else {
                $address->region_parent = null;
            }
        }
        
        return $this->success($user);
    }


    function update(EditProfileRequest $request){
        $data=$request->validated();
        auth()->user()->update($data);
        return $this->success(null,trans('lang.updated'));
    }

    function updateLang(Request $request){
        auth()->user()->update(['lang'=>$request->lang]);
        return $this->success(null,trans('lang.updated'));
    }
    
    public function destroy(){
        auth()->user()->delete();
        return $this->success(null,trans('lang.deleted'));
    }
}
