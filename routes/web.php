<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index'])->name('index');;
Route::post('/show', [ContactController::class, 'show'])->name('show');;
Route::post('/complete', [ContactController::class, 'send'])->name('send');;

Route::get('/find', [ContactController::class, 'search']);
Route::post('/find', [ContactController::class, 'delete']);