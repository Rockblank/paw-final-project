<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::get('/warga/tambah', [DataController::class, 'createWarga']);
Route::post('/warga', [DataController::class, 'storeWarga']);

Route::get('/iuran/tambah', [DataController::class, 'createIuran']);
Route::post('/iuran', [DataController::class, 'storeIuran']);

Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');

