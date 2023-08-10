<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        //$user->password = Hash::make($request->password);
        $user->password = bcrypt($request->password);
        $user->save();

        // Optionally, you can authenticate the user after registration
        // auth::login($user);

        // Redirect to a success page or any other desired action
        return redirect('/')->with('success', 'Registration successful!');
    }
}
