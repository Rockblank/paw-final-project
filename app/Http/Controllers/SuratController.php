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
            'NIK' => 'required|size:16|exists:warga,NIK',
            'Nama_Lengkap' => 'required|string|max:100',
            'Jenis_Surat' => 'required',
            'Keterangan' => 'nullable|string',
        ], [
            'NIK.required' => 'NIK wajib diisi.',
            'NIK.size' => 'NIK harus terdiri dari 16 digit.',
            'NIK.exists' => 'NIK tidak ditemukan dalam data warga.',
            'Jenis_Surat.required' => 'Silakan pilih jenis surat yang ingin diajukan.',
        ]);

        $warga = Warga::where('NIK', $request->NIK)->first();

        if ($warga->Nama !== $request->Nama_Lengkap) {
            return back()->with('error', 'Nama tidak sesuai dengan NIK yang terdaftar.')->withInput();
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
