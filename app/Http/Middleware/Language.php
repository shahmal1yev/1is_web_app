<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   
    public function handle($request, Closure $next){
        $allowedLanguages = ['EN', 'TR', 'RU']; 
        $currentLocale = Session::get('locale', 'AZ'); 
        
        if (!in_array($currentLocale, $allowedLanguages)) {
            Session::put('locale', 'AZ'); 
            App::setLocale('AZ');
        }

        return $next($request);
    }


}
