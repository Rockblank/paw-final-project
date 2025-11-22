<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/warga/tambah', [DataController::class, 'createWarga']);
Route::post('/warga', [DataController::class, 'storeWarga']);

Route::get('/iuran/tambah', [DataController::class, 'createIuran']);
Route::post('/iuran', [DataController::class, 'storeIuran']);
