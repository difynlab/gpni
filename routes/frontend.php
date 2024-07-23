<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HistoryOfGpniController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/history-of-gpni', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni');

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
});