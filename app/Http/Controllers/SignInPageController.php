<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInPageController extends Controller
{
    public function index()
    {
        return view('signin');
    }}
