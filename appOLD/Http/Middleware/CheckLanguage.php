<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     
     

    public function handle(Request $request, Closure $next)
    {
        if($request->header('Lang') == 'en'){
            App::setLocale('en');     
        }else{
            App::setLocale('ae');     
        }
        return $next($request);
    }
}
