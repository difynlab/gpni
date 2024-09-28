<?php

use App\Http\Controllers\Backend\Administration\DashboardController;
use App\Http\Controllers\Backend\Administration\MyProfileController;
use App\Http\Controllers\Backend\Administration\SettingsController;
use App\Http\Controllers\Backend\Article\ArticleCategoryController;
use App\Http\Controllers\Backend\Article\ArticleController;
use App\Http\Controllers\Backend\Communication\AskQuestionController;
use App\Http\Controllers\Backend\Communication\ConnectionController;
use App\Http\Controllers\Backend\Communication\ContactCoachController;
use App\Http\Controllers\Backend\Conference\ConferenceController;
use App\Http\Controllers\Backend\Course\CourseChapterController;
use App\Http\Controllers\Backend\Course\CourseController;
use App\Http\Controllers\Backend\Course\CourseModuleController;
use App\Http\Controllers\Backend\Course\CourseModuleExamQuestionController;
use App\Http\Controllers\Backend\FAQ\FAQController;
use App\Http\Controllers\Backend\Media\MediaController;
use App\Http\Controllers\Backend\Order\GiftCardOrderController;
use App\Http\Controllers\Backend\Page\AdvisoryBoardController as PageAdvisoryBoardController;
use App\Http\Controllers\Backend\Page\ArticleController as PageArticleController;
use App\Http\Controllers\Backend\Page\ConferenceController as PageConferenceController;
use App\Http\Controllers\Backend\Page\ConnectionController as PageConnectionController;
use App\Http\Controllers\Backend\Page\FAQController as PageFAQController;
use App\Http\Controllers\Backend\Page\GiftCardController;
use App\Http\Controllers\Backend\Page\GlobalEducationPartnerController as PageGlobalEducationPartnerController;
use App\Http\Controllers\Backend\Testimonial\TestimonialController;
use App\Http\Controllers\Backend\Page\HistoryOfGpniController;
use App\Http\Controllers\Backend\Page\HomepageController;
use App\Http\Controllers\Backend\Page\InsuranceProfessionalMembershipController;
use App\Http\Controllers\Backend\Page\ISSNPartnerController as PageISSNPartnerController;
use App\Http\Controllers\Backend\Page\MasterClassController;
use App\Http\Controllers\Backend\Page\MembershipController;
use App\Http\Controllers\Backend\Page\NutritionistController as PageNutritionistController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\Page\PodcastController as PagePodcastController;
use App\Http\Controllers\Backend\Page\PolicyController as PagePolicyController;
use App\Http\Controllers\Backend\Page\TvController;
use App\Http\Controllers\Backend\Page\WhyWeAreDifferentController;
use App\Http\Controllers\Backend\Person\AdminController;
use App\Http\Controllers\Backend\Person\AdvisoryBoardController as PersonAdvisoryBoardController;
use App\Http\Controllers\Backend\Person\GlobalEducationPartnerController;
use App\Http\Controllers\Backend\Person\ISSNPartnerController as PersonISSNPartnerController;
use App\Http\Controllers\Backend\Person\NutritionistController;
use App\Http\Controllers\Backend\Person\StudentController;
use App\Http\Controllers\Backend\Podcast\PodcastController;
use App\Http\Controllers\Backend\Policy\PolicyCategoryController;
use App\Http\Controllers\Backend\Policy\PolicyController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Promotion\PromotionController;
use App\Http\Controllers\Backend\Webinar\WebinarController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/backend-auth.php';

