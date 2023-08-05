<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use App\Models\Vacation;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminUserPictureController extends Controller
{
    public function main()
    {
        //dd('This is the AdminUserPictureController index method');
        return view('admin.admin_user_picture_index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $picturesByVacations = Vacation::join('pictures', 'vacations.id_cat', '=', 'pictures.category')
//            ->where('pictures.fototype', '>', 0)
//            ->orderBy('vacations.id_cat')
//            ->orderBy('vacations.category')
//            ->orderBy('pictures.filename')
//            ->orderBy('pictures.description')
//            ->select('vacations.id_cat', 'vacations.category', 'pictures.filename', 'pictures.description')
//            ->get();
//
//        $vacationsWithPictures = new LengthAwarePaginator(
//            $picturesByVacations->forPage($request->input('page', 1), 18),
//            $picturesByVacations->count(),
//            18,
//            $request->input('page', 1),
//            ['path' => $request->url(), 'query' => $request->query()]
//        );

        $picturesByVacations = Vacation::join('pictures', 'vacations.id_cat', '=', 'pictures.category')
            ->where('pictures.fototype', '>', 0)
            //->orderBy('vacations.id_cat')
            ->orderBy('pictures.id_pic')
            ->orderBy('vacations.category')
            ->orderBy('pictures.filename')
            ->orderBy('pictures.description')
            //->select('vacations.id_cat', 'vacations.category', 'pictures.filename', 'pictures.description')
            ->select('pictures.id_pic', 'vacations.category', 'pictures.filename', 'pictures.description')
            ->paginate(18); // Use the 'paginate' method directly



        //$columns = $vacationsWithPictures->count() > 0 ? array_keys($vacationsWithPictures[0]->toArray()) : []; //Работает подсказал AI
        $columns = array_keys(($picturesByVacations->first())->toArray()); // Мой аналог предыдущего

        return view('admin.admin_user_picture_index', [
            'vacationsWithPictures' => $picturesByVacations,
            'columns' => $columns,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_user_picture_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filename' => 'required|string|max:60|unique:pictures',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:150',
            'category' => 'required|integer',
            'fototype' => 'required|integer',
        ]);
        try {
            // If validation passes, insert the data into the database
            Picture::create($request->all());
            session()->flash('success', 'Picture added successfully!');
            //return redirect()->back()->with('success', 'Picture added successfully!');
            return response()->json(['message' => 'Picture added successfully']);
        } catch (QueryException $exception) {
            // Catch the QueryException and handle the foreign key constraint violation
            if ($exception->getCode() == 23000) {
                // If the exception code is 23000 (Integrity constraint violation)
                // and the error is related to the foreign key constraint (e.g., category value does not exist)
                // Redirect back with an error message
                //return redirect()->back()->withErrors(['category' => 'Category value does not exist. Please enter a valid value for the category!'])->withInput();
                return response()->json(['error' => 'Category value does not exist. Please enter a valid value for the category!'], 422);
            }

            // If it's not a foreign key constraint violation, rethrow the exception
            throw $exception;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picture $picture)
    {
        return view('admin.admin_user_picture_update', [
            'picture' => $picture,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * MY TEST ROUTE
     */
    public function input(Picture $picture)
    {
        return view('admin.admin_user_picture_update', [
            'picture' => $picture,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id_pic' => 'required|integer',
            'filename' => 'required|string|max:60',
            'title' => 'required|string|max:60',
            'description' => 'required|string|max:150',
            'category' => 'required|integer',
            'fototype' => 'required|integer',
        ]);
        $pictureId = $request->input('id_pic');
        $picture = Picture::findOrFail($pictureId);
        try {
            // Update the data in the database
            $picture->update($request->all());
            session()->flash('success', 'Picture updated successfully!');
            return redirect()->back()->with('success', 'Picture updated successfully!');
        } catch (QueryException $exception) {
            // Handle exceptions
            if ($exception->getCode() == 23000) {
                return response()->json(['error' => 'Category value does not exist. Please enter a valid value for the category!'], 422);
            }
            throw $exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
