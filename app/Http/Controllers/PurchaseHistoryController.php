<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        return view('purchasehistory');
    }

}
