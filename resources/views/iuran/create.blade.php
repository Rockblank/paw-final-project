@extends('layouts.app')

@section('title', 'Tambah Iuran')

@section('content')

    {{-- Judul Halaman --}}
    <h2 class="page-title">Tambah Iuran Warga</h2>
    <p class="page-subtitle">Silakan input data pembayaran iuran dengan benar</p>

    {{-- Card Form --}}
    <div class="card" style="max-width: 800px; margin: 0 auto;">

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin-left: 20px; margin-bottom: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/iuran" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Pilih Warga (NIK - Nama)</label>
                <select name="NIK" class="form-control" required>
                    <option value="">-- Cari Nama Warga --</option>
                    @if(isset($wargaList))
                        @foreach ($wargaList as $nik => $nama)
                            <option value="{{ $nik }}" {{ old('NIK') == $nik ? 'selected' : '' }}>
                                {{ $nik }} - {{ $nama }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>Periode Iuran</label>
                <input type="date" name="Periode" class="form-control" value="{{ old('Periode') }}" required>
            </div>

            <div class="form-group">
                <label>Nominal (Rp)</label>
                <input type="number" name="Nominal" class="form-control" placeholder="Contoh: 50000" value="{{ old('Nominal') }}" required>
            </div>

            <div class="form-group">
                <label>Bukti Pembayaran (Foto)</label>
                <input type="file" name="Bukti_Iuran" class="form-control" accept="image/*" required>
                <small style="color: #888; display: block; margin-top: 5px;">Format: JPG, PNG, JPEG</small>
            </div>

            <div class="form-group">
                <label>Keterangan (Opsional)</label>
                <textarea name="Keterangan" class="form-control" placeholder="Tambahkan catatan jika perlu...">{{ old('Keterangan') }}</textarea>
            </div>

            <div style="margin-top: 30px; display: flex;">
                <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
                <a href="{{ url('/iuran') }}" class="btn btn-secondary">Batal</a>
            </div>

        </form>
    </div>

@endsection
