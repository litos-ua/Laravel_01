<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    public function getAllPicturesByVacCode(Request $request , $vacCat){
        $ipAddress = $request->ip();
        $vacCat = (int) $vacCat;
        //$picturesByVacations = DB::select("SELECT * FROM old_pictures WHERE category = ?", [$vacCat]);
        $picturesByVacations = Picture::where('category','=',$vacCat)->get();
        //$vacName =             DB::select("SELECT * FROM old_vacations WHERE id_cat = ?", [$vacCat]);
        $vacName =             Vacation::where('id_cat','=',$vacCat)->get() ;
        $vacName = $vacName[0]->category;

        $selectedLanguage = App::getLocale();

        // Check the 'view-picture' gate for each picture
        $allowedPictures = $picturesByVacations->filter(function ($picture) {
            return Gate::allows('view-picture', $picture);
        });
        // dd($allowedPictures);
        return view('/pages/gallery', [
            'pictures' => $allowedPictures, //$picturesByVacations
            'vacCat' => $vacCat,
            'vacName' => $vacName,
//            'filesGet' => $filesGet
                ]
        );
    }
}
