<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Warga</title>
</head>
<body>
    <h1>Form Tambah Warga</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/warga">
        @csrf

        <label for="NIK">NIK (16 Digit):</label><br>
        <input type="text" id="NIK" name="NIK" value="{{ old('NIK') }}" required><br><br>

        <label for="Nama">Nama Lengkap:</label><br>
        <input type="text" id="Nama" name="Nama" value="{{ old('Nama') }}" required><br><br>

        <label for="Tanggal_Lahir">Tanggal Lahir:</label><br>
        <input type="date" id="Tanggal_Lahir" name="Tanggal_Lahir" value="{{ old('Tanggal_Lahir') }}"><br><br>

        <label for="Alamat">Alamat:</label><br>
        <textarea id="Alamat" name="Alamat" required>{{ old('Alamat') }}</textarea><br><br>

        <label for="RT">RT:</label><br>
        <input type="text" id="RT" name="RT" value="{{ old('RT') }}" required><br><br>

        <button type="submit">Simpan Warga</button>
    </form>
</body>
</html>
