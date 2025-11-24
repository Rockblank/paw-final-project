@extends('layouts.app')

@section('title', 'Tambah Data Warga')

@section('content')
    <!-- Judul Halaman -->
    <h1 class="page-title">Form Tambah Warga</h1>
    <p class="page-subtitle">Silakan lengkapi data di bawah ini dengan benar</p>

    <!-- Alert Sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Alert Error Validasi -->
    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="list-style-type: disc; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card Form -->
    <div class="card">
        <form method="POST" action="/warga">
            @csrf

            <!-- Input NIK -->
            <div class="form-group">
                <label for="NIK">NIK (16 Digit)</label>
                <input type="text" 
                       id="NIK" 
                       name="NIK" 
                       class="form-control" 
                       value="{{ old('NIK') }}" 
                       placeholder="Masukkan 16 digit NIK"
                       required>
            </div>

            <!-- Input Nama -->
            <div class="form-group">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" 
                       id="Nama" 
                       name="Nama" 
                       class="form-control" 
                       value="{{ old('Nama') }}" 
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

            <!-- Input Tanggal Lahir -->
            <div class="form-group">
                <label for="Tanggal_Lahir">Tanggal Lahir</label>
                <input type="date" 
                       id="Tanggal_Lahir" 
                       name="Tanggal_Lahir" 
                       class="form-control" 
                       value="{{ old('Tanggal_Lahir') }}">
            </div>

            <!-- Input Alamat -->
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea id="Alamat" 
                          name="Alamat" 
                          class="form-control" 
                          placeholder="Masukkan alamat lengkap"
                          required>{{ old('Alamat') }}</textarea>
            </div>

            <!-- Input RT -->
            <div class="form-group">
                <label for="RT">RT</label>
                <input type="text" 
                       id="RT" 
                       name="RT" 
                       class="form-control" 
                       value="{{ old('RT') }}" 
                       placeholder="Contoh: 005"
                       required>
            </div>

            <!-- Tombol Aksi -->
            <div class="action-buttons" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">Simpan Warga</button>
                <a href="/warga" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection