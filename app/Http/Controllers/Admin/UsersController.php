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

    public function create(){
        $this->lang();
        $countries = \App\Models\Country::all();
        return view('admin.clients.create', compact('countries'));
    }

    public function store(Request $request){
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|max:30',
            'email'         => 'nullable|email|max:255|unique:users,email',
            'password'      => 'required|string|min:6',
            'date_of_birth' => 'nullable|date',
            'bio'           => 'nullable|string',
        ]);

        $formattedPhone = User::formatPhoneNumber($request->phone, $request->country_code);
        $request->merge(['phone' => $formattedPhone]);

        $request->validate([
            'phone' => 'unique:users,phone',
        ]);

        User::create([
            'name'          => $request->name,
            'phone'         => $formattedPhone,
            'country_code'  => preg_replace('/^\+|^00/', '', trim($request->country_code ?? '965')),
            'email'         => $request->email,
            'password'      => $request->password,
            'date_of_birth' => $request->date_of_birth,
            'bio'           => $request->bio,
            'type'          => 1,
        ]);

        return redirect()->route('admin.clients')->with('success', trans('lang.added'));
    }

    public function resetPassword(Request $request){
        $client=User::find($request->client_id);
        $client->update(['password' => $request->password]);
        return back()->with('success',trans('lang.updated'));
    }

}
