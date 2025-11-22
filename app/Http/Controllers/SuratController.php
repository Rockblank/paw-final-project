<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Warga;

class SuratController extends Controller
{
    public function index()
    {
        $surat = Surat::all();
        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required|size:16',
            'Nama_Lengkap' => 'required|string|max:100',
            'Jenis_Surat' => 'required',
            'Keterangan' => 'nullable|string',
        ]);

        // cek apakah nik ada di tabel warga
        if (!Warga::where('NIK', $request->NIK)->exists()) {
            return back()->with('error', 'NIK tidak ditemukan dalam data warga.');
        }

        // cek apakah nik sudah mengajukan surat sebelumnya
        if (Surat::where('NIK', $request->NIK)->exists()) {
            return back()->with('error', 'Kamu sudah mengajukan surat sebelumnya.');
        }

        Surat::create([
            'NIK' => $request->NIK,
            'Nama_Lengkap' => $request->Nama_Lengkap,
            'Jenis_Surat' => $request->Jenis_Surat,
            'Keterangan' => $request->Keterangan,
            'Tanggal_Pengajuan' => now(),
        ]);

        return redirect()->route('surat.index')->with('success', 'Pengajuan surat berhasil direkam!');
    }
}
