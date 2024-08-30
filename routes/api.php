<?php

use App\Http\Controllers\Api\RegisterInformationApi;
use App\Http\Controllers\Api\SupportCenterApi;
use App\Http\Controllers\StripeController;
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

// Stripe API routes
Route::get('/index', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/checkout', [StripeController::class, 'checkout']);
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');

// /api/get/test
Route::get('/get/test', function () {
    return response()->json([
        'body' => 'Hello World!',
        'message' => 'Success',
        'code' => 200,
    ]);
});

// Route to handle the user information registration
// /api/register-info
Route::post('/post/register/info', [RegisterInformationApi::class, 'store']);
// /api/register-info/{user_info_id}
Route::get('/get/register/info/{user_info_id}', [RegisterInformationApi::class, 'show'])->name('user_information');

// Route to handle posting of email to the support
Route::post('/post/support', [SupportCenterApi::class, 'sendEmail']);

// Stripe routes
Route::get('/index', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/checkout', [StripeController::class, 'checkout']);
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
