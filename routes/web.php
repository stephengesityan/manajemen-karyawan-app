<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;


Route::get('/data-karyawan', [KaryawanController::class, 'index']);
Route::post('/data-karyawan/add', [KaryawanController::class, 'store'])->name('karyawan.add');
Route::post('/data-karyawan/edit/{id}', [KaryawanController::class, 'update'])->name('karyawan.edit');
Route::delete('/data-karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
