<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function __invoke(string $sLang)
    {
        // Comentamos la línea que usaba la sesión
        // Session::put('locale', $sLang);

        // Guardamos el idioma en una cookie por 30 días
        Cookie::queue('locale', $sLang, 60 * 24 * 30); // minutos = 60*24*30

        // Cambiamos el idioma de la aplicación para esta solicitud
        App::setLocale($sLang);
        Session::put('locale', $sLang); 

        // Redirigir a la página anterior
        return redirect()->back();
    }
}
