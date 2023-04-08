<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/home', function () {
    return view('welcome');
})->name('home');

require('auth.php');

//Artisan
Route::get('/artisan/{command}', function($command){
    if($command == 'migrate'){
        $output = ['--force' => true];
    }else{
        $output = [];
    }
    Artisan::call($command, $output);
    dd(Artisan::output());
});
