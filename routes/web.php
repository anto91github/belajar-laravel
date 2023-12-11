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
    // return view('welcome');
    return view('home', [
        'name' => 'cara fajar', 
        'role' => 'admin',
        'buah' => ['apel', 'jeruk', 'semangka'],
        'pageTitle' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', ['pageTitle' => 'about']);    
});

Route::get('/contact', function () {
    return view('contact', ['name'=> 'Fajar', 'phone' => '0812.....']);   
});

// Route::view('/contact', 'contact', ['name'=> 'Fajar', 'phone' => '0812.....']);

Route::redirect('/here', '/there');

Route::get('/product/{id}', function ($id) {
    // return 'product id = '.$id;
    return view('product.detail', ['id' => $id]);
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'admin-users';
    });

    Route::get('/profile', function () {
        return 'admin-profile';
    });
});

