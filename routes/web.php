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
use App\Http\Controllers\PriceController;
use App\Http\Controllers\HostingGroupController;


/* Welcome */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    return phpinfo();
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
Route::get('/about', [HostingController::class, 'about']);
Route::get('/faq', [HostingController::class, 'faq']);


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


/* CRUD Testimonial */
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/testimonials/{id}', [TestimonialController::class, 'show'])->name('testimonials.show');
Route::get('/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

/* Crud Clients */
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

/* CRUD TLD */
Route::get('/tlds', [TLDController::class, 'index'])->name('app.admin.tlds.index');
Route::get('/tlds/create', [TLDController::class, 'create'])->name('tlds.create');
Route::post('/tlds/store', [TLDController::class, 'store'])->name('tlds.store');
Route::get('/tlds/{tld}/edit', [TLDController::class, 'edit'])->name('tlds.edit');
Route::put('/tlds/{tld}', [TLDController::class, 'update'])->name('tlds.update');
Route::delete('/tlds/{tld}', [TLDController::class, 'destroy'])->name('tlds.destroy');

/* Hosting Plan */
Route::get('/hosting-plans', [HostingPlanController::class, 'index'])->name('hosting-plans.index');
Route::get('/hosting-plans/create', [HostingPlanController::class, 'create'])->name('hosting-plans.create');
Route::post('/hosting-plans', [HostingPlanController::class, 'store'])->name('hosting-plans.store');
Route::get('/hosting-plans/{id}', [HostingPlanController::class, 'show'])->name('hosting-plans.show');
Route::get('/hosting-plans/{id}/edit', [HostingPlanController::class, 'edit'])->name('hosting-plans.edit');
Route::put('hosting-plans/{id}', [HostingPlanController::class, 'update'])->name('hosting-plans.update');
Route::delete('/hosting-plans/{id}', [HostingPlanController::class, 'destroy'])->name('hosting-plans.destroy');
Route::post('hosting-plans/{id}/restore', [HostingPlanController::class, 'restore'])->name('hosting-plans.restore');
Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('price.destroy');

/* Hosting Group */
Route::get('/hosting-groups', [HostingGroupController::class, 'index'])->name('hosting-groups.index');
Route::get('/hosting-groups/create', [HostingGroupController::class, 'create'])->name('hosting-groups.create');
Route::post('/hosting-groups', [HostingGroupController::class, 'store'])->name('hosting-groups.store');
Route::get('/hosting-groups/{id}', [HostingGroupController::class, 'show'])->name('hosting-groups.show');
Route::get('/hosting-groups/{id}/edit', [HostingGroupController::class, 'edit'])->name('hosting-groups.edit');
Route::put('/hosting-groups/{id}', [HostingGroupController::class, 'update'])->name('hosting-groups.update');
Route::delete('/hosting-groups/{id}', [HostingGroupController::class, 'destroy'])->name('hosting-groups.destroy');
Route::post('/hosting-groups/{id}/restore', [HostingGroupController::class, 'restore'])->name('hosting-groups.restore');
