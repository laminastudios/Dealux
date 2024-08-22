<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function index()
    {
        return view('searchproduct');
    }
}
