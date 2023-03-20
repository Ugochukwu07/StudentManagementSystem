<?php

use App\Http\Controllers\Student\MainController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::controller(MainController::class)->group(function(){
    Route::get('/', 'overview')->name('overview');

    Route::get('/profile', 'profile')->name('profile');
    Route::post('/profile/save/{id}', 'profileSave')->name('profile.save');

    Route::get('/account', 'account')->name('account');
    Route::post('/account/save/{id}', 'accountSave')->name('account.save');
});

Route::controller(ScheduleController::class)->name('schedule.')->prefix('schedule')->group(function(){
    Route::get('/', 'schedules')->name('view');
    Route::get('/{id}', 'details')->name('details');
});

Route::controller(ResultController::class)->name('result.')->prefix('result')->group(function(){
    Route::get('/', 'select')->name('select');
    Route::get('/save', 'selectSave')->name('select.save');

    Route::get('/', 'results')->name('view');
    Route::get('/{id}', 'details')->name('details');
});
