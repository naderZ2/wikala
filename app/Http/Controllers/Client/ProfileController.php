<?php

namespace App\Http\Controllers\Client;
use PgSql\Lob;
use App\Models\DeletedUser;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Client\EditProfileRequest;
use App\Http\Requests\Client\Profile\StoreRequest;

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
        $user = auth()->user();

        // Backup user data to deleted_users
        DeletedUser::create($user->toArray());


        $user->forceDelete();        

        return $this->success(null,trans('lang.deleted'));
    }


    public function createPassword(StoreRequest $request)
    {
        
        

       
    
        $password = $request->validated()['password'];
        $password = Hash::make($password);

        auth()->user()->update(['password' => $password]);
    
        return $this->success(null, trans('lang.created'));
    }
}
