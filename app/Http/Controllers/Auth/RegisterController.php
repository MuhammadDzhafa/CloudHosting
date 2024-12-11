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
            // Mendapatkan data pengguna dari Google
            $socialUser  = Socialite::driver('google')->stateless()->user();

            // Debugging: Tampilkan data pengguna yang diterima dari Google
            Log::info('Google user data: ', (array) $socialUser);

            // Mencari pengguna berdasarkan email
            $userByEmail = User::where('email', $socialUser->email)->first();

            if ($userByEmail) {
                Log::info('User  found, updating information.');
                // Update informasi pengguna yang ada
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
                'password' => Hash::make(Str::random(24)), // Password acak untuk pengguna baru
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
                'google_profile_image' => $socialUser->avatar,
                'phone' => null,
            ]);

            // Assign role client
            $role = Role::where('name', 'client')->first();
            if ($role) {
                $user->roles()->attach($role);
                Log::info('Role assigned to new user: client');
            } else {
                Log::warning('Role client not found.');
            }

            Auth::login($user);
            Log::info('New user logged in successfully.');

            return redirect()->route('google.phone.form');
        } catch (\Exception $e) {
            // Gunakan dd() untuk menampilkan error
            dd('Error during Google callback: ' . $e->getMessage());
            // Jika Anda ingin tetap mencatat error ke log, Anda bisa menggunakan Log::error() juga
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
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$! %*?&]{8,}$/'
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
        if ($role) {
            $user->roles()->attach($role);
            Log::info('Role assigned to user: ' . $role->name);
        } else {
            Log::warning('Role ' . $request->input('role') . ' not found.');
        }

        $request->session()->put('user_email', $user->email);

        Auth::login($user);

        return redirect('/check-email')->with('email', $request->input('email'));
    }
}
