<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ContactUsControll extends Controller
{
    
    
    public function index()
    {
        $contact=AboutUs::find(1);
        // Log::info($contact);
        return view('admin.contact.index',compact('contact'));
    }

}
