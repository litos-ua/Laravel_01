<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminUserPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('This is the AdminUserPictureController index method');
        return view('admin.admin_user_picture');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_user_picture');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
