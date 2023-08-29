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
    public function handle($request, Closure $next)
{
    if (!Session::has('locale')) {
        Session::put('locale', 'AZ');
    }

    $currentLocale = Session::get('locale');
    
    if ($currentLocale !== 'EN' && $currentLocale !== 'RU' && $currentLocale !== 'TR' && $currentLocale !== 'AZ') {
        Session::put('locale', 'AZ'); // İzin verilen diller dışında bir değerse 'AZ' olarak ayarla
        App::setLocale('AZ');
    } else {
        App::setLocale($currentLocale); // İzin verilen dillerden biri ise o dile ayarla
    }

    return $next($request);
}

}
