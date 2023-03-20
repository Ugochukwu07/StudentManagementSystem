<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {;
        Route::get('/register', 'register')->name('register');
        Route::post('/register/save', 'registerSave')->name('register.save');

        Route::get('/login', 'login')->name('login');
        Route::post('/login/save', 'loginSave')->name('login.save');
    });
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


