<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class VacationController extends Controller
{


    public function getAllVacationsFilenames(Request $request) {

        //$vacations = DB::select("SELECT * FROM old_vacations");
        $vacations = Vacation::all();
        $language = $request->cookie('selectedLanguage'); //Вручную без middleware
        //App::setlocale($language); //Вручную без middleware
        $selectedLanguage = App::getLocale(); //Используется middleware
//        $selectedLanguage = $_COOKIE['selectedLanguage'];
        return view('/pages/vacations', ['vacations' => $vacations,
                                              'selectedLanguage'=> $language,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $picture = Vacation::find($id);

        $a=1;

        if (!$picture) {
            return response()->json(['message' => 'Vacation not found'], 404);
        }
        else{
            // Extracting only the desired fields from the $picture object
            $data = [
                'id_cat' => $picture->id_cat,
                'category' => $picture->category,
            ];
            return response()->json($data, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

}
