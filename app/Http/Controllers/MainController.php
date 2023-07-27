<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function root(Request $request)
    {


        $language = $request->cookie('selectedLanguage');
       // App::setlocale($language);//Вручную без middleware
        $selectedLanguage = App::getLocale(); //Используется middleware
//        return $res;
        return view('home');
    }

    public function index(Request $request){
//        $mesP1 = 'This is Main page №';
//        $mesP2 = new TestController(7,11);
//        $mesP22 = (string) $mesP2->x;
//        $mesP3 = (string) $mesP2->enviroment;
//        $res = $mesP1 . $mesP22 . "<br>" . "Laravel enviroment:   ". $mesP3 . "<br>";

        $language = $request->cookie('selectedLanguage');
        //App::setlocale($language);//Вручную без middleware
        $selectedLanguage = App::getLocale(); //Используется middleware
//        return $res;
        return view('home');
    }

}
