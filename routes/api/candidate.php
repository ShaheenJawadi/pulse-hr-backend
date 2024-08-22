<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;


Route::get('/lister', [CandidateController::class, 'index']);   

Route::post('/add', [CandidateController::class, 'store']);  

Route::get('/show/{id}', [CandidateController::class, 'show']); 

Route::put('/update/{id}', [CandidateController::class, 'update']); 

Route::delete('/delete/{id}', [CandidateController::class, 'destroy']); 
