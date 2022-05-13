<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/breed', [\App\Http\Controllers\BreedController::class, 'index']);
    Route::post('/breed/update/{id}', [\App\Http\Controllers\BreedController::class, 'update']);
    Route::post('/breed/store', [\App\Http\Controllers\BreedController::class, 'store']);

    Route::put('/user-setting/update/{id}', [\App\Http\Controllers\UserSettingController::class, 'update']);
    Route::get('/user-setting/{id}', [\App\Http\Controllers\UserSettingController::class, 'index']);

    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);
});


//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
