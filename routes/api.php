<?php

use App\Http\Controllers\api\v1\NewsController;
use App\Http\Controllers\api\v1\OrderController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Support\Facades\Route;

/*
 * User Routes
 */

Route::post('register', [UserController::class, 'register']); //Register
Route::post('login', [UserController::class, 'login']); //Login

/*
 * Order Routes
 */

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('orders', [OrderController::class, 'store']); //Add order
    Route::get('orders', [OrderController::class, 'index']); //Get all orders
});

/*
 * News Routes
 */

Route::get('news', [NewsController::class, 'index']); //Get all news
