<?php


use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Web\BlogController as WebBlogController;
use App\Http\Controllers\Web\AboutController as WebAboutController;
use App\Http\Controllers\Web\ApplicantsController;
use App\Http\Controllers\Web\ContactController as WebContactController;
use App\Http\Controllers\Web\DestinationController as WebDestinationController;
use App\Http\Controllers\Web\EmployerController as WebEmployerController;
use App\Http\Controllers\Web\ServiceController as WebServiceController;
use App\Http\Controllers\WebHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [WebHomeController::class, 'index'])->name('web.home');

Route::get('destinations', [WebDestinationController::class, 'index'])->name('web.destination.index');
Route::get('/destination-single/{slug}', [WebDestinationController::class, 'show'])->name('destination.details');
Route::get('/blog', [WebBlogController::class, 'blog'])->name('blogs');
Route::get('/blog-single/{slug}', [WebBlogController::class, 'blogDetail'])->name('blog.details');
Route::get('About-us', [WebAboutController::class, 'index'])->name('web.about.index');
Route::get('Service', [WebServiceController::class, 'index'])->name('web.service.index');
Route::get('applicants', [ApplicantsController::class, 'applicants'])->name('web.applicants.index');
Route::get('find-a-job', [ApplicantsController::class, 'findJob'])->name('web.find-job.index');
Route::get('submit-cv', [ApplicantsController::class, 'submitCv'])->name('web.applicants.submit-cv');
Route::get('career-hub', [ApplicantsController::class, 'careerHub'])->name('web.applicants.career-hub');
Route::get('Employers', [WebEmployerController::class, 'index'])->name('web.employers.index');
Route::get('Contact-us', [WebContactController::class, 'index'])->name('web.contact.index');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth', 'check_user_status']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [LoginController::class, 'profileChange']);
    Route::post('/profile-update', [LoginController::class, 'profileUpdate']);
    Route::post('/profile-data-update', [LoginController::class, 'profileDataUpdate']);
    Route::post('/change-password', [LoginController::class, 'changePassword']);
    // Route::post('/seo/{id}', [SeoController::class, 'update']);

    Route::prefix("admin")->group(function () {

        Route::post('banner-update', [BannerController::class, 'updateBanner'])->name('admin.banner.add');

        Route::group(['prefix' => 'contact'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('contact.index');
            Route::post('update-contact', [ContactController::class, 'updateContact'])->name('admin.contact.add');
            Route::post('update-social', [ContactController::class, 'updateSocial'])->name('admin.social.add');
            Route::get('/get-contact-enquiry', [ContactController::class, 'getContactEnquiry'])->name('get.contact.enquiry');
            Route::get('/get-request-quote', [ContactController::class, 'getRequestQuote'])->name('get.request.quote');
            Route::match(['get', 'post'], 'contact-export', [ContactController::class, 'contactExport'])->name("contacts.export");
            Route::match(['get', 'post'], 'quote-export', [ContactController::class, 'quoteExport'])->name("quote.export");
            Route::post('/delete-enquiry', [ContactController::class, 'deleteContactEnquiry'])->name('contact.enquiry.delete');
            Route::get('/{id}', [ContactController::class, 'getQuoteById'])->name('admin.quote.getbyid');
            Route::post('/delete-quote-request', [ContactController::class, 'deleteQuoteRequest'])->name('quote.request.delete');
        });


        Route::group(['prefix' => 'services'], function () {

            Route::get('/', [ServiceController::class, 'index'])->name('services.index');
            Route::post('update-service', [ServiceController::class, 'updateService'])->name('admin.service.add');
        });
        Route::group(['prefix' => 'destination'], function () {
            Route::get('/', [DestinationController::class, 'index'])->name('destination.index');
            Route::get('create', [DestinationController::class, 'create']);
            Route::post('store', [DestinationController::class, 'store'])->name('admin.destination.add');
            Route::get('edit/{id}', [DestinationController::class, 'edit']);
            Route::get('destination-data', [DestinationController::class, 'getData'])->name('admin.destination.getData');
            Route::post('update', [DestinationController::class, 'update']);
            Route::delete('/{id}', [DestinationController::class, 'destroy'])->name('admin.destination.delete');
            });

            Route::group(['prefix' => 'jobs'], function () {
                Route::get('/', [JobsController::class, 'index'])->name('jobs.index');
                Route::get('create', [JobsController::class, 'create'])->name('jobs.create');
                Route::post('store', [JobsController::class, 'store'])->name('job.store');
                Route::get('job-data', [JobsController::class, 'getData'])->name('admin.job.getData');
                Route::get('edit/{id}', [JobsController::class, 'edit']);
                Route::put('update/{id}', [JobsController::class, 'update'])->name('job.update');
                Route::delete('delete/{id}', [JobsController::class, 'destroy'])->name('delete');



            });

        

        Route::get('/get-delivery-status/{id}', [ContactController::class, 'getDeliveryDetails']);

        Route::group(['prefix' => 'about'], function () {
            Route::get('/', [AboutController::class, 'index'])->name('about.index');
            Route::post('learn-about-us', [AboutController::class, 'addLearnAboutUs'])->name('admin.learn-about-us.add');
            Route::post('counter', [AboutController::class, 'addCounterData'])->name('admin.counter.add');
            Route::post('about-us', [AboutController::class, 'addAboutUs'])->name('admin.about-us.add');
            Route::get('testimonials', [AboutController::class, 'getTestimonial'])->name('admin.about-us.getTestimonial');
            Route::post('add-testimonial', [AboutController::class, 'addTestimonial'])->name('admin.testimonial.add');
            Route::get('/{id}', [AboutController::class, 'getTestimonialById'])->name('admin.testimonial.getbyid');
            Route::delete('/{id}', [AboutController::class, 'deleteTestimonial'])->name('admin.testimonial.delete');
        });

        Route::prefix("blog")->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('blog.index');
            Route::get('create', [BlogController::class, 'create']);
            Route::post('store', [BlogController::class, 'store']);
            Route::get('edit/{id}', [BlogController::class, 'edit']);
            Route::post('update', [BlogController::class, 'update']);
            Route::post('status-change', [BlogController::class, 'changeStatus']);
            Route::get('delete/{id}', [BlogController::class, 'destroy']);

            Route::prefix("category")->group(function () {
                Route::post('create', [BlogController::class, 'storeCategory']);
                Route::get('edit/{id}', [BlogController::class, 'editCategory']);
                Route::post('update/{id}', [BlogController::class, 'updateCategory']);
                Route::post('status-change', [BlogController::class, 'changeStatusCategory']);
                Route::get('delete/{id}', [BlogController::class, 'destroyCategory']);
            });

            Route::prefix("tag")->group(function () {
                Route::post('create', [BlogController::class, 'storeTag']);
                Route::get('edit/{id}', [BlogController::class, 'editTag']);
                Route::post('update/{id}', [BlogController::class, 'updateTag']);
                Route::post('status-change', [BlogController::class, 'changeStatusTag']);
                Route::get('delete/{id}', [BlogController::class, 'destroyTag']);
            });

            Route::get('/blog-comment', [BlogController::class, 'getBlogComment'])->name('get.blog.comment');
            Route::post('/blog-comment-status', [BlogController::class, 'changeCommentStatus'])->name('blog.comment.status');
            Route::post('/blog-comment-delete', [BlogController::class, 'blogCommentDelete'])->name('blog.comment.delete');
        });


        Route::group(['prefix' => 'employer'], function () {
            Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
            Route::post('employer-contact-us', [EmployerController::class, 'addEmployerContactUs'])->name('admin.employer-contact.add');
            Route::post('we-recruit-for', [EmployerController::class, 'addWeRecruitFor'])->name('admin.we-recruit-for.add');
        });

        Route::group(['prefix' => 'home'], function () {
            Route::get('/', [HomeController::class, 'index'])->name('home.index');
            Route::get('getData', [HomeController::class, 'getBannerData'])->name('admin.banner.getData');
            Route::post('banner-add', [HomeController::class, 'addhomeBanner'])->name('admin.home-banner.add');
            Route::post('banner-content-add', [HomeController::class, 'addHomeBannerContent'])->name('admin.home-banner-content.add');
            Route::get('/{id}', [HomeController::class, 'getBannerById'])->name('admin.home-banner.getbyid');
            Route::delete('/{id}', [HomeController::class, 'deleteBanner'])->name('admin.home-banner.delete');
            Route::post('what-we-do', [HomeController::class, 'addWhatWeDo'])->name('admin.what-we-do.add');
            Route::post('about-us', [HomeController::class, 'addAboutUs'])->name('admin.home-about-us.add');
            Route::post('why-choose-us', [HomeController::class, 'addWhyChooseUs'])->name('admin.home-why-choose-us.add');
            Route::post('services', [HomeController::class, 'addService'])->name('admin.home-services.add');
            Route::post('technolagies', [HomeController::class, 'addTechnolagy'])->name('admin.home-technolagy.add');
        });

        Route::prefix("blog")->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('blog.index');
            Route::get('create', [BlogController::class, 'create']);
            Route::post('store', [BlogController::class, 'store']);
            Route::get('edit/{id}', [BlogController::class, 'edit']);
            Route::post('update', [BlogController::class, 'update']);
            Route::post('status-change', [BlogController::class, 'changeStatus']);
            Route::get('delete/{id}', [BlogController::class, 'destroy']);

            Route::prefix("category")->group(function () {
                Route::post('create', [BlogController::class, 'storeCategory']);
                Route::get('edit/{id}', [BlogController::class, 'editCategory']);
                Route::post('update/{id}', [BlogController::class, 'updateCategory']);
                Route::post('status-change', [BlogController::class, 'changeStatusCategory']);
                Route::get('delete/{id}', [BlogController::class, 'destroyCategory']);
            });

            Route::prefix("tag")->group(function () {
                Route::post('create', [BlogController::class, 'storeTag']);
                Route::get('edit/{id}', [BlogController::class, 'editTag']);
                Route::post('update/{id}', [BlogController::class, 'updateTag']);
                Route::post('status-change', [BlogController::class, 'changeStatusTag']);
                Route::get('delete/{id}', [BlogController::class, 'destroyTag']);
            });

            Route::get('/blog-comment', [BlogController::class, 'getBlogComment'])->name('get.blog.comment');
            Route::post('/blog-comment-status', [BlogController::class, 'changeCommentStatus'])->name('blog.comment.status');
            Route::post('/blog-comment-delete', [BlogController::class, 'blogCommentDelete'])->name('blog.comment.delete');
        });

        Route::group(['prefix' => "email-settings"], function () {
            Route::get('/', [EmailSettingController::class, 'index'])->name('email.index');
            Route::get('/getData', [EmailSettingController::class, 'getData'])->name('email.getData');
            Route::get('/{id}', [EmailSettingController::class, 'getMailConf'])->name('email.conf');
            Route::post('', [EmailSettingController::class, 'addEmail'])->name('email.add');
        });
    });
});


Route::post('/request-a-quote', [FormController::class, 'requestAQuote'])->name('request.quote')->middleware('throttle:3,1');
Route::post('/contact-enquiry', [FormController::class, 'contactEnquiry'])->name('contact.enquiry')->middleware('throttle:3,1');
Route::post('/applyNow', [FormController::class, 'applyNow'])->name('applyNow')->middleware('throttle:3,1');
Route::post('/request-a-demo', [FormController::class, 'requestADemo'])->name('requestADemo')->middleware('throttle:3,1');
Route::post('/leave-a-comment', [FormController::class, 'leaveAComment'])->name('leaveAComment');
Route::post("submit-email", [FormController::class, 'submitEmail'])->name('submit.email');
