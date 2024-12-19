<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


// RUTAS LANGUAGES Y CATEGORIES
Route::resource('languages', LanguageController::class);
Route::resource('categories', CategoryController::class);
