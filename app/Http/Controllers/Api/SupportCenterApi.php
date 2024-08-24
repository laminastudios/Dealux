<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportCenterApi extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Email sending logic
        Mail::raw($request->message, function ($message) use ($request) {
             $message->to(env('SUPPORT_EMAIL')) // Recipient's email
                    ->subject('Support Request from ' . $request->name)
                    ->from($request->email, $request->name) // Sender's email and name
                    ->replyTo($request->email, $request->name); // Reply-To email and name
        });

        return response()->json(['message' => 'Email sent successfully.']);
    }
}
