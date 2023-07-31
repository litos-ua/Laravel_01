<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    public function getAllPicturesByVacCode(Request $request , $vacCat){
        $ipAddress = $request->ip();
        $vacCat = (int) $vacCat;
        $picturesByVacations = Picture::where('category','=',$vacCat)->get();

        // Check the 'view-picture' gate for each picture
        $allowedPictures = $picturesByVacations->filter(function ($picture) {
            return Gate::allows('view-picture', $picture);
        });

        // Paginate the filtered pictures
        $perPage = 18; // Number of pictures to display per page
        $picturesByVacations = new LengthAwarePaginator(
            $allowedPictures->forPage($request->input('page', 1), $perPage),
            $allowedPictures->count(),
            $perPage,
            $request->input('page', 1),
            ['path' => $request->url(), 'query' => $request->query()]
        );

        //$picturesByVacations = Picture::where('category', '=', $vacCat)->paginate($perPage);

        $vacName =             Vacation::where('id_cat','=',$vacCat)->get() ;
        $vacName = $vacName[0]->category;

        $selectedLanguage = App::getLocale();



        return view('/pages/gallery', [
            'pictures' => $picturesByVacations, //$allowedPictures
            'vacCat' => $vacCat,
            'vacName' => $vacName,
//            'filesGet' => $filesGet
                ]
        );
    }
}
