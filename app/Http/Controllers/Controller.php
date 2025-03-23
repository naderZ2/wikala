<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function lang(){
        if(app()->getLocale() == "en" || request()->header('Lang') == "en"){
            $this->name="name_en as name";
            $this->description="description_en as description";
            $this->title="title_en as title";
            $this->terms="terms_en as terms";
        }else{
            $this->name="name_ar as name";
            $this->description="description_ar as description";
            $this->title="title_ar as title";
            $this->terms="terms_ar as terms";
        }
    }
}
