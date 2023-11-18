<?php

use App\Http\Controllers\API\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/', function ($id) {
        
    });
});