<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;
use Illuminate\Http\Request;

class RegisterInformationController extends Controller
{
    public function index()
    {
        return view('registerinfo');
    }

    // Store user information
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|string|size:12',
            'first_name' => 'required|string|max:20',
            'mid_name' => 'nullable|string|max:20',
            'last_name' => 'required|string|max:20',
            'gender' => 'required|string|size:1',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string|size:11',
            'subs_status' => 'required|string|size:1',
        ]);

        try {
            $userInfo = UserInformation::create($validatedData);
            return response()->json(['message' => 'User information stored successfully', 'data' => $userInfo], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error storing user information', 'error' => $e->getMessage()], 500);
        }
    }

    // Retrieve user information
    public function show($user_info_id)
    {
        $userInfo = UserInformation::where('user_info_id', $user_info_id)->first();

        if (!$userInfo) {
            return response()->json(['message' => 'User information not found'], 404);
        }

        return response()->json(['data' => $userInfo], 200);
    }
}
