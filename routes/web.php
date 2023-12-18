<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Route::get('/students', [StudentController::class, 'index']);
Route::get('/student/{id}', [StudentController::class, 'show']);

Route::get('/class', [ClassController::class, 'index']);
Route::get('/class/{id}', [ClassController::class, 'show']);

Route::get('/ekskul', [EkskulController::class, 'index']);
Route::get('/ekskul/{id}', [EkskulController::class, 'show']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher/{id}', [TeacherController::class, 'show']);

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

