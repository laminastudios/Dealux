<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveOrderController extends Controller
{
    public function index()
    {
        return view('activeorder');
    }
}
