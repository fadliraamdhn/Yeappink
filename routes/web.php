<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (FacadesAuth::check()){
        return view('home');
    } else {
        return view('welcome');
    }
});

Route::get('/{email}', [SocialAuthController::class, 'getByEmail'])->name('profile');

Route::get('/auth/google/register', [SocialAuthController::class, 'redirect'])->defaults('provider', 'google')->defaults('action', 'register');
Route::get('/auth/google/login', [SocialAuthController::class, 'redirect'])->defaults('provider', 'google')->defaults('action', 'login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'callback'])->defaults('provider', 'google');

Route::get('/auth/linkedin/register', [SocialAuthController::class, 'redirect'])->defaults('provider', 'linkedin')->defaults('action', 'register');
Route::get('/auth/linkedin/login', [SocialAuthController::class, 'redirect'])->defaults('provider', 'linkedin')->defaults('action', 'login');
Route::get('/auth/linkedin/callback', [SocialAuthController::class, 'callback'])->defaults('provider', 'linkedin');

Route::post('/logout', [SocialAuthController::class, 'logout'])->name('logout');