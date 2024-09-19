<?php

use App\Http\Controllers\HostingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

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

/* Crud Product */
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
// Route::post('/product', [ProductController::class, 'create'])->name('product.create');
// Route::post('/group', [ProductController::class, 'create'])->name('group.createGroup');
// Route::get('/product', [ProductController::class, ''])->name('product.index');

/* Crud Hosting Package */
// Route::get('/clients', ClientController::class .'@index')->name('clients.index');
// Route::get('/clients/create', ClientController::class . '@create')->name('clients.create');
// Route::post('/clients/store', ClientController::class . '@store')->name('clients.store');
// CRUD Client Package
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');


/* Crud Testimonial Package */
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/testimonials/{id}', [TestimonialController::class, 'show'])->name('testimonials.show');
Route::get('/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');



// Route::post('/clients', [ClientController::class, 'store']);
// Route::get('/clients/{id}', [ClientController::class, 'show']);
// Route::get('/clients/{id}/edit', [ClientController::class, 'edit']);
// Route::patch('/clients/{id}', [ClientController::class, 'update']);
// Route::delete('/clients/{id}', [ClientController::class, 'destroy']);