<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
});