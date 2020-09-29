<?php

namespace App\Http\Middleware;

use \Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Support\Facades\App;

class Localization
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
        if (session()->has('locale')){
            App::setlocale(session()->get('locale'));
        }else{
            session()->put('locale', 'en');
        }
        if (session()->get('locale') == "favicon.ico"){
            session()->put('locale', 'en');
        }
        return $next($request);
    }
}
