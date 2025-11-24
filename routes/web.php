<?php

use App\Http\Controllers\GoogleAuthController;
use App\Livewire\Auth\GoogleRegister;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Menus\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');


Route::get('auth/google', [GoogleAuthController::class, 'googleLogin'])->name('auth.google');

Route::get('auth/login', GoogleRegister::class)->name('auth.login');
Route::get('/register', Register::class)->name('auth.register');

Route::middleware('web')->group(function () {
    Route::get('/home', Home::class)->name('home');
});