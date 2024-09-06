<?php

namespace App\Http\Controllers;

class PageNotFoundController extends Controller
{
    public function index()
    {
        return view('pagenotfound');
    }
}
