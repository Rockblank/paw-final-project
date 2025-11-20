<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Iuran;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // --- Pendataan Warga ---

    public function createWarga()
    {
        // Menampilkan form tambah warga
        return view('warga.create');
    }

    public function storeWarga(Request $request)
    {
        // Validasi data input
        $request->validate([
            'NIK' => 'required|string|size:16|unique:warga,NIK',
            'Nama' => 'required|string|max:100',
            'Tanggal_Lahir' => 'nullable|date',
            'Alamat' => 'required|string',
            'RT' => 'required|string|max:5',
        ]);

        // Menyimpan data ke database
        Warga::create($request->all());

        return redirect('/warga/tambah')->with('success', 'Data Warga berhasil ditambahkan!');
    }

    // --- Iuran Warga ---

    public function createIuran()
    {
        // Ambil daftar NIK dan Nama warga untuk di-dropdown (select option)
        $wargaList = Warga::pluck('Nama', 'NIK');
        return view('iuran.create', compact('wargaList'));
    }

    public function storeIuran(Request $request)
    {
        // Validasi data input
        $request->validate([
            'NIK' => 'required|string|size:16|exists:warga,NIK',
            'Periode' => 'required|date',
            'Nominal' => 'required|integer|min:1000',
            'Bukti_Iuran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Upload File
        if ($request->hasFile('Bukti_Iuran')) {
        // Simpan file di folder storage/app/public/bukti_iuran
        // dan mendapatkan path file (nama unik file)
        $filePath = $request->file('Bukti_Iuran')->store('public/bukti_iuran');

        // Bersihkan string 'public/' agar yang tersimpan di DB hanya path dari 'bukti_iuran/...'
        $filePath = str_replace('public/', '', $filePath);
        }

        // Atur Status dan Tanggal Bayar otomatis
        $data = $request->except(['_token', 'Bukti_Iuran']);
        $data['Bukti_Iuran'] = $filePath;
        $data['Status_Bayar'] = 'Lunas';
        $data['Tanggal_Bayar'] = now();

        // Menyimpan data iuran
        Iuran::create($data);

        return redirect('/iuran/tambah')->with('success', 'Data Iuran dan Bukti Foto berhasil ditambahkan!');
    }
}