Route::get('/admin', function () {
    return redirect()->route('backend.login');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only('index');

    // All page related routes
        Route::get('pages', [PageController::class, 'index'])->name('pages.index');
        Route::prefix('pages')->name('pages.')->group(function() {

            Route::get('homepage/{language}', [HomepageController::class, 'index'])->name('homepage.index');
            Route::post('homepage/{language}', [HomepageController::class, 'update'])->name('homepage.update');

            Route::get('why-we-are-different/{language}', [WhyWeAreDifferentController::class, 'index'])->name('why-we-are-different.index');
            Route::post('why-we-are-different/{language}', [WhyWeAreDifferentController::class, 'update'])->name('why-we-are-different.update');

            Route::get('history-of-gpni/{language}', [HistoryOfGpniController::class, 'index'])->name('history-of-gpni.index');
            Route::post('history-of-gpni/{language}', [HistoryOfGpniController::class, 'update'])->name('history-of-gpni.update');

            Route::get('gift-card/{language}', [GiftCardController::class, 'index'])->name('gift-card.index');
            Route::post('gift-card/{language}', [GiftCardController::class, 'update'])->name('gift-card.update');

            Route::get('advisory-board/{language}', [PageAdvisoryBoardController::class, 'index'])->name('advisory-board.index');
            Route::post('advisory-board/{language}', [PageAdvisoryBoardController::class, 'update'])->name('advisory-board.update');

            Route::get('issn-partner/{language}', [PageISSNPartnerController::class, 'index'])->name('issn-partner.index');
            Route::post('issn-partner/{language}', [PageISSNPartnerController::class, 'update'])->name('issn-partner.update');

            Route::get('faq/{language}', [PageFAQController::class, 'index'])->name('faq.index');
            Route::post('faq/{language}', [PageFAQController::class, 'update'])->name('faq.update');

            Route::get('policy/{language}', [PagePolicyController::class, 'index'])->name('policy.index');
            Route::post('policy/{language}', [PagePolicyController::class, 'update'])->name('policy.update');

            Route::get('insurance-professional-membership/{language}', [InsuranceProfessionalMembershipController::class, 'index'])->name('insurance-professional-membership.index');
            Route::post('insurance-professional-membership/{language}', [InsuranceProfessionalMembershipController::class, 'update'])->name('insurance-professional-membership.update');

            Route::get('article/{language}', [PageArticleController::class, 'index'])->name('article.index');
            Route::post('article/{language}', [PageArticleController::class, 'update'])->name('article.update');

            Route::get('conference/{language}', [PageConferenceController::class, 'index'])->name('conference.index');
            Route::post('conference/{language}', [PageConferenceController::class, 'update'])->name('conference.update');

            Route::get('podcast/{language}', [PagePodcastController::class, 'index'])->name('podcast.index');
            Route::post('podcast/{language}', [PagePodcastController::class, 'update'])->name('podcast.update');

            Route::get('membership/{language}', [MembershipController::class, 'index'])->name('membership.index');
            Route::post('membership/{language}', [MembershipController::class, 'update'])->name('membership.update');

            Route::get('connection/{language}', [PageConnectionController::class, 'index'])->name('connection.index');
            Route::post('connection/{language}', [PageConnectionController::class, 'update'])->name('connection.update');

            Route::get('nutritionist/{language}', [PageNutritionistController::class, 'index'])->name('nutritionist.index');
            Route::post('nutritionist/{language}', [PageNutritionistController::class, 'update'])->name('nutritionist.update');

            Route::get('global-education-partner/{language}', [PageGlobalEducationPartnerController::class, 'index'])->name('global-education-partner.index');
            Route::post('global-education-partner/{language}', [PageGlobalEducationPartnerController::class, 'update'])->name('global-education-partner.update');

            Route::get('tv/{language}', [TvController::class, 'index'])->name('tv.index');
            Route::post('tv/{language}', [TvController::class, 'update'])->name('tv.update');

            Route::get('master-class/{language}', [MasterClassController::class, 'index'])->name('master-class.index');
            Route::post('master-class/{language}', [MasterClassController::class, 'update'])->name('master-class.update');
        });
    // All page related routes


    // All administrations routes
        Route::resource('my-profile', MyProfileController::class)->only('index', 'update');
        Route::resource('settings', SettingsController::class)->only('index', 'update');
    // All administrations routes


    // All course related routes
        Route::resource('courses', CourseController::class)->except('show');
        Route::post('courses/filter', [CourseController::class, 'filter'])->name('courses.filter');

        Route::prefix('courses')->name('courses.')->group(function() {
            Route::get('modules/{course}', [CourseModuleController::class, 'index'])->name('modules.index');
            Route::post('modules/store', [CourseModuleController::class, 'store'])->name('modules.store');
            Route::get('modules/edit/{course_module}', [CourseModuleController::class, 'edit'])->name('modules.edit');
            Route::post('modules/update/{course_module}', [CourseModuleController::class, 'update'])->name('modules.update');
            Route::delete('modules/destroy/{course_module}', [CourseModuleController::class, 'destroy'])->name('modules.destroy');

            Route::get('modules/chapters/{course_module}', [CourseChapterController::class, 'index'])->name('module-chapters.index');
            Route::get('modules/chapters/{course_module}/create', [CourseChapterController::class, 'create'])->name('module-chapters.create');
            Route::post('modules/chapters/{course_module}/store', [CourseChapterController::class, 'store'])->name('module-chapters.store');
            Route::get('modules/chapters/{course_module}/edit/{course_chapter}', [CourseChapterController::class, 'edit'])->name('module-chapters.edit');
            Route::post('modules/chapters/{course_module}/update/{course_chapter}', [CourseChapterController::class, 'update'])->name('module-chapters.update');
            Route::delete('modules/chapters/{course_module}/destroy/{course_chapter}', [CourseChapterController::class, 'destroy'])->name('module-chapters.destroy');

            Route::get('modules/exam-questions/{course_module}', [CourseModuleExamQuestionController::class, 'index'])->name('module-exam-questions.index');
            Route::get('modules/exam-questions/{course_module}/create', [CourseModuleExamQuestionController::class, 'create'])->name('module-exam-questions.create');
            Route::post('modules/exam-questions/{course_module}/store', [CourseModuleExamQuestionController::class, 'store'])->name('module-exam-questions.store');
            Route::get('modules/exam-questions/{course_module}/edit/{course_module_exam_question}', [CourseModuleExamQuestionController::class, 'edit'])->name('module-exam-questions.edit');
            Route::post('modules/exam-questions/{course_module}/update/{course_module_exam_question}', [CourseModuleExamQuestionController::class, 'update'])->name('module-exam-questions.update');
            Route::delete('modules/exam-questions/{course_module}/destroy/{course_module_exam_question}', [CourseModuleExamQuestionController::class, 'destroy'])->name('module-exam-questions.destroy');
        });

        Route::resource('promotions', PromotionController::class)->except('show');
    // All course related routes


    // All article related routes
        Route::resource('article-categories', ArticleCategoryController::class)->except(['show']);
        Route::post('article-categories/filter', [ArticleCategoryController::class, 'filter'])->name('article-categories.filter');

        Route::resource('articles', ArticleController::class)->except(['show']);
        Route::post('articles/filter', [ArticleController::class, 'filter'])->name('articles.filter');
    // All article related routes


    // Conferences routes
        Route::resource('conferences', ConferenceController::class)->except('show');
        Route::post('conferences/filter', [ConferenceController::class, 'filter'])->name('conferences.filter');
    // Conferences routes


    // FAQs routes
        Route::resource('faqs', FAQController::class)->except('show');
        Route::post('faqs/filter', [FAQController::class, 'filter'])->name('faqs.filter');
    // FAQs routes


    // Testimonials routes
        Route::resource('testimonials', TestimonialController::class)->except('show');
        Route::post('testimonials/filter', [TestimonialController::class, 'filter'])->name('testimonials.filter');
    // Testimonials routes


    // All product related routes
        Route::resource('product-categories', ProductCategoryController::class)->except(['show']);
        Route::post('product-categories/filter', [ProductCategoryController::class, 'filter'])->name('product-categories.filter');

        Route::resource('products', ProductController::class)->except('show');
        Route::post('products/filter', [ProductController::class, 'filter'])->name('products.filter');
    // All product related routes


    // Medias routes
        Route::resource('medias', MediaController::class)->except('show');
        Route::post('medias/filter', [MediaController::class, 'filter'])->name('medias.filter');
    // Medias routes

    // Podcast routes
        Route::resource('podcasts', PodcastController::class)->except('show');
        Route::post('podcasts/filter', [PodcastController::class, 'filter'])->name('podcasts.filter');
    // Podcast routes


    // All users routes
        Route::prefix('persons')->name('persons.')->group(function() {
            // Nutritionists routes
                Route::resource('nutritionists', NutritionistController::class)->except('show');
                Route::post('nutritionists/filter', [NutritionistController::class, 'filter'])->name('nutritionists.filter');
            // Nutritionists routes

            // Students routes
                Route::resource('students', StudentController::class)->except(['show']);
                Route::post('students/filter', [StudentController::class, 'filter'])->name('students.filter');
            // Students routes

            // Admins routes
                Route::resource('admins', AdminController::class)->except(['show']);
                Route::post('admins/filter', [AdminController::class, 'filter'])->name('admins.filter');
            // Admins routes

            // Advisory board routes
                Route::resource('advisory-boards', PersonAdvisoryBoardController::class)->except('show');
                Route::post('advisory-boards/filter', [PersonAdvisoryBoardController::class, 'filter'])->name('advisory-boards.filter');
            // Advisory board routes

            // ISSN partner routes
                Route::resource('issn-partners', PersonISSNPartnerController::class)->except('show');
                Route::post('issn-partners/filter', [PersonISSNPartnerController::class, 'filter'])->name('issn-partners.filter');
            // ISSN partner routes

            // Global education partners routes
                Route::resource('global-education-partners', GlobalEducationPartnerController::class)->except('show');
                Route::post('global-education-partners/filter', [GlobalEducationPartnerController::class, 'filter'])->name('global-education-partners.filter');
            // Global education partners routes
        });
    // All users routes


    // All communication routes
        Route::prefix('communications')->name('communications.')->group(function() {
            Route::prefix('contact-coaches')->name('contact-coaches.')->group(function() {
                Route::get('/', [ContactCoachController::class, 'index'])->name('index');
                Route::post('/filter', [ContactCoachController::class, 'filter'])->name('filter');
                Route::delete('/{contact_coach}', [ContactCoachController::class, 'destroy'])->name('destroy');
            });

            Route::resource('ask-questions', AskQuestionController::class)->except(['create', 'show']);
            Route::post('ask-questions/filter', [AskQuestionController::class, 'filter'])->name('ask-questions.filter');

            Route::resource('connections', ConnectionController::class)->except(['create', 'show']);
        });
    // All communication routes


    // All order routes
        Route::prefix('orders')->name('orders.')->group(function() {
            Route::prefix('gift-card-orders')->name('gift-card-orders.')->group(function() {
                Route::get('/', [GiftCardOrderController::class, 'index'])->name('index');
                Route::post('/filter', [GiftCardOrderController::class, 'filter'])->name('filter');
                Route::delete('/{gift_card_order}', [GiftCardOrderController::class, 'destroy'])->name('destroy');
            });
        });
    // All order routes


    // All policies related routes
        Route::resource('policy-categories', PolicyCategoryController::class)->except(['show']);
        Route::post('policy-categories/filter', [PolicyCategoryController::class, 'filter'])->name('policy-categories.filter');

        Route::resource('policies', PolicyController::class)->except(['show']);
        Route::post('policies/filter', [PolicyController::class, 'filter'])->name('policies.filter');
    // All policies related routes

    // Webinars routes
        Route::resource('webinars', WebinarController::class)->except('show');
        Route::post('webinars/filter', [WebinarController::class, 'filter'])->name('webinars.filter');
    // Webinars routes
});