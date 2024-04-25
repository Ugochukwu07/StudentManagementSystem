<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DepartmentController;

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

Route::controller(ClassController::class)->name('class.')->prefix('class')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(ResultController::class)->name('result.')->prefix('result')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add/department/{department_id}', 'addDepartment')->name('add.department');
    Route::get('/add/student/{id}', 'addStudent')->name('add.student');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(ScheduleController::class)->name('schedule.')->prefix('schedule')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/all/{department_id}/{session_id}', 'allBySessionAndDepartment')->name('all.session.department');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');

    Route::prefix('class')->name('class.')->group(function(){
        Route::get('/{id}', 'allByClass')->name('all');
    });
});


Route::controller(AdminController::class)->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', 'all')->name('all');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

    Route::get('/delete/{id}', 'delete')->name('delete');
});

//Department Routes
Route::controller(DepartmentController::class)->name('department.')->prefix('department')->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

    Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
});

//Faculty Routes
Route::controller(FacultyController::class)->name('faculty.')->prefix('faculty')->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/add', 'add')->name('add');
    Route::post('/add/save', 'addSave')->name('add.save');

    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

    Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
});
