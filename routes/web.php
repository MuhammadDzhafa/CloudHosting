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
use App\Http\Controllers\HostingGroupController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CheckoutController;


/* Welcome */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    return phpinfo();
});

/* Dashboard */
Route::get('/', [HostingController::class, 'index']);

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
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/server', [HostingController::class, 'server']);
Route::get('/invoicecheckout', [HostingController::class, 'finalcheckout']);
Route::get('/invoiceserver', [HostingController::class, 'finalserver']);
Route::get('/cloud-hosting', [HostingController::class, 'cloud']);
Route::get('/wordpress-hosting', [HostingController::class, 'wordpress']);
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/about', [HostingController::class, 'about']);
Route::get('/admin-dashboard', [HostingController::class, 'admin']);
Route::get('/client-dashboard', [HostingController::class, 'client'])->name('client.dashboard');
Route::get('/domain', [HostingController::class, 'domain']);
Route::get('/privacy-policy', [HostingController::class, 'privacy']);
Route::get('/terms-and-conditions', [HostingController::class, 'termsConditions']);
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');

/* Login */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/', [LoginController::class, 'logout'])->name('logout');

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


Route::get('/profile.update', function () {
    return view('layouts.auth.profile-update');
})->name('profile.update');

// Route::get('/client-dashboard', function () {
//     return view('app.hosting-plans.dashboard.index');
// })->name('client.dashboard');

Route::post('/send-reset-link-via-whatsapp', [ForgotPasswordController::class, 'sendRecoveryLinkViaWhatsApp'])->name('send.reset.link.whatsapp');


/* CRUD Testimonial */
Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/admin/testimonials/{id}', [TestimonialController::class, 'show'])->name('testimonials.show');
Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

/* Crud Clients */
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

/* CRUD TLD */
Route::get('/admin/tlds', [TLDController::class, 'index'])->name('app.admin.tlds.index');
Route::get('/admin/tlds/create', [TLDController::class, 'create'])->name('tlds.create');
Route::post('/admin/tlds/store', [TLDController::class, 'store'])->name('tlds.store');
Route::get('/admin/tlds/{tld}/edit', [TLDController::class, 'edit'])->name('tlds.edit');
Route::put('/admin/tlds/{id}', [TLDController::class, 'update'])->name('tlds.update');
Route::delete('/admin/tlds/{tld}', [TLDController::class, 'destroy'])->name('tlds.destroy');
Route::post('/admin/tlds/order', [TLDController::class, 'order'])->name('tlds.order');

/* Hosting Plan */
Route::get('/admin/hosting-plans', [HostingPlanController::class, 'index'])->name('hosting-plans.index');
Route::get('/admin/hosting-plans/create', [HostingPlanController::class, 'create'])->name('hosting-plans.create');
Route::post('/admin/hosting-plans', [HostingPlanController::class, 'store'])->name('hosting-plans.store');
Route::get('/admin/hosting-plans/{id}', [HostingPlanController::class, 'show'])->name('hosting-plans.show');
Route::get('/admin/hosting-plans/{id}/edit', [HostingPlanController::class, 'edit'])->name('hosting-plans.edit');
Route::put('/admin/hosting-plans/{id}', [HostingPlanController::class, 'update'])->name('hosting-plans.update');
Route::delete('/admin/hosting-plans/{id}', [HostingPlanController::class, 'destroy'])->name('hosting-plans.destroy');
Route::post('/admin/hosting-plans/{id}/restore', [HostingPlanController::class, 'restore'])->name('hosting-plans.restore');


/* Hosting Group */
Route::get('/hosting-groups', [HostingGroupController::class, 'index'])->name('hosting-groups.index');
Route::get('/hosting-groups/create', [HostingGroupController::class, 'create'])->name('hosting-groups.create');
Route::post('/hosting-groups', [HostingGroupController::class, 'store'])->name('hosting-groups.store');
Route::get('/hosting-groups/{id}', [HostingGroupController::class, 'show'])->name('hosting-groups.show');
Route::get('/hosting-groups/{id}/edit', [HostingGroupController::class, 'edit'])->name('hosting-groups.edit');
Route::put('/hosting-groups/{id}', [HostingGroupController::class, 'update'])->name('hosting-groups.update');
Route::delete('/hosting-groups/{id}', [HostingGroupController::class, 'destroy'])->name('hosting-groups.destroy');
Route::post('/hosting-groups/{id}/restore', [HostingGroupController::class, 'restore'])->name('hosting-groups.restore');

/* Article */
Route::get('/admin/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/admin/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/admin/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/admin/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/admin/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/admin/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::post('/admin/articles/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');
/* Faqs */
Route::get('/admin/faqs', [FaqController::class, 'faqs'])->name('faqs.index'); // Menggunakan faqs()
Route::get('/admin/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
Route::post('/admin/faqs', [FaqController::class, 'store'])->name('faqs.store');
Route::get('/admin/faqs/{id}', [FaqController::class, 'show'])->name('faqs.show');
Route::get('/admin/faqs/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
Route::put('/admin/faqs/{id}', [FaqController::class, 'update'])->name('faqs.update');
Route::delete('/admin/faqs/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');
Route::post('/admin/faqs/{id}/restore', [FaqController::class, 'restore'])->name('faqs.restore');

// Rute untuk halaman FAQ publik
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/admin/contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');
Route::get('/admin/contact-us/create', [ContactUsController::class, 'create'])->name('contact-us.create');
Route::post('/admin/contact-us', [ContactUsController::class, 'store'])->name('contact-us.store');
Route::get('/admin/contact-us/{id}', [ContactUsController::class, 'show'])->name('contact-us.show');
Route::get('/admin/contact-us/{id}/edit', [ContactUsController::class, 'edit'])->name('contact-us.edit');
Route::put('/admin/contact-us/{id}', [ContactUsController::class, 'update'])->name('contact-us.update');
Route::delete('/admin/contact-us/{id}', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');

Route::post('/save-domain-details', [CheckoutController::class, 'saveDomainDetails']);
Route::post('/save-billing-address', [CheckoutController::class, 'saveBillingAddress']);
Route::post('/save-custom-plan', [CheckoutController::class, 'saveCustomPlan'])->name('save.custom.plan');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::middleware(['auth'])->group(function () {
    Route::post('/checkout/process', [CheckoutController::class, 'processOrder'])->name('checkout.process');
});

Route::get('auth/google', [RegisterController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [RegisterController::class, 'handleGoogleCallback']);
Route::get('auth/google/phone', [RegisterController::class, 'showPhoneForm'])->name('google.phone.form');
Route::post('auth/google/phone', [RegisterController::class, 'storePhone'])->name('google.phone.store');
Route::post('/checkout', [CheckoutController::class, 'saveClientData'])->name('register');
Route::post('/checkout/save-addons', [CheckoutController::class, 'saveAddons'])->name('checkout.save-addons');
Route::post('/save-addons', [CheckoutController::class, 'saveAddons'])->name('save-addons');