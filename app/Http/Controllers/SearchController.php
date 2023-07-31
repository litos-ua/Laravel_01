<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

class SearchController extends Controller
{
    //Аналог GalleryController, работает не по галлереям, а по поисковому слову или части слова. Ищет в описаниях файлов.
    public function search(Request $request)
    {
        $searchTerm = $request->input('simpleSearch');
        $pictures = Picture::where('description', 'LIKE', '%' . $searchTerm . '%')->get();
        //$compactPic = compact('pictures');
        $vacCat = 1001; //Определяет работу PictureController (>1000 - работает по ветке роутов Search)
        $vacName = 'Поиск по части слова';

        $selectedLanguage = App::getLocale(); //Используется middleware

        // Check the 'view-picture' gate for each picture
        $allowedPictures = $pictures->filter(function ($picture) {
            return Gate::allows('view-picture', $picture);
        });

        $pictures = $allowedPictures; //Refresh array with allowed photo

        return view('/pages/search/gallery', compact('searchTerm', 'vacCat', 'vacName', 'pictures'));
    }
}

