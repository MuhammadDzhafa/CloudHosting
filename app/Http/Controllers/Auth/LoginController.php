<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.auth.login');
    }

    public function login(Request $request)
    {
        Log::info('Login attempt for email: ' . $request->input('email'));

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed for login attempt.', $validator->errors()->toArray());
            return $this->sendFailedLoginResponse($request, $validator);
        }

        if ($this->attemptLogin($request)) {
            Log::info('Login successful for email: ' . $request->input('email'));
            return $this->sendLoginResponse($request);
        }

        Log::warning('Login failed for email: ' . $request->input('email'));
        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Attempting login with credentials: ', $credentials);

        return Auth::attempt(
            $credentials,
            $request->filled('remember')
        );
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->intended('/admin-dashboard?login_success=true');
        } elseif ($user->hasRole('client')) {
            return redirect()->intended('/?login_success=true');
        }

        return redirect()->intended('/?login_success=true'); // Default redirection if role is not set
    }

    protected function sendFailedLoginResponse(Request $request, $validator = null)
    {
        if ($validator) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')], // Pesan kesalahan jika login gagal
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'You have been successfully logged out.');
    }
}
