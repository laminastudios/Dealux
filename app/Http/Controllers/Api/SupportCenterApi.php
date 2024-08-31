<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportCenterApi extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'summary' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        // Compose the email content
        $emailContent = 'Summary: '.$request->summary."\n\n".$request->details;

        // Email sending logic
        Mail::raw($emailContent, function ($message) use ($request) {
            $message->to(env('SUPPORT_EMAIL')) // Recipient's email (configured in the .env file)
                ->subject('Support Request from '.$request->firstName.' '.$request->lastName)
                ->from($request->email, $request->firstName.' '.$request->lastName) // Sender's email and full name
                ->replyTo($request->email, $request->firstName.' '.$request->lastName); // Reply-To email and full name
        });

        return response()->json(['message' => 'Email sent successfully.']);
    }
}
