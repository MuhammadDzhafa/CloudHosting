<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Role; // Tambahkan penggunaan model Role
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('layouts.auth.signup');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $socialUser = Socialite::driver('google')->stateless()->user();
            $userByEmail = User::where('email', $socialUser->email)->first();

            if ($userByEmail) {
                // Update existing user with Google information
                $userByEmail->update([
                    'google_id' => $socialUser->id,
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                ]);

                Auth::login($userByEmail);
                return redirect('/client-dashboard'); // Redirect to client dashboard
            }

            $registeredUsers = User::where('google_id', $socialUser->id)->first();

            if (!$registeredUsers) {
                // Create new user and assign "client" role
                $user = User::create([
                    'google_id' => $socialUser->id,
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'password' => Hash::make(Str::random(24)), // Random password
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                    'phone' => null,
                ]);

                // Assign "client" role
                $user->roles()->attach(Role::where('name', 'client')->first());

                Auth::login($user);
            } else {
                Auth::login($registeredUsers);
            }

            $request->session()->put('user_email', Auth::user()->email);
            return redirect()->route('google.phone.form');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Failed to register with Google. Please try again.');
        }
    }


    public function showPhoneForm()
    {
        $userEmail = session('user_email');
        $userFirstName = '';

        if ($userEmail) {
            $emailParts = explode('@', $userEmail);
            if (isset($emailParts[0])) {
                $nameParts = explode('.', $emailParts[0]);
                $userFirstName = $nameParts[0];
            }
        }

        return view('layouts.auth.google-phone', ['userFirstName' => $userFirstName]);
    }

    public function storePhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->save();

        // Redirect to profile update route with a delay
        return redirect()->route('profile.update')->with('phoneSaved', true);
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                function ($attribute, $value, $fail) {
                    if (!str_ends_with($value, '@gmail.com')) {
                        $fail('The email must be a valid Gmail address.');
                    }
                },
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'terms' => 'required|accepted',
            'role' => 'required|in:admin,client', // Validasi untuk role
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
            'phone.min' => 'Phone number must be at least 10 digits.',
            'terms.required' => 'You must accept the Terms and Conditions.',
            'terms.accepted' => 'You must accept the Terms and Conditions.',
            'role.required' => 'Please select a role.',
            'role.in' => 'The selected role is invalid.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
        ]);

        // Mengaitkan role ke pengguna berdasarkan input
        $role = Role::where('name', $request->input('role'))->first();
        $user->roles()->attach($role);

        $request->session()->put('user_email', $user->email);

        Auth::login($user);

        return redirect('/check-email')->with('email', $request->input('email'));
    }
}
