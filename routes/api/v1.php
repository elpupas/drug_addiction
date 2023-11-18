<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\api\v1\QuestionController;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('/questions',[QuestionController::class,'questions'] );
Route::post('/answer',[QuestionController::class,'calculateScore']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/', function ($id) {
        
    });
});