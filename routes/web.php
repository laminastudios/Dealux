<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    AccountController,
    ActiveOrderController,
    Auth\LoginController,
    Auth\RegisterController,
    Auth\VerificationController,
    CartController,
    CheckoutController,
    CompareController,
    HomeController,
    LandingPageController,
    ProfileController,
    PurchaseController,
    PurchaseHistoryController,
    SettingsController,
    SubscriptionController,
    SupportController
};

// Public routes
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::controller(LoginController::class)->group(function () {
    Route::get('/signin', 'showLoginForm')->name('login');
    Route::post('/signin', 'login');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/signup', 'showRegistrationForm')->name('register');
    Route::post('/signup', 'register');
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

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('account');
        Route::get('/support', [SupportController::class, 'index'])->name('support');
        Route::get('/subscription', [SubscriptionController::class, 'index'])->name('subscription');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    });

    Route::prefix('purchase')->group(function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('purchase');
        Route::get('/active', [ActiveOrderController::class, 'index'])->name('activeorder');
        Route::get('/history', [PurchaseHistoryController::class, 'index'])->name('purchasehistory');
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/compare', [CompareController::class, 'index'])->name('compare');
});


// this will be moved to api.php

// Route to fetch the authenticated user's data
Route::middleware('auth')->get('/user', function () {
    return response()->json(['username' => Auth::user()->user_name]);
});

// Route to handle logout
Route::post('/logout', function () {
    Auth::logout();
    return response()->json(['message' => 'Logged out successfully']);
});

// Route to handle posting of email to the support
Route::post('/account/support', [SupportController::class, 'sendEmail']);