<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// routes/api.php

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController; 
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use App\Http\Controllers\TestController;

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
Route::get('/oauth/authorize', [AuthorizationController::class, 'authorize']); 
Route::delete('/oauth/tokens', [PersonalAccessTokenController::class, 'destroy']);


Route::post('/test/login', [TestController::class, 'login']);


Route::get('/test', function () {
    return 'API is working!';
});
