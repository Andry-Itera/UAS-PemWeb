<?php
// Aktifkan debugging 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database menggunakan infinityfree
$servername = "sql208.infinityfree.com";
$username = "if0_37972173"; 
$password = "4p8gr2XvQ7h"; 
$database = "if0_37972173_klinik_db"; 

$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah parameter 'id_karyawan' ada di URL
if (isset($_GET['id_karyawan'])) {
    $id_karyawan = $conn->real_escape_string($_GET['id_karyawan']);

    // Query untuk menghapus data
    $sql = "DELETE FROM karyawan WHERE id_karyawan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_karyawan);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman data-karyawan.php setelah berhasil
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'data-karyawan.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data.');
            window.location.href = 'data-karyawan.php';
        </script>";
    }

    $stmt->close();
} else {
    echo "<script>
        alert('ID Karyawan tidak ditemukan.');
        window.location.href = 'data-karyawan.php';
    </script>";
}

$conn->close();
?>
