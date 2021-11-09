<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahannController;
use App\Http\Controllers\DptController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\HomeController;

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
    return view('v_login');
});

Route::get('/register', function () {
    return view('/register');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/index-kecamatan', [KecamatanController::class, 'index'])->name('index-kecamatan');
Route::get('/create-kecamatan', [KecamatanController::class, 'create'])->name('create-kecamatan');
Route::post('/simpan-kecamatan', [KecamatanController::class, 'save'])->name('simpan-kecamatan');
Route::get('/edit-kecamatan/{id}', [KecamatanController::class, 'edit'])->name('edit-kecamatan');
Route::post('/update-kecamatan/{id}', [KecamatanController::class, 'update'])->name('update-kecamatan');
Route::get('/delete-kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('delete-kecamatan');

Route::get('/index-kelurahan', [KelurahannController::class, 'index'])->name('index-kelurahan');
Route::get('/create-kelurahan', [KelurahannController::class, 'create'])->name('create-kelurahan');
Route::post('/simpan-kelurahan', [KelurahannController::class, 'store'])->name('simpan-kelurahan');
Route::get('/edit-kelurahan/{id}', [KelurahannController::class, 'edit'])->name('edit-kelurahan');
Route::post('/update-kelurahan/{id}', [KelurahannController::class, 'update'])->name('update-kelurahan');
Route::get('/delete-kelurahan/{id}', [KelurahannController::class, 'destroy'])->name('delete-kelurahan');

Route::get('/index-dpt', [DptController::class, 'index'])->name('index-dpt');
Route::get('/create-dpt', [DptController::class, 'create'])->name('create-dpt');
Route::post('/simpan-dpt', [DptController::class, 'store'])->name('simpan-dpt');
Route::get('/edit-dpt/{id}', [DptController::class, 'edit'])->name('edit-dpt');
Route::post('/update-dpt/{id}', [DptController::class, 'update'])->name('update-dpt');
Route::get('/delete-dpt/{id}', [DptController::class, 'destroy'])->name('delete-dpt');
Route::get('/download/{file}', [DptController::class, 'download']);
Route::get('/show/{id}', [DptController::class, 'show']);

Route::get('/index-user', [UserController::class, 'index'])->name('index-user');
Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::get('/profile-user', [UserController::class, 'profile'])->name('profile-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('/update-user', [UserController::class, 'update'])->name('update-user');

Route::post('/update-password', [PasswordController::class, 'update'])->name('update-password');

});