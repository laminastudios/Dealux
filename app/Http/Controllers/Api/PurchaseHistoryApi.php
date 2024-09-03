<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Auth\ApiTokenController;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseHistoryApi extends Controller
{
    // Store user information
    public function store(Request $request)
    {
        //?
    }

    // Retrieve user purchase history
    public function history(Request $request)
    {
        $token = $request->bearerToken();

        $api_token_controller = new ApiTokenController;
        $user = $api_token_controller->getUser($token);

        if (! $user) {
            return response()->json(['message' => 'User Unauthorized'], 401);
        }

        $user_id = $user->user_id;
        $purchases = Purchase::with(['items.product'])
            ->where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($purchases, 200);
    }
}
