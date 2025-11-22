<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Halaman daftar surat (tampilan tabel)
Route::get('/persuratan', [SuratController::class, 'index'])->name('persuratan.index');

// Form pengajuan surat
Route::get('/persuratan/pengajuan', [SuratController::class, 'create'])->name('persuratan.create');

// Submit pengajuan surat ke database
Route::post('/persuratan/pengajuan', [SuratController::class, 'store'])->name('persuratan.store');

Route::get('/warga/tambah', [DataController::class, 'createWarga']);
Route::post('/warga', [DataController::class, 'storeWarga']);

Route::get('/iuran/tambah', [DataController::class, 'createIuran']);
Route::post('/iuran', [DataController::class, 'storeIuran']);

Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');

