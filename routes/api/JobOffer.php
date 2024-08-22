<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobOfferController;

Route::get('/lister', [JobOfferController::class, 'index']);   

Route::post('/add', [JobOfferController::class, 'store']);  

Route::get('/show/{id}', [JobOfferController::class, 'show']); 

Route::put('/update/{id}', [JobOfferController::class, 'update']); 

Route::delete('/delete/{id}', [JobOfferController::class, 'destroy']); 
