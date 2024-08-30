<?php

use App\Http\Controllers\ActiveOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\RegisterInformationController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
});

Route::controller(VerificationController::class)->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', 'verify')
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');

    Route::post('/email/resend', 'resend')
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.resend');
});

// Authenticated and verified routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::get('/register/info', [RegisterInformationController::class, 'index'])->name('registerinfo');

    Route::prefix('account')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
    });

    Route::prefix('purchase')->group(function () {
        Route::get('/active', [ActiveOrderController::class, 'index'])->name('activeorder');
        Route::get('/history', [PurchaseHistoryController::class, 'history'])->name('purchasehistory');
    });

    Route::get('/search/{keyword}', [SearchProductController::class, 'index'])->name('search');
    Route::get('/product/{productName}', [ProductController::class, 'index'])->name('purchasehistory');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});

// this will be moved to api.php

// Route to fetch the authenticated user's data
Route::middleware('auth')->get('/user', function () {
    return response()->json(['user' => Auth::user()]);
});

// Route to handle logout
Route::post('/logout', function () {
    Auth::logout();

    return response()->json(['message' => 'Logged out successfully']);
});
