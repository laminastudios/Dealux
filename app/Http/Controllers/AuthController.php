<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function signIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Sign-in successful'], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function signUp(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:30|unique:user_account',
            'email' => 'required|string|email|max:30|unique:user_account',
            'password' => 'required|string|min:8',
        ]);

        $user_id = $this->generateUserId();
        $user = User::create([
            'user_id' => $user_id,
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Log::info("Created user with user_id: " . $user_id);
        // Log::info("User name is: " . $user->user_name);

        // Send verification email
        Mail::to($user->email)->send(new VerificationEmail($user));

        return response()->json(['message' => 'Sign-up successful. Please verify your email.'], 201);
    }
    private function generateUserId()
    {
        // Find the maximum numeric part of user_id from the database
        $maxNumericId = DB::table('user_account')
            ->select(DB::raw('MAX(CAST(SUBSTRING(user_id FROM 1 FOR 4) AS INTEGER)) AS max_id'))
            ->value('max_id');

        // Increment the numeric part by 1
        $newNumericId = $maxNumericId ? $maxNumericId + 1 : 1;

        // Generate a random string of 8 characters to append
        $randomString = strtoupper(Str::random(8));

        // Combine the numeric part and random string to create the new user_id
        return str_pad($newNumericId, 4, '0', STR_PAD_LEFT) . $randomString;
    }

    public function verifyEmail($user_id)
    {
        $user = User::where('user_id', $user_id)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid verification link'], 404);
        }

        if ($user->created_at) {
            return response()->json(['message' => 'Email already verified'], 400);
        }

        $user->created_at = now();
        $user->save();

        return response()->json(['message' => 'Email successfully verified'], 200);
    }

}


