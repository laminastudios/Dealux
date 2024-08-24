<?php

namespace App\Http\Controllers;

use App\Models\PaymentInformation;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterInformationController extends Controller
{
    public function index()
    {
        return view('registerinfo');
    }

    // Store user information
    public function store(Request $request)
    {
        $validatedUserInformation = $request->validate([
            'user_id' => 'required|string|size:12',
            'first_name' => 'required|string|max:20',
            'mid_name' => 'nullable|string|max:20',
            'last_name' => 'required|string|max:20',
            'gender' => 'required|string|size:1',
            'birth_date' => 'required|date',
            'phone_number' => 'required|string|size:11',
            'subs_status' => 'required|string|size:1',
        ]);

        // Validate payment information
        $validatedPaymentData = $request->validate([
            'delivery_address' => 'required|string|max:100',
            'card_type' => 'required|in:cc,dc', // "cc" for credit card, "dc" for debit card
            'name_on_card' => 'required|string|max:100',
            'card_number' => 'required|string|size:16',
            'expiry_date' => 'required|date',
            'cvv' => 'required|string|size:3',
        ]);

        try {
            // Store user information
            $userInfo = UserInformation::create($validatedUserInformation);

            // Store payment information
            $validatedPaymentData['user_id'] = $validatedUserInformation['user_id']; // Add user_id to payment information
            $paymentInfo = PaymentInformation::create($validatedPaymentData);

            // Commit transaction
            DB::commit();

            return response()->json([
                'message' => 'User information and payment information stored successfully',
                'user_data' => $userInfo,
                'payment_data' => $paymentInfo,
            ], 201);
        } catch (\Exception $e) {
            // Rollback transaction if something goes wrong
            DB::rollBack();
            return response()->json([
                'message' => 'Error storing user or payment information',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Retrieve user information
    public function show($user_info_id)
    {
        // Fetch user information along with payment information
        $userInfo = UserInformation::with('paymentInformation')
            ->where('user_info_id', $user_info_id)
            ->first();

        if (!$userInfo) {
            return response()->json(['message' => 'User information not found'], 404);
        }

        return response()->json(['user_info' => $userInfo], 200);
    }
}
