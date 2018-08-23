<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        //if (in_array($lang, Config::get('app.available_locale'))) {
        /*
            si esta asi se utiliza la funcion array_key_exists
            'available_locale' => [
                'en' => 'English',
                'es' => 'Español',
                'de' => 'Deutsche',
            ],

            si esta asi se utiliza la funcion in_array
            'available_locale' => [
                'en',
                'es',
                'de',
            ],
        */
        if (array_key_exists($lang, Config::get('app.available_locale'))) {
            $url = url()->previous();
            $url_explode = explode("/", $url);
            $url_explode[3] = $lang;
            $redir = implode('/', $url_explode);

            return redirect()->to($redir);
        } else {
            return back();
        }
    }
}
