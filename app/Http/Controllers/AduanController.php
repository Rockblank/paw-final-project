<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Warga;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    // Tampilkan semua aduan
    public function index()
    {
        $aduans = Aduan::with('warga')->latest()->get();
        return view('aduan.index', compact('aduans'));
    }

    // Form tambah aduan
    public function create()
    {
        $wargas = Warga::all();
        return view('aduan.create', compact('wargas'));
    }

    // Simpan aduan baru
    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'judul' => 'required|string|max:255',
            'isi_aduan' => 'required|string',
            'kategori' => 'required|in:infrastruktur,keamanan,kebersihan,lainnya'
        ]);

        Aduan::create($request->all());

        return redirect()->route('aduan.index')
            ->with('success', 'Aduan berhasil dibuat!');
    }

    // Detail aduan
    public function show(Aduan $aduan)
    {
        return view('aduan.show', compact('aduan'));
    }

    // Form edit aduan (untuk update status & tanggapan)
    public function edit(Aduan $aduan)
    {
        return view('aduan.edit', compact('aduan'));
    }

    // Update aduan (tanggapan & status)
    public function update(Request $request, Aduan $aduan)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai',
            'tanggapan' => 'nullable|string'
        ]);

        $aduan->update($request->only(['status', 'tanggapan']));

        return redirect()->route('aduan.index')
            ->with('success', 'Aduan berhasil diupdate!');
    }

    // Hapus aduan
    public function destroy(Aduan $aduan)
    {
        $aduan->delete();
        return redirect()->route('aduan.index')
            ->with('success', 'Aduan berhasil dihapus!');
    }
}