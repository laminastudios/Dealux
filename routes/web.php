<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActiveOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SupportController;
use App\Mail\VerificationEmail;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/signin', [LoginController::class, 'login']);

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register']);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');

// Routes that require authentication
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/compare', [CompareController::class, 'index'])->name('compare');
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase');
    Route::get('/purchase/active', [ActiveOrderController::class, 'index'])->name('activeorder');
    Route::get('/purchase/history', [PurchaseHistoryController::class, 'index'])->name('purchasehistory');

    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::get('/account/support', [SupportController::class, 'index'])->name('support');
    Route::get('/account/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::get('/account/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/account/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
