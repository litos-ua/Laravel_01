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
        try {
            $messages = MessageUser::orderBy('created_at', 'desc')->take(50)->paginate(5);
            //throw new \Exception("Simulated exception for testing");
            return view('admin.admin_user_with_chat', compact('messages'));
        } catch (\Exception $e) {
            session()->flash('error_message', 'The Error when displaying messages from users.');
            return view('admin.error.error_page', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for updating a user status.
     */
    public function create()
    {
        try {
            $users = User::all(); // Retrieve all users from the database
            return view('admin.admin_user_update_status', ['users' => $users]);
        } catch (\Exception $e) {
            session()->flash('error_message', 'The Error of creating User model.');
            return view('admin.error.error_page', ['error' => $e->getMessage()]);
        }
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

    public function error()
    {
        return view('admin.error.error_page');
    }

}
