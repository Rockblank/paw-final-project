<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use App\Models\Warga;
use App\Models\Iuran;

class IuranController extends Controller
{
    // --- TAMBAHAN BARU: Menampilkan Daftar Iuran ---
    public function indexIuran()
    {
        // Ambil data iuran, urutkan dari yang terbaru
        // 'with('warga')' digunakan karena kita butuh menampilkan Nama Warga (bukan cuma NIK)
        $iuranList = Iuran::with('warga')->orderBy('created_at', 'desc')->get();

        return view('iuran.index', compact('iuranList'));
    }

    // --- Iuran Warga (Kode Lama Kamu) ---
    public function createIuran()
    {
        // Ambil daftar NIK dan Nama warga untuk di-dropdown (select option)
        $wargaList = Warga::pluck('Nama', 'NIK');
        return view('iuran.create', compact('wargaList'));
    }

    public function storeIuran(Request $request)
    {
        // ... (Biarkan kode storeIuran kamu yang lama tetap di sini, tidak ada perubahan) ...
        // Validasi data input
        $request->validate([
            'NIK' => 'required|string|size:16|exists:warga,NIK',
            'Periode' => 'required|date',
            'Nominal' => 'required|integer|min:1000',
            'Bukti_Iuran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Upload File
        if ($request->hasFile('Bukti_Iuran')) {
            $filePath = $request->file('Bukti_Iuran')->store('public/bukti_iuran');
            $filePath = str_replace('public/', '', $filePath);
        }

        // Atur Status dan Tanggal Bayar otomatis
        $data = $request->except(['_token', 'Bukti_Iuran']);
        $data['Bukti_Iuran'] = $filePath;
        $data['Status_Bayar'] = 'Lunas';
        $data['Tanggal_Bayar'] = now();

        Iuran::create($data);

        // Ubah redirectnya ke index (daftar) saja biar langsung lihat hasilnya di tabel
        return redirect('/iuran')->with('success', 'Data Iuran berhasil ditambahkan!');
    }
}
