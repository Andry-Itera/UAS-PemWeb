<?php
// Tampilkan semua error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Konfigurasi koneksi database menggunakan infinityfree
$servername = "sql208.infinityfree.com";
$username = "if0_37972173"; 
$password = "4p8gr2XvQ7h"; 
$database = "if0_37972173_klinik_db";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'] ?? '';
$id_karyawan = $_POST['id_karyawan'] ?? '';
$email = $_POST['email'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$jabatan = $_POST['jabatan'] ?? '';
$browser = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];

// Validasi sederhana
if (empty($nama) || empty($id_karyawan) || empty($email) || empty($jenis_kelamin) || empty($jabatan)) {
    echo "<script>alert('Semua data wajib diisi!'); window.location.href='index.html';</script>";
    exit;
}

// Simpan data ke database
$stmt = $conn->prepare("INSERT INTO karyawan (nama, id_karyawan, email, jenis_kelamin, jabatan, browser, ip) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    die("Kesalahan pada prepare statement: " . $conn->error);
}

$stmt->bind_param("sssssss", $nama, $id_karyawan, $email, $jenis_kelamin, $jabatan, $browser, $ip);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href='data-karyawan.php';</script>";
} else {
    echo "<script>alert('Terjadi kesalahan saat menyimpan data.'); window.location.href='index.html';</script>";
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
