<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index()
    {
        return view('support');
    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Email sending logic
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('jadumpyy@gmail.com') // Recipient's email
                    ->subject('Support Request from ' . $request->name)
                    ->from($request->name) // Sender's email and name
                    ->replyTo($request->email, $request->name); // Reply-To email and name
        });


        return response()->json(['message' => 'Email sent successfully.']);
    }
}
