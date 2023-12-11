<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return (6*9);    
});

Route::get('/contact', function () {
    return view('contact', ['name'=> 'Fajar', 'phone' => '0812.....']);   
});

// Route::view('/contact', 'contact', ['name'=> 'Fajar', 'phone' => '0812.....']);