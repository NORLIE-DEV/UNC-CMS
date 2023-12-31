<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\DoctorController;

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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/process', [UserController::class, 'process']);

//ADMIN
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('admin/home', [UserController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/account', [UserController::class, 'adminUserAccount']);
    Route::post('/store', [AdminController::class, 'store'])->name('store.data');
    Route::post('/email_available/check', [AdminController::class,'check'])->name('email_available.check');

    Route::get('/users-update/{id}', [UserController::class, 'findID']);
    Route::get('/user-search', [UserController::class, 'search']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);

    Route::post('admin/logout', [AdminController::class, 'logout']);
});

// DOCTOR
Route::middleware(['auth', 'is_doctor'])->group(function () {
    Route::get('doctor/home', [UserController::class, 'doctorHome'])->name('doctor.home');
    Route::post('doctor/logout', [DoctorController::class, 'logout']);
});

// NURSE
Route::middleware(['auth', 'is_nurse'])->group(function () {
    Route::get('nurse/home', [UserController::class, 'nurseHome'])->name('nurse.home');
    Route::post('nurse/logout', [NurseController::class, 'logout']);
});
