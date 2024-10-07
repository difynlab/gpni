<?php

use App\Http\Controllers\Frontend\Auth\AuthenticationController;
use App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\ResetPasswordController;

use App\Http\Controllers\Frontend\Auth\SignInController;
use App\Http\Controllers\Frontend\Auth\SignUpController;
use App\Http\Controllers\Frontend\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

//student

Route::get('sign-in', [SignInController::class, 'index'])->name('sign-in');
Route::get('sign-up', [SignUpController::class, 'index'])->name('sign-up');
Route::get('change-password', [PasswordController::class, 'index'])->name('change-password');

//student

Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('login', [AuthenticationController::class, 'store'])->name('login.store');

Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.store');

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
});