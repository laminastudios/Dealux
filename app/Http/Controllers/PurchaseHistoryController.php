<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        return view('purchasehistory');
    }

    public function history()
    {
        $user = Auth::user();
        $purchases = Purchase::with(['items.product'])
            ->where('user_id', $user->user_id)
            ->orderBy('order_date', 'desc')
            ->get();

        // dd(response()->json($purchases));
        return view('purchasehistory', ['purchases' => $purchases]);
    }
}
