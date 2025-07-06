<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Auth routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('hewan', HewanController::class);
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/export-report',[LaporanController::class,'exportReport'])->name('export.report');

//dash user
Route::get('/dash-user', [UserController::class, 'index'])->name('dashboard-user');

Route::get('/hewan-layak', [HewanController::class, 'getLayak'])->name('hewan.layak');


// Route::delete('/hewan/{id}', [HewanController::class, 'destroy'])->name('hewan.destroy');


