<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body {
        font-family: Arial;
        margin: 0;
    }

    /* Header */
    header {
        background: #111;
        padding: 14px ;
    }

    header h1 {
        color: white;
        font-size: 16px;
    }

        /* Container utama */
    .container {
        margin: 60px;
        text-align: center;
    }

    /* Judul utama */
    .hero-title {
        font-size: 26px;
        font-weight: bold;
        color: #0A7968;
    }

    .hero-desc {
        margin: 0 auto 40px auto;
        max-width: 650px;
        font-size: 15px;
    }

    /* Card layout */
    .cards-row {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    /* Card */
    .card {
        padding: 20px;
        width: 260px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        text-align: left;
        cursor: pointer;
    }

    .card h3 {
        color: #0A7968;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .card p {
        color: #555;
        font-size: 14px;
        line-height: 1.4;
    }



</style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>HOME</h1>
    </header>

    <!-- Konten utama -->
    <div class="container">

        <h2 class="hero-title">Selamat Datang di Aplikasi RT PEMWEB D</h2>
        <p class="hero-desc">
            Dashboard utama untuk mengelola data warga, iuran, aduan, persuratan, dan pengumuman RT secara terpadu dan efisien.
        </p>

        <!-- Baris 1 -->
        <div class="cards-row">
            
                <div class="card" onclick="window.location.href='warga/tambah'">
                <h3>Pendataan Warga</h3>
                <p>Kelola data kependudukan warga RT dengan sistem yang terorganisir dan mudah diakses.</p>
            </div>

            <div class="card">
                <h3>Iuran Warga</h3>
                <p>Pantau dan kelola pembayaran iuran bulanan warga dengan transparansi penuh.</p>
            </div>

            <div class="card">
                <h3>Aduan Warga</h3>
                <p>Terima dan tindaklanjuti aduan warga untuk meningkatkan kualitas lingkungan RT.</p>
            </div>
        </div>

        <!-- Baris 2 -->
        <div class="cards-row">
            <div class="card" onclick="window.location.href='persuratan'">
                <h3>Persuratan</h3> 
                <p>Buat dan kelola surat menyurat RT seperti surat keterangan dan dokumen resmi lainnya.</p>
            </div>

            <div class="card">
                <h3>Pengumuman Warga</h3>
                <p>Publikasikan informasi penting dan pengumuman untuk seluruh warga RT.</p>
            </div>
        </div>

    </div>

</body>
</html>
