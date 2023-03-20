<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\Office\FacultyController;

Route::controller(MainController::class)->group(function(){
    Route::get('/', 'overview')->name('overview');

    Route::get('/profile', 'profile')->name('profile');
    Route::post('/profile/save', 'profileSave')->name('profile.save');
});

Route::controller(SessionController::class)->name('session.')->prefix('session')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(StudentController::class)->name('student.')->prefix('student')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(ResultController::class)->name('result.')->prefix('result')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(ScheduleController::class)->name('schedule.')->prefix('schedule')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

//Department Routes
Route::controller(DepartmentController::class)->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

    Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
});

//Faculty Routes
Route::controller(FacultyController::class)->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

    Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
});
