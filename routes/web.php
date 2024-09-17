<?php

use App\Http\Controllers\HostingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\ForgotPasswordController;
<<<<<<< HEAD
use App\Http\Controllers\ProductController;

/* Welcome */

=======

/* Welcome */
>>>>>>> 57f2d7277b8d0952113036ba683daf36e0167099
Route::get('/', function () {
    return view('welcome');
});

/* Dashboard - Protected by Auth Middleware */
Route::get('/landing-page', [HostingController::class, 'index']);

// ->middleware('auth');

/* Register */
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

/* Check Email Verification */
Route::get('/check-email', function () {
    return view('layouts.auth.check');
})->name('check.email');

/* Forgot password */
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::get('/forgot-password-options', [ForgotPasswordController::class, 'showOptions'])
    ->name('password.request');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');
Route::get('/forgot-email', [ForgotPasswordController::class, 'showForgotEmailForm'])
    ->name('email.forgot');
Route::post('/forgot-email', [ForgotPasswordController::class, 'recoverEmail'])
    ->name('email.recover');
Route::get('/sms-sent-confirmation', function () {
    return view('layouts.auth.recovery.emailrecovery.sms-sent-confirmation', ['phone' => session('phone')]);
<<<<<<< HEAD
})->name('sms.sent.confirmation');
=======
    })->name('sms.sent.confirmation');
>>>>>>> 57f2d7277b8d0952113036ba683daf36e0167099

/* Tampilans */
Route::get('/tampilan2', [HostingController::class, 'tampilan2']);
Route::get('/tampilan3', [HostingController::class, 'tampilan3']);
Route::get('/tampilan3mail', [HostingController::class, 'tampilan3mail']);
Route::get('/checkout', [HostingController::class, 'checkout']);
Route::get('/server', [HostingController::class, 'server']);
Route::get('/invoicecheckout', [HostingController::class, 'finalcheckout']);
Route::get('/invoiceserver', [HostingController::class, 'finalserver']);
Route::get('/pricing', [HostingController::class, 'pricing']);
Route::get('/product', [HostingController::class, 'product']);
Route::get('/edit', [HostingController::class, 'edit']);

/* Login */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Login with Google */

<<<<<<< HEAD
Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
=======
Route::get('/auth/redirect',[SocialiteController::class, 'redirect']);
>>>>>>> 57f2d7277b8d0952113036ba683daf36e0167099
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

/* Sign up with google */
Route::get('auth/google', [RegisterController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [RegisterController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('google/phone', [RegisterController::class, 'showPhoneForm'])->name('google.phone.form');
Route::post('google/phone', [RegisterController::class, 'storePhone'])->name('google.phone.store');


Route::get('/auth/google/redirect', [RegisterController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [RegisterController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/phone', [RegisterController::class, 'showPhoneForm'])->name('google.phone.form');
Route::post('/phone', [RegisterController::class, 'storePhone'])->name('google.phone.store');

Route::get('/profile.update', function () {
    return view('layouts.auth.profile-update');
})->name('profile.update');

Route::get('/client-area/dashboard', function () {
    return view('app.hosting-plans.client-area.dashboard-client');
})->name('client.dashboard');

<<<<<<< HEAD
Route::post('/send-reset-link-via-whatsapp', [ForgotPasswordController::class, 'sendRecoveryLinkViaWhatsApp'])->name('send.reset.link.whatsapp');


/* Crud Product */
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
=======
Route::post('/send-reset-link-via-whatsapp', [ForgotPasswordController::class, 'sendRecoveryLinkViaWhatsApp'])->name('send.reset.link.whatsapp');
>>>>>>> 57f2d7277b8d0952113036ba683daf36e0167099
