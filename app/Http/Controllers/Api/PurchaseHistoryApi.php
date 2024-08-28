<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryApi extends Controller
{
    // Store user information
    public function store(Request $request)
    {
        //?
    }

    // Retrieve user purchase history
    public function history()
    {
        $user_id = Auth::user()->user_id;
        $purchases = Purchase::with(['items.product'])
            ->where('user_id', $user_id)
            ->orderBy('order_date', 'desc')
            ->get();

        if (! $user_id) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['purchases' => $purchases], 200);
        // return view('purchasehistory', ['purchases' => $purchases]);
    }
}
