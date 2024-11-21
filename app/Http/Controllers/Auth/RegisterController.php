<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            $socialUser  = Socialite::driver('google')->stateless()->user();
            Log::info('Google User Data:', (array) $socialUser);

            $userByEmail = User::where('email', $socialUser->email)->first();

            if ($userByEmail) {
                Log::info('User  found, updating information.');
                // Update existing user with Google information
                $userByEmail->update([
                    'google_id' => $socialUser->id,
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                    'google_profile_image' => $socialUser->avatar,
                ]);

                Auth::login($userByEmail);
                Log::info('User  logged in successfully.');

                return redirect()->route('google.phone.form');
            }

            // Jika pengguna baru, buat pengguna baru
            Log::info('Creating new user.');
            $user = User::create([
                'google_id' => $socialUser->id,
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make(Str::random(24)),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
                'google_profile_image' => $socialUser->avatar,
                'phone' => null,
            ]);

            // Assign role client
            $user->roles()->attach(Role::where('name', 'client')->first());

            Auth::login($user);
            Log::info('New user logged in successfully.');

            return redirect()->route('google.phone.form');
        } catch (\Exception $e) {
            Log::error('Error during Google callback: ' . $e->getMessage());
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
            'role' => 'required|in:admin,client',
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

        // Assign role based on input
        $role = Role::where('name', $request->input('role'))->first();
        $user->roles()->attach($role);

        $request->session()->put('user_email', $user->email);

        Auth::login($user);

        return redirect('/check-email')->with('email', $request->input('email'));
    }
}
