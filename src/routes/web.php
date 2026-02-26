<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlatshareController;
use App\Models\Invitation;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\AdminController;

Route::middleware(['guest'])->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->name('user.')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::resource('flatshare', FlatshareController::class);
    Route::get('/flatshares/{id}', [FlatshareController::class, 'show'])->name('flatshare.show');
    Route::post('/flatshares/{id}/invite', [InvitationController::class, 'invite'])->name('flatshare.invite');
    Route::post('/invitations/{id}/accept', [InvitationController::class, 'acceptInvite'])->name('invitation.accept');
    Route::delete('/invitations/{id}/decline', [InvitationController::class, 'declineInvite'])->name('invitation.decline');
});

Route::middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('home');
    Route::patch('/admin/{user}/ban', [AdminController::class, 'ban'])->name('user.ban');
    Route::patch('/admin/{user}/unban', [AdminController::class, 'unban'])->name('user.unban');
});
