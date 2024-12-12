<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    public function redirect(Request $request)
    {
        // Simpan redirect ke session
        $request->session()->put('redirect_after_phone', $request->input('redirect', '/client-dashboard'));
        return Socialite::driver('google')->redirect();
    }
}
