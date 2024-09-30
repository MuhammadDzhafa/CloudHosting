<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.auth.login');
    }

    public function login(Request $request)
    {
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
            return $this->sendFailedLoginResponse($request, $validator);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $request->only('email', 'password'),
            $request->filled('remember') // Ini sudah benar untuk menangani "Remember Me"
        );
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        return redirect()->intended('/landing-page');
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

        return redirect('/')->with('status', 'You have been successfully logged out.');
    }
}   
