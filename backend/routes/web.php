<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'test']);
Route::get('/test-db', [TestController::class, 'testDb']);
Route::get('/test-read', [TestController::class, 'testRead']);
