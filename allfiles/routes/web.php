<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware(['auth', 'is_admin'])->get('/', function () {
        return view('dashboard.index');
    })->name('index');
    Route::resource('settings', SettingController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('products', ProductController::class);
    Route::resource('trainers', TrainerController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('pics', PicController::class);
    Route::resource('testimonials', TestimonialController::class);
});
Route::resource('subscriptions', SubscriptionController::class);

Route::name('site.')->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
    Route::get('/about', [SiteController::class, 'about'])->name('about');
    Route::get('/news', [SiteController::class, 'news'])->name('news');
    Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
    Route::get('/services', [SiteController::class, 'services'])->name('services');
    Route::get('/shop', [SiteController::class, 'shop'])->name('shop');
    Route::get('/courses', [SiteController::class, 'courses'])->name('courses');
    Route::get('/testimonials', [SiteController::class, 'testimonials'])->name('testimonials');
    // Route::get('/createPDF', [SiteController::class, 'createPDF'])->name('createPDF');
    Route::get('lang/{lang}', [LanguageController::class, 'changeLanguage'])->name('lang');
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
    return 'done';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
