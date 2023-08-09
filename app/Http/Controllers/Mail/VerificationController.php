<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
class VerificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home')->with('verified', true);
    }

    public function resend()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        auth()->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }

//    protected function create(array $data)
//    {
//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            // ... other user attributes
//        ]);
//
//        $user->sendEmailVerificationNotification();
//
//        return $user;
//    }
}
