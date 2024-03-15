<?php

use App\Http\Controllers\Admin\AlbumsController;
use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\Admin\NoticesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscribesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\LoginFacebookController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ToolCacheController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login/facebook', [LoginFacebookController::class, 'redirectToFacebook'])->name('login-facebook');
Route::get('/login/facebook/callback', [LoginFacebookController::class, 'handleFacebookCallback'])->name('callback-facebook');

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('home.category');
Route::get('/new-notice', [HomeController::class, 'newNotice'])->name('home.new-notice');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/tags/{tag}', [HomeController::class, 'tags'])->name('home.tags');
Route::get('/view/{slug}', [HomeController::class, 'notice'])->name('home.notice');
Route::get('/news/{slug}', [HomeController::class, 'news'])->name('home.news');

Route::get('/login', [UsersController::class, 'getLogin'])->name('admin.get-login');
Route::post('/login', [UsersController::class, 'postLogin'])->name('admin.post-login');

Route::get('get-cache/{table}', [ToolCacheController::class, 'getCache']);
Route::get('del-cache/{table}', [ToolCacheController::class, 'delCache']);

Route::get('/user-signup', [HomeController::class, 'signup'])->name('user.get-signup');
Route::get('/user-login', [HomeController::class, 'login'])->name('user.get-login');
Route::get('/user-forgot-password', [HomeController::class, 'forgotPassword'])->name('user.forgot-password');
Route::post('/sendmail-reset-password', [HomeController::class, 'sendMailResetPassword'])->name('user.sendmail-reset-password');
Route::get('/user-reset-password', [HomeController::class, 'resetPassword'])->name('user.reset-password');
Route::post('/user-reset-password', [HomeController::class, 'resetPasswordPost'])->name('user.reset-password-post');
Route::get('/user-logout', [HomeController::class, 'logout'])->name('user.logout');
Route::get('/user-profile', [HomeController::class, 'profile'])->name('user.profile');
Route::post('/user-login', [HomeController::class, 'loginPost'])->name('user.login-post');

Route::get('/providers', [HomeController::class, 'providers'])->name('frontend.providers');
Route::get('/provider/{code}', [HomeController::class, 'detailProvider'])->name('frontend.detail-provider');

Route::get('/photographers', [HomeController::class, 'photographers'])->name('frontend.photographers');
Route::get('/photographer/{code}', [HomeController::class, 'detailPhotographer'])->name('frontend.detail-photographer');

Route::get('/booking', [HomeController::class, 'booking'])->name('frontend.booking');
Route::get('/booking-payment', [HomeController::class, 'bookingPayment'])->name('frontend.booking-payment');
Route::get('/booking-done', [HomeController::class, 'bookingDone'])->name('frontend.booking-done');
Route::get('/active_account', [HomeController::class, 'activeAccount'])->name('frontend.active-account');


Route::group(['prefix' => 'providers', 'namespace' => 'Provider',], function () {
    Route::get('/signup', [ProviderController::class, 'getSignup'])->name('provider.get-signup');
    Route::post('/signup', [ProviderController::class, 'signup'])->name('provider.signup');
    // add middleware
    Route::group([ 'middleware' => 'isProvider'], function () {
       Route::get('/dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
       Route::get('/profile', [ProviderController::class, 'profile'])->name('provider.profile');
    });
});

Route::group(['prefix' => 'users', 'namespace' => 'User',], function () {
    Route::get('/signup', [UserController::class, 'getSignup'])->name('user.get-signup');
    Route::post('/signup', [UserController::class, 'signup'])->name('user.signup');
    // add middleware
});

Route::group(['prefix' => 'customers', 'namespace' => 'Customer', 'middleware' => 'isCustomer'], function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile');
});

Route::group(['middleware' => 'isAdmin'], function () {
    Route::group(['prefix' => 'notice', 'namespace' => 'Notice'], function () {
        Route::get('/list-notice', [NoticesController::class, 'listNotice'])->name('admin.notice.list-notice');
        Route::get('/add-notice/{id?}', [NoticesController::class, 'addNotice'])->name('admin.notice.add-notice');
        Route::post('/save-notice', [NoticesController::class, 'saveNotice'])->name('admin.notice.save-notice');
        Route::get('/delete-notice/{id?}', [NoticesController::class, 'deleteNotice'])->name('admin.notice.delete-notice');

        Route::get('/list-cat-notice/{id?}', [NoticesController::class, 'listCatNotice'])->name('admin.notice.list-cat-notice');
        Route::post('/add-cat-notice', [NoticesController::class, 'addCatNotice'])->name('admin.notice.add-cat-notice');
        Route::get('/delete-cat-notice/{id}', [NoticesController::class, 'deleteCatNotice'])->name('admin.notice.delete-cat-notice');

        Route::get('/list-news', [NoticesController::class, 'listNews'])->name('admin.notice.list-news');
        Route::get('/add-news/{id?}', [NoticesController::class, 'addNews'])->name('admin.notice.add-news');
        Route::post('/save-news', [NoticesController::class, 'saveNews'])->name('admin.notice.save-news');
        Route::get('/delete-news/{id?}', [NoticesController::class, 'deleteNews'])->name('admin.notice.delete-news');
    });
    Route::group(['prefix' => 'setting', 'namespace' => 'Setting'], function () {
        Route::get('/list-menu/{id?}', [SettingsController::class, 'listMenu'])->name('admin.setting.list-menu');
        Route::post('/list-menu', [SettingsController::class, 'saveListMenu'])->name('admin.setting.save-list-menu');
        Route::get('/delete-menu/{id?}', [SettingsController::class, 'deleteMenu'])->name('admin.setting.delete-menu');

        Route::get('/setting-info', [SettingsController::class, 'settingInfo'])->name('admin.setting.setting-info');
        Route::post('/setting-info', [SettingsController::class, 'saveSettingInfo'])->name('admin.setting.save-setting-info');
    });

    Route::group(['prefix' => 'album', 'namespace' => 'album'], function () {
        Route::get('/list-album/{id?}', [AlbumsController::class, 'listAlbum'])->name('admin.album.list-album');
        Route::post('/save-album', [AlbumsController::class, 'saveAlbum'])->name('admin.album.save-album');
        Route::get('/delete-album/{id?}', [AlbumsController::class, 'deleteAlbum'])->name('admin.album.delete-album');

        Route::get('/list-image/{album_id}/{id?}', [AlbumsController::class, 'listImage'])->name('admin.album.list-image');
        Route::post('/save-image', [AlbumsController::class, 'saveImage'])->name('admin.album.save-image');
        Route::get('/delete-image/{album_id}/{id?}', [AlbumsController::class, 'deleteImage'])->name('admin.album.delete-image');

    });

    Route::group(['prefix' => 'subscribe', 'namespace' => 'Subscribe'], function () {
        Route::get('/list-subscribe', [SubscribesController::class, 'listSubscribe'])->name('admin.subscribe.list-subscribe');
    });
    Route::group(['prefix' => 'feedback', 'namespace' => 'feedback'], function () {
        Route::get('/list-feedback/{id?}', [FeedbacksController::class, 'listFeedback'])->name('admin.feedback.list-feedback');
        Route::post('/save-feedback', [FeedbacksController::class, 'saveFeedback'])->name('admin.feedback.save-feedback');
        Route::get('/delete-feedback/{id?}', [FeedbacksController::class, 'deleteFeedback'])->name('admin.feedback.delete-feedback');
    });

    Route::get('/logout', [UsersController::class, 'logout'])->name('admin.logout');
});



