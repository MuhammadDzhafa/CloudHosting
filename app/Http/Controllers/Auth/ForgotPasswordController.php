<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showOptions()
    {
        return view('layouts.auth.recovery.passwordrecovery.forgot-password-options');
    }

    public function showResetForm()
    {
        return view('layouts.auth.recovery.emailrecovery.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.exists' => 'We could not find a user with that email address.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return view('layouts.auth.recovery.passwordrecovery.email-sent-confirmation', ['email' => $request->email]);
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function showForgotEmailForm()
    {
        return view('layouts.auth.recovery.passwordrecovery.forgot-email');
    }

    public function recoverEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ], [
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
            'phone.min' => 'Phone number must be at least 10 digits.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $phone = $request->input('phone');
        $formattedPhone = substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);

        return view('layouts.auth.recovery.emailrecovery.sms-sent-confirmation', ['phone' => '+62 ' . $formattedPhone]);
    }

    public function sendRecoveryLinkViaWhatsApp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
        ], [
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $phone = $request->input('phone');

        // Generate the recovery link
        $token = Str::random(60); // Generate a secure random token
        $resetLink = url("/password/reset/{$token}");

        // Send the recovery link via WhatsApp using Twilio
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.auth_token'));

        try {
            $message = $twilio->messages->create(
                'whatsapp:' . $phone, // To: nomor WhatsApp penerima
                [
                    'from' => 'whatsapp:+14155238886', // From: nomor WhatsApp yang valid
                    'body' => "You have requested a password reset. Click the following link to reset your password: $resetLink",
                ]
            );

            return view('layouts.auth.recovery.emailrecovery.sms-sent-confirmation', ['phone' => $phone]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }
}