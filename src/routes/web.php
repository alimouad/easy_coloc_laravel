<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::middleware(['guest'])->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->name('user.')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::resource('flatshare', \App\Http\Controllers\FlatshareController::class);
});
