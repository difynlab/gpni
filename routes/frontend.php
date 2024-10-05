<?php

use App\Http\Controllers\Frontend\Pages\HomepageController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\Student\DashboardController;
use App\Http\Controllers\Frontend\Pages\HistoryOfGpniController;
use App\Http\Controllers\Frontend\Pages\AdvisoryBoardController;
use App\Http\Controllers\Frontend\Pages\FaqController;
use App\Http\Controllers\Frontend\Pages\ISSNOfficialPartnerController;
use App\Http\Controllers\Frontend\Pages\OurPolicyController;
use App\Http\Controllers\Frontend\Pages\ConferenceController;
use App\Http\Controllers\Frontend\Pages\InsuranceController;
use App\Http\Controllers\Frontend\Pages\GiftCardController;
use App\Http\Controllers\Frontend\Pages\PodcastController;
use App\Http\Controllers\Frontend\Pages\MainArticleController;
use App\Http\Controllers\Frontend\Pages\WhyWeAreDifferentController;
use App\Http\Controllers\Frontend\Pages\MembershipController;
use App\Http\Controllers\Frontend\Pages\ContactUsController;
use App\Http\Controllers\Frontend\Pages\EducationPartnersController;
use App\Http\Controllers\Frontend\Pages\NutritionistController;

use Illuminate\Support\Facades\Route;

require __DIR__.'/frontend-auth.php';

Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set-language');

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/history-of-gpni', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni');
Route::get('/advisory-board', [AdvisoryBoardController::class, 'index'])->name('advisory-board');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/issn-official-partners', [ISSNOfficialPartnerController::class, 'index'])->name('issn-official-partners');
Route::get('/our-policies', [OurPolicyController::class, 'index'])->name('our-policies');
Route::get('/conference', [ConferenceController::class, 'index'])->name('conference');
Route::get('/insurance', [InsuranceController::class, 'index'])->name('insurance');
Route::get('/gift-card', [GiftCardController::class, 'index'])->name('gift-card');
Route::get('/podcasts', [PodcastController::class, 'index'])->name('podcasts');
Route::get('/main-article', [MainArticleController::class, 'index'])->name('main-article');
Route::get('/why-different', [WhyWeAreDifferentController::class, 'index'])->name('why-different');
Route::get('/conference/{id}', [ConferenceController::class, 'show'])->name('single-conference');
Route::get('/main-article/{id}', [MainArticleController::class, 'show'])->name('single-article');
Route::get('/membership', [MembershipController::class, 'index'])->name('membership');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::get('/education-partners', [EducationPartnersController::class, 'index'])->name('education-partners');
Route::get('/nutritionist', [NutritionistController::class, 'index'])->name('nutritionist');
Route::get('/nutritionist/{id}', [NutritionistController::class, 'viewCoach'])->name('view-coach');

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');
});