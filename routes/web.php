<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActiveOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SignInPageController;
use App\Http\Controllers\SignUpPageController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SupportController;
use App\Models\User;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/signin', [SignInPageController::class, 'index'])->name('signin');
Route::post('/signin', [AuthController::class, 'signIn']);

Route::get('/signup', [SignUpPageController::class, 'index'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/verify/{user_id}', [AuthController::class, 'verifyEmail'])->name('verify');


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

