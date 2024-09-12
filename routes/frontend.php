<?php

use App\Http\Controllers\Frontend\Pages\HomepageController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\Student\DashboardController;

use App\Http\Controllers\Frontend\Pages\HistoryOfGpniController;
use App\Http\Controllers\Frontend\Pages\AdvisoryBoardController;
use App\Http\Controllers\Frontend\Pages\FaqController;

use App\Http\Controllers\Frontend\Pages\ISSNOfficialPartnersController;
use App\Http\Controllers\Frontend\Pages\OurPoliciesController;

use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set-language');

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/history-of-gpni', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni');
Route::get('/advisory-board', [AdvisoryBoardController::class, 'index'])->name('advisory-board');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/issn-official-partners', [ISSNOfficialPartnersController::class, 'index'])->name('issn-official-partners');
Route::get('/our-policies', [OurPoliciesController::class, 'index'])->name('our-policies');

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
});