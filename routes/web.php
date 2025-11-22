<?php

use App\Http\Controllers\DataController;
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
    return view('dashboard.index');
});

// routes untuk persuratan
Route::get('/persuratan', function () {
    // Ambil data dari database 
    $data_permohonan = [
        // Contoh data yang bisa dilewatkan ke view
        // Di sini Anda akan query database
    ];
    return view('surat.index', compact('data_permohonan'));
});
Route::get('/warga/tambah', [DataController::class, 'createWarga']);
Route::post('/warga', [DataController::class, 'storeWarga']);

Route::get('/iuran/tambah', [DataController::class, 'createIuran']);
Route::post('/iuran', [DataController::class, 'storeIuran']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

Route::get('/iuran/tambah', [DataController::class, 'createIuran']);
Route::post('/iuran', [DataController::class, 'storeIuran']);