<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\PublicJobListing\JobListingController;



Route::prefix('apply')->group(function () {

    Route::post('/add', [JobListingController::class, 'apply']);  
});



Route::get('/lister', [JobListingController::class, 'index']);   


 