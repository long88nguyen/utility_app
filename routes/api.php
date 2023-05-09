<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[\App\Http\Controllers\AuthController::class,'login']);
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register']);
Route::get('/send-mail',[\App\Http\Controllers\SendMailController::class,'sendMail']);
Route::post('/reset-password', [\App\Http\Controllers\AuthController::class, 'resetPassword']);
Route::post('/change-password', [\App\Http\Controllers\AuthController::class, 'changePassword']);
Route::get('/verify-reset-request', [\App\Http\Controllers\AuthController::class, 'verifyResetPasswordRequest']);
Route::group(['middleware' => 'auth:api'], function () {
    
});

Route::resource('member', App\Http\Controllers\Api\MemberController::class);

