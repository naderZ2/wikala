<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User,UserAdress};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request){
        $this->lang();
        $clients=User::query();
        if($request->regionId){
            $clients =$clients->join('address_user', 'address_user.user_id' ,'users.id')
            ->where('address_user.region_id' , $request->regionId);
        }
        $clients =$clients->select('users.id' ,'users.name' ,'users.email','users.bio','users.date_of_birth' , 'users.phone' ,'users.created_at')->get();
        return view('admin.clients.index',compact('clients'));
    }

    public function resetPassword(Request $request){
        $client=User::find($request->client_id);
        $client->update(['password' => $request->password]);
        return back()->with('success',trans('lang.updated'));
    }

}
