<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider, $action)
    {
        session(['social_action' => $action]);
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $action = session('social_action', 'login');
        
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Autentikasi gagal.');
        }

        $user = User::where('email', $socialUser->getEmail())->first();

        if ($action === 'register') {
            if ($user) {
               
                $exists = collect($user->providers ?? [])->contains(fn($p) =>
                    $p['provider'] === $provider && $p['provider_id'] === $socialUser->getId()
                );
    
                if (!$exists) {
                    $providers = $user->providers ?? [];
                    $providers[] = [
                        'provider'    => $provider,
                        'provider_id' => $socialUser->getId()
                    ];
                    $user->update(['providers' => $providers]);
                }
    
                Auth::login($user);
                return redirect('/');
            }

            $user = User::create([
                'name'        => $socialUser->getName(),
                'email'       => $socialUser->getEmail(),
                'avatar'      => $socialUser->getAvatar(),
                'providers'    => [[
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId()
                ]],
            ]);

            Auth::login($user);
            return redirect('/');
        } else {
            if (!$user) {
                return redirect('/')->with('error', 'Akun belum terdaftar.');
            }

            Auth::login($user);
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function getByEmail($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect('/')->with('error', 'User tidak ditemukan.');
        }

        return view('partials.profile', compact('user'));
    }
}
