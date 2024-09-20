<?php

use App\Http\Controllers\HostingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TldController;
use App\Http\Controllers\HostingPlanController;

/* Welcome */

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
})->name('sms.sent.confirmation');

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

Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
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

/* Admin */
Route::get('/admin/testimonial', [TestimonialController::class, 'showTestimonials'])->name('testimonials.show');

Route::get('/profile.update', function () {
    return view('layouts.auth.profile-update');
})->name('profile.update');

Route::get('/client-area/dashboard', function () {
    return view('app.hosting-plans.client-area.dashboard-client');
})->name('client.dashboard');

Route::post('/send-reset-link-via-whatsapp', [ForgotPasswordController::class, 'sendRecoveryLinkViaWhatsApp'])->name('send.reset.link.whatsapp');


Route::resource('clients', ClientController::class);
Route::resource('testimonials', TestimonialController::class);


/* CRUD TLD */
Route::resource('tlds', TldController::class);

/* Hosting Plan */
Route::get('/hosting-plans', [HostingPlanController::class, 'index'])->name('hosting-plans.index');
Route::get('/hosting-plans/create', [HostingPlanController::class, 'create'])->name('hosting-plans.create');
Route::post('/hosting-plans', [HostingPlanController::class, 'store'])->name('hosting-plans.store');
Route::get('/hosting-plans/{id}', [HostingPlanController::class, 'show'])->name('hosting-plans.show');
Route::get('/hosting-plans/{id}/edit', [HostingPlanController::class, 'edit'])->name('hosting-plans.edit');
Route::put('/hosting-plans/{id}', [HostingPlanController::class, 'update'])->name('hosting-plans.update');
Route::delete('/hosting-plans/{id}', [HostingPlanController::class, 'destroy'])->name('hosting-plans.destroy');
