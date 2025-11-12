# 📘 Panduan Pengerjaan Proyek Kelompok

Hai freen! 👋  
Ini panduan tata cara ngerjain projek PAW, tolong dibaca bener bener yaaa,
kalo ada bingung bisa langsung tanya aja di grup

---

## 🧩 Persiapan Awal

### 1. Clone Repository
Clone repository ini terlebih dahulu:
```bash
git clone https://github.com/nama-user/nama-repo.git
```

### 2. Masuk ke Folder Proyek
```bash
cd nama-repo
```

### 3. Install Dependencies
Jalankan perintah berikut untuk menginstal dependency:
```bash
composer install
```

### 4. Setup Environment
Buat file `.env` berdasarkan contoh:
```bash
cp .env.example .env
```
Isi konfigurasi di file `.env` sesuai pengaturan lokal kalian (database, app key, dsb).

### 5. Generate Application Key
Generate application key (jika menggunakan Laravel):
```bash
php artisan key:generate
```

### 6. Migrasi Database
Jalankan migrasi database (jika diperlukan):
```bash
php artisan migrate
```

---

## 🧑‍💻 Alur Pengerjaan

### 1. Buat Branch Baru
Buat branch baru untuk fitur atau perbaikan bug:
```bash
git checkout -b nama-branch
```
**Contoh:** `git checkout -b fitur-login` atau `git checkout -b fix-navbar`

### 2. Commit Perubahan
Setelah selesai coding, lakukan commit:
```bash
git add .
git commit -m "deskripsi singkat perubahan"
```

### 3. Push ke GitHub
Push branch kalian ke GitHub:
```bash
git push origin nama-branch
```

### 4. Buat Pull Request
Buat Pull Request (PR) di GitHub agar perubahan bisa direview sebelum digabung ke branch utama (`main` atau `dev`).

---

## ⚠️ Catatan Penting

- ❌ **Jangan langsung push ke branch `main` tanpa review**
- 🔄 **Selalu pull perubahan terbaru sebelum mulai kerja:**
  ```bash
  git pull origin main
  ```
- 📝 **Gunakan nama branch dan pesan commit yang jelas**
- 💬 **Kalau ada conflict, diskusikan di grup sebelum merge**

---

## 📞 Kontak Tim

Kalau ada error atau setup yang gak jalan, kabari di grup dulu sebelum mengubah struktur proyek utama.

---

**Semangat ngerjainnya, teman-teman! 🚀💪**
