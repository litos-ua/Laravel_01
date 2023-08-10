<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
        try {
            $user = Auth::user();
            $phone = $user->phones()->first(); // Get the first related phone record (if exists)

            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'phonenumber' => 'required|string|max:45',
            ]);

            // Update the user data
            $user->update($request->only(['name']));

            // Update or create the phone number
            if ($phone) {
                $phone->update($request->only(['phonenumber']));
            } else {
                // Create a new phone record with the provided phone number
                $user->phones()->create(['phonenumber' => $request->input('phonenumber')]);
            }

            // Set the success message in the session
            Session::flash('success', 'Your data has been updated successfully.');

            // Redirect the user after update
            return redirect()->route('user.edit');

        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            Session::flash('error', 'Your data hasn\'t been updated. An error occurred while updating your data!');
            return redirect()->route('user.edit');
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $user = Auth::user();

            $request->validate([
                "current_password" => ["required"],
                "new_password" => ["required", "confirmed"],
            ]);

            $currentPassword = $request->input('current_password');

            // Attempt to authenticate the user with the provided current password
            if (!Auth::attempt(['email' => $user->email, 'password' => $currentPassword])) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
            }

            // Update the user's password
            //$newPassword = Hash::make($request->input('new_password'));
            $newPassword = bcrypt($request->input('new_password'));
            $user->password = $newPassword;
            $user->save();

            Session::flash('success', 'Password changed successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            Session::flash('error', 'An error occurred while changing the password');
        }

        return redirect()->back();
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

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $admin=User::where('status', 3)->first();
        $messageContent = $request->input('message');

        // Create a new message record and associate it with the user
        $message = new MessageUser([
            'sender_id' => $user->id,
            'receiver_id' => $admin->id, // Replace with the administrator's user ID
            'content' => $messageContent,
        ]);
        $message->save();

        return redirect()->route('user.edit')->with('success', 'Message sent successfully.');
    }


}




