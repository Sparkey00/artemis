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

    Route::prefix('breed')->group(function () {
        Route::get('/', [\App\Http\Controllers\BreedController::class, 'index']);
        Route::post('/update/{id}', [\App\Http\Controllers\BreedController::class, 'update']);
        Route::post('/store', [\App\Http\Controllers\BreedController::class, 'store']);
    });

    Route::prefix('subscription')->group(function () {
        Route::get('/', [\App\Http\Controllers\SubscriptionController::class, 'index']);
    });

    Route::prefix('chat')->group(function () {
        Route::get('/', [\App\Http\Controllers\ChatController::class, 'index']);
    });
    Route::prefix('chat-message')->group(function () {
        Route::post('/create', [\App\Http\Controllers\ChatMessageController::class, 'create']);
    });

    Route::put('/user-setting/update/{id}', [\App\Http\Controllers\UserSettingController::class, 'update']);
    Route::get('/user-setting/{id}', [\App\Http\Controllers\UserSettingController::class, 'index']);

    Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/like/{likedUserId}', [\App\Http\Controllers\UserController::class, 'like']);

    Route::post('/logout', [AuthController::class, 'logout']);
});


//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
