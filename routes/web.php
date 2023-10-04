<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/process', [UserController::class, 'process']);

//ADMIN
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('admin/home', [UserController::class, 'adminHome'])->name('admin.home');
    Route::post('admin/logout', [AdminController::class, 'logout']);
});

// DOCTOR
Route::middleware(['auth', 'is_doctor'])->group(function () {
    Route::get('doctor/home', [UserController::class, 'doctorHome'])->name('doctor.home');
});

// NURSE
Route::middleware(['auth', 'is_nurse'])->group(function () {
    Route::get('nurse/home', [UserController::class, 'nurseHome'])->name('nurse.home');
});



