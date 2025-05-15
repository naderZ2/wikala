<?php

namespace App\Http\Controllers\Client;

use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    use ResponsesTrait;
    public function __construct()
    {
        $this->model="App\Models\AboutUs";
    }
    
    public function index(){
        $this->lang();

        $data=$this->model::select('id','whatsapp_number',
        'facebook','insta','youtube','description','privacy',$this->terms)
            ->first();
        return $this->success($data);
    }
}
