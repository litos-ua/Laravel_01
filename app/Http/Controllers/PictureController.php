<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PictureController extends Controller
{

    /**
     * @param $currentFileName
     * $$currentFileName - Get запрос, в котором разделены знаком $:
     *                    - [0] - наименование файла
     *                    - [1] - название вакации
     *                    - [2] - порядковый номер вакации (с 1)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function pictureForCarusel($currentFileName)
    {
        $fileTitleVac = $currentFileName;
        $paramsGetArr = explode('$',$currentFileName);

        $vacCat = (int) $paramsGetArr[2];
        $selectedLanguage = App::getLocale();
        //Определяет работу PictureController ($vacCat>1000 - работает по ветке роутов Search)
        //$picturesByVacations = DB::select("SELECT filename FROM old_pictures WHERE category = ?", [$vacCat]);
        if($vacCat>1000){
            $picturesByVacations = Picture::where('description', 'LIKE', '%' . $paramsGetArr[1] . '%')->get();
            $viewParam = '/pages/search/pictures';
        }
        else{
            $picturesByVacations = Picture::where('category','=',$vacCat)->get();
            $viewParam = '/pages/pictures';
        }
        $a =1;
        return view($viewParam, [
            'fileTitleVac' => $fileTitleVac,
            'picturesThisVacation' => $picturesByVacations,
        ]);
    }

    public function pictures(){
        $picCollect = $this->hasMany(Picture::class);
        return $picCollect;
    }


    /**
     * Display a listing of the resource.
     */
    public function index($currentFileName)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/datachange/add_picture');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filename' => 'required|string|max:60',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:150',
            'category' => 'required|integer',
            'fototype' => 'required|integer',
        ]);
        try {
            // If validation passes, insert the data into the database
            Picture::create($request->all());
            session()->flash('success', 'Picture added successfully!');
            return redirect()->back()->with('success', 'Picture added successfully!');
        } catch (QueryException $exception) {
            // Catch the QueryException and handle the foreign key constraint violation
            if ($exception->getCode() == 23000) {
                // If the exception code is 23000 (Integrity constraint violation)
                // and the error is related to the foreign key constraint (e.g., category value does not exist)
                // Redirect back with an error message
                return redirect()->back()->withErrors(['category' => 'Category value does not exist. Please enter a valid value for the category!'])->withInput();
            }

            // If it's not a foreign key constraint violation, rethrow the exception
            throw $exception;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $picture = Picture::find($id);

        $a=1;

        if (!$picture) {
            return response()->json(['message' => 'Picture not found'], 404);
        }
        else{
        // Extracting only the desired fields from the $picture object
        $data = [
            'id_pic' => $picture->id_pic,
            'filename' => $picture->filename,
            'title' => $picture->title,
            'description' => $picture->description,
        ];
        return response()->json($data, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function showByQuery()
    {

        $id = request()->input('simpleSearch');
        $a=1;
        $picture = Picture::find($id);

        if (!$picture) {
            return response()->json(['message' => 'Picture not found'], 404);
        }
        else{
            // Extracting only the desired fields from the $picture object
            $data = [
                'id_pic' => $picture->id_pic,
                'filename' => $picture->filename,
                'title' => $picture->title,
                'description' => $picture->description,
            ];
            return response()->json($data, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
