<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageUser;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = MessageUser::orderBy('created_at', 'asc')->take(50)->paginate(5);
        $a = 1;
        return view('admin.admin_user', compact('messages'));
        //return view('/admin/admin_user');
    }

    /**
     * Show the form for updating a user status.
     */
    public function create()
    {
        $users = User::all(); // Retrieve all users from the database

        //return view('admin.admin_user_create', ['users' => $users]);
        return view('admin.admin_user_update_status', ['users' => $users]);
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

    public function updateStatus(Request $request)
    {
        $userId = $request->input('userId');
        $status = $request->input('status');
        try{
        // Update the user's status in the database
        $user = User::findOrFail($userId);
        $user->update(['status' => $status]);
        //session()->flash('success', 'Picture updated successfully!');
        return redirect()->back()->with('success', 'User status updated successfully.');
        } catch (QueryException $exception) {
            // Handle exceptions
            if ($exception->getCode() == 23000) {
                return response()->json(['error' => 'Error! Status hasn\'t changed.'], 422);
            }
            throw $exception;
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function viewMessages()
    {
        $messages = MessageUser::orderBy('created_at', 'desc')->get();
        return view('admin.admin_user', compact('messages'));
    }

}
