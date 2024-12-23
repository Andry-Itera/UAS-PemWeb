# Website Klinik Kesehatan Kasih Ibu

## Deskripsi Proyek
Website ini adalah sistem manajemen data karyawan untuk Klinik Kesehatan Kasih Ibu. Aplikasi web ini memungkinkan pengguna untuk:
1. Menambah data karyawan melalui form registrasi.
2. Melihat data karyawan dalam tabel yang responsif.
3. Mengedit dan menghapus data karyawan.
4. Mengelola data dengan menggunakan fitur pencatatan di database MySQL.

## Struktur File
Berikut adalah struktur file proyek beserta penjelasannya:

### 1. `index.html`
File ini adalah halaman utama untuk registrasi karyawan baru.
- **Fitur Utama:**
  - Form registrasi dengan validasi input untuk nama lengkap, ID karyawan, email, jenis kelamin, password, konfirmasi password, dan jabatan.
  - Mengirim data menggunakan metode `POST` ke file `registrasi.php`.
  - Menyertakan validasi form menggunakan JavaScript di `script.js`.
- **File Terkait:**
  - `script.js`: Validasi input form sebelum data dikirim.
  - `style.css`: Menyediakan desain responsif dan modern untuk form registrasi.

### 2. `registrasi.php`
File ini menangani penyimpanan data dari form registrasi ke database.
- **Fitur Utama:**
  - Memvalidasi data di server-side sebelum menyimpannya ke database.
  - Menambahkan data ke tabel `karyawan` di database MySQL.
  - Memberikan notifikasi berhasil atau gagal pada saat proses penyimpanan.

### 3. `data-karyawan.php`
File ini adalah halaman untuk menampilkan data karyawan dalam bentuk tabel.
- **Fitur Utama:**
  - Menampilkan data karyawan yang disimpan di database.
  - Menyediakan kolom aksi yang berupa tombol edit & hapus berfungsi untuk mengedit dan menghapus data.
  - Menggunakan JavaScript untuk konfirmasi sebelum melakukan aksi edit atau hapus.
- **File Terkait:**
  - `edit.php`: Untuk mengedit data karyawan.
  - `delete.php`: Untuk menghapus data karyawan.
  - `style.css`: Mengatur tampilan tabel agar responsif dan modern.

### 4. `edit.php`
File ini digunakan untuk menampilkan halaman saat mengedit data karyawan.
- **Fitur Utama:**
  - Memuat data lama dari database untuk diedit dan terupdate sesuai inputan.
  - Memvalidasi dan memperbarui data di database.
  - Memberikan notifikasi berhasil atau gagal pada proses pembaruan.

### 5. `delete.php`
File ini menangani penghapusan data karyawan.
- **Fitur Utama:**
  - Menghapus data karyawan berdasarkan `id_karyawan` yang diterima dari parameter URL.
  - Memberikan notifikasi berhasil atau gagal proses penghapusan.

### 6. `style.css`
File ini mengatur tampilan website agar modern, responsif, dan user-friendly.
- **Fitur Utama:**
  - Desain form yang terorganisasi dan mudah digunakan di semua perangkat.
  - Tabel data yang responsif dan estetik dengan warna hijau segar sesuai tema klinik kesehatan.
  - Tombol aksi (Edit dan Hapus) dengan desain user-friendly menggunakan warna biru dan merah.

### 7. `script.js`
File ini mengatur validasi form di sisi client untuk halaman `index.html`.
- **Fitur Utama:**
  - Validasi format input seperti nama lengkap, ID karyawan, email, dan password.
  - Menampilkan pesan kesalahan jika input tidak valid.

### 8. `database.sql`
File ini adalah skrip SQL untuk membuat tabel `karyawan` di database.
- **Struktur Tabel:**
  - `id_karyawan` (Primary Key, unik)
  - `nama`
  - `email`
  - `jenis_kelamin`
  - `jabatan`
  - `browser`
  - `ip`

## Fitur Tambahan
1. **Validasi Input**:
   - Menggunakan JavaScript dan PHP untuk memastikan data yang dimasukkan valid.
2. **Keamanan**:
   - Menerapkan HTTPS untuk keamanan data pengguna.

## Cara Menggunakan Aplikasi
1. **Setup Database**:
   - Impor file `database.sql` ke database MySQL Anda.
2. **Unggah File ke Server**:
   - Unggah semua file ke folder `htdocs` pada server.
3. **Akses Website**:
   - Buka `index.html` di browser untuk memulai registrasi karyawan.
4. **Manajemen Data**:
   - Gunakan halaman `data-karyawan.php` untuk melihat, mengedit, atau menghapus data karyawan.
