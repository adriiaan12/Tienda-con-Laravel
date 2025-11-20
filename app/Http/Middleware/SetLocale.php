<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Comentamos la línea que usaba la sesión
        // if (session()->has('locale')) {
        //     App::setLocale(session()->get('locale'));
        // }

        // Leemos el idioma desde la cookie 'locale'
        if ($request->hasCookie('locale')) {
            $lang = $request->cookie('locale');
            App::setLocale($lang);
        }

        return $next($request);
    }
}
