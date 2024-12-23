<?php
// Tampilkan semua error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database infinityfree
    $conn = new mysqli("sql208.infinityfree.com", "if0_37972173", "4p8gr2XvQ7h", "if0_37972173_klinik_db");

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id_karyawan = $_POST['id_karyawan'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $sql = "UPDATE karyawan SET nama=?, jabatan=? WHERE id_karyawan=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama, $jabatan, $id_karyawan);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='data-karyawan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupdate data!'); window.location.href='data-karyawan.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    // Menampilkan form edit
    $id_karyawan = $_GET['id_karyawan'] ?? '';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Data Karyawan</title>
        <link rel="stylesheet" href="style.css"> <!-- Hubungkan ke file style.css -->
    </head>
    <body>
        <div class="container edit-container">
            <h1>Edit Data Karyawan</h1>
            <form action="edit.php" method="POST">
                <input type="hidden" name="id_karyawan" value="<?php echo htmlspecialchars($id_karyawan); ?>">
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan:</label>
                    <input type="text" id="jabatan" name="jabatan" required placeholder="Masukkan Jabatan">
                </div>
                <button type="submit" class="btn">Simpan Perubahan</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
