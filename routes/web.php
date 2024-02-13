<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ListProvinsiController;

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
        //'name' => 'cara fajar', 
        //'role' => 'admin',
        'buah' => ['apel', 'jeruk', 'semangka'],
        'pageTitle' => 'home'
    ]);
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-add', [StudentController::class, 'create'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware(['auth','must-admin-or-teacher']);
Route::post('/student', [StudentController::class, 'store'])->middleware(['auth','must-admin-or-teacher']);
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware(['auth','must-admin-or-teacher']);
Route::get('/student-delete/{id}', [StudentController::class, 'delete'])->middleware(['auth','must-admin']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])->middleware(['auth','must-admin']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware(['auth','must-admin']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware(['auth','must-admin']);
Route::get('/student-mass-update',[StudentController::class,'massUpdate']);

Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'show'])->middleware('auth');

Route::get('/ekskul', [EkskulController::class, 'index'])->middleware('auth');
Route::get('/ekskul/{id}', [EkskulController::class, 'show'])->middleware('auth');

Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware('auth');

Route::get('/list-provinsi', [ListProvinsiController::class, 'index'])->middleware('auth');
Route::get('/cek-ongkir', [OngkirController::class, 'index'])->middleware('auth');
Route::post('/cek-ongkir', [OngkirController::class, 'cekOngkir'])->middleware('auth');
Route::get('/test-update', [OngkirController::class, 'testUpdate'])->middleware('auth');
Route::get('/test-delete', [OngkirController::class, 'testDelete'])->middleware('auth');
Route::get('/test-signIn', [OngkirController::class, 'testSignIn'])->middleware('auth');

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

