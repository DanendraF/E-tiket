<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TiketController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


//protected routes
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/payment', [PaymentController::class, 'store']);
    Route::post('/tiket', [TiketController::class, 'store']);
    Route::get('/tiket', [TiketController::class, 'index']);
    Route::get('/payment', [PaymentController::class, 'index']);
    Route::get('/tiket/{tiket}', [TiketController::class, 'show']);
    Route::get('/payment/{payment}', [PaymentController::class, 'show']);
    Route::put('/tiket/{tiket}', [TiketController::class, 'update']);
    Route::put('/payment/{payment}', [PaymentController::class, 'update']);
    Route::delete('/tiket/{tiket}', [TiketController::class, 'destroy']);
    Route::delete('/payment/{payment}', [PaymentController::class, 'destroy']);

});