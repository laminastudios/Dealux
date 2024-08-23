<?php

use App\Http\Controllers\RegisterInformationController;
use App\Http\Controllers\SupportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API Routes Guide
// Laravel automatically prefixes `api` on the routes, don't include it

// Three Methods: GET, POST, PUT

// GET:
// /api/get/<component>
// /api/get/user - returns all users
// /api/get/user/{id} - returns user with id = {id}


// POST:
// /api/post/<component>
// /api/post/user - add new user (form response is in req.body)


// PUT:
// /api/edit/<component>
// /api/edit/user/{id} - edit user with id = {id} (form response is in req.body)


// Preferably, auth should be inside /api/auth/<components>
// Note: Learn and Include HTTP Status Code (200, 404, etc.)

// ----------------------------

// /api/get/test
Route::get('/get/test', function () {
    return response()->json([
        'body' => "Hello World!",
        'message' => "Success",
        'code' => 200
    ]);
});

// Route to handle the user information registration
// /api/register-info
Route::post('/register-info', [RegisterInformationController::class, 'store']);
// /api/register-info/{user_info_id}
Route::get('/register-info/{user_info_id}', [RegisterInformationController::class, 'show']);

// Route to handle posting of email to the support
Route::post('/account/support', [SupportController::class, 'sendEmail']);

