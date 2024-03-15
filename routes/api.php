<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\SellPointController;

Route::prefix('v1')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('register', [UserController::class, 'register']);
        Route::post('login', [UserController::class, 'login']);

        Route::group(['middleware' => ['jwt.verify']], function() {
            Route::get('logout', [UserController::class, 'logout']);
            Route::get('user_profile', [UserController::class, 'userProfile']);
            Route::post('changePassWord', [UserController::class, 'changePassWord']);
            Route::post('refresh', [UserController::class, 'refresh']);
            Route::post('update_device_token', [UserController::class, 'updateDeviceToken']);
        });
    });

    Route::prefix('setting')->group(function () {
        Route::post('list-region', [SettingController::class, 'listRegion']);
        Route::post('list-car-type', [SettingController::class, 'listCarType']);
        Route::post('list-driver-group', [SettingController::class, 'listDriverGroup']);
    });

    Route::prefix('trip')->group(function () {
        Route::group(['middleware' => ['jwt.verify']], function() {
            Route::post('create', [TripController::class, 'create']);
            Route::post('detail', [TripController::class, 'detail']);
            Route::post('get-list', [TripController::class, 'getList']);
            Route::post('tracking', [TripController::class, 'tracking']);
            Route::post('buy', [TripController::class, 'buy']);
            Route::post('cancel', [TripController::class, 'cancel']);
        });

    });

    Route::prefix('driver')->group(function () {
        Route::group(['middleware' => ['jwt.verify']], function() {
            Route::post('history-buy-trip', [TripController::class, 'historyBuyTrip']);
            Route::post('history-sell-trip', [TripController::class, 'historySellTrip']);
            Route::post('confirm', [TripController::class, 'confirm']);
            Route::post('transaction', [TripController::class, 'transaction']);
        });
    });

    Route::prefix('sell_point')->group(function () {
        Route::group(['middleware' => ['jwt.verify']], function() {
            Route::post('create', [SellPointController::class, 'create']);
            Route::post('buy', [SellPointController::class, 'buy']);
            Route::post('cancel', [SellPointController::class, 'cancel']);
            Route::get('list', [SellPointController::class, 'list']);
        });
    });

    Route::prefix('location')->group(function () {
        Route::group(['middleware' => ['jwt.verify']], function() {
            Route::post('suggest', [LocationController::class, 'suggest']);
        });
    });
});