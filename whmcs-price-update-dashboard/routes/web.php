<?php

use Illuminate\Support\Facades\Route;

//display products route
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);

//update pricing route
Route::put('/update-price/{id}', [\App\Http\Controllers\PricingController::class, 'updatePrice']);
