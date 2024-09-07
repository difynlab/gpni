<?php

use App\Http\Controllers\Frontend\Pages\HomepageController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\Pages\HistoryOfGpniController;
use App\Http\Controllers\Frontend\Student\DashboardController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set-language');

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/history-of-gpni', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni');

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
});