<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $phone = $user->phones()->first(); // Get the first related phone record (if exists)
        return view('user.edit', compact('user', 'phone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $phone = $user->phones()->first(); // Get the first related phone record (if exists)

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:45',
        ]);

        // Update the user data
        $user->update($request->only(['name']));

        // Update the phone number if a related phone record exists
        if ($phone) {
            $phone->update($request->only(['phonenumber']));
        }

        // Redirect the user after update
        return redirect()->route('user.edit')->with('success', 'Your data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function editForm()
    {
        $user = Auth::user();
        $phone = $user->phone ?? null; // Assuming a user has one phone record
        return view('user.edit', compact('user', 'phone'));
    }
}

