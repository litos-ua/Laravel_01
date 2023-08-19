<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class SendContactEmailController extends Controller
{
    public function showForm()
    {
        return view('emails.sendContactEmail');
    }

    public function sendEmail(Request $request)
    {
        // Validate the input
        $request->validate([
            'message' => 'required',
        ]);

        // Send the email
//        Mail::raw($request->input('message'), function ($message) {
//            $message->to('isr720912@gmail.com')->subject('New Contact Message');
//        });

        Mail::raw($request->input('message'), function ($message) {
            $message->from(config('mail.from.address'), Auth::user()->name)
                ->to('isr720912@gmail.com')
                ->subject('New Contact Message');
        });


        return redirect()->route('contact.emailForm')->with('success', 'Message sent successfully.');
    }
}

