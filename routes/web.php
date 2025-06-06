<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\LaporanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('hewan', HewanController::class);
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/export-report',[LaporanController::class,'exportReport'])->name('export.report');

// Route::delete('/hewan/{id}', [HewanController::class, 'destroy'])->name('hewan.destroy');


