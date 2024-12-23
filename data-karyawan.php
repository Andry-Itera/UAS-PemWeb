<?php
// Memulai session
session_start(); 

// Menyimpan informasi ke dalam session
if (!isset($_SESSION['page_number'])) {
    $_SESSION['page_number'] = 1; // Halaman pertama
} else {
    $_SESSION['page_number']++; // Increment halaman jika session sudah ada
}

// Tampilkan pemberitahuan error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan Klinik</title>
    <link rel="stylesheet" href="style.css"> <!-- Hubungkan ke file CSS -->
</head>
<body>
    <div class="container data-container">
        <h1>Data Karyawan Klinik Kesehatan Kasih Ibu</h1>
        
        <!-- Informasi session -->
        <p style="text-align: center; font-size: 14px; color: #555;">
            Anda sedang berada di halaman ke: <?php echo $_SESSION['page_number'] ?? 1; ?>
        </p>

        <!-- Tabel data karyawan -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>ID Karyawan</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Browser</th>
                    <th>IP Address</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $servername = "sql208.infinityfree.com";
                $username = "if0_37972173"; 
                $password = "4p8gr2XvQ7h"; 
                $database = "if0_37972173_klinik_db";

                $conn = new mysqli($servername, $username, $password, $database);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("<tr><td colspan='9' style='text-align: center;'>Koneksi gagal: " . $conn->connect_error . "</td></tr>");
                }

                // Ambil data dari tabel
                $sql = "SELECT * FROM karyawan";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($no++) . "</td>
                            <td>" . htmlspecialchars($row['nama']) . "</td>
                            <td>" . htmlspecialchars($row['id_karyawan']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>
                            <td>" . htmlspecialchars($row['jabatan']) . "</td>
                            <td>" . htmlspecialchars($row['browser']) . "</td>
                            <td>" . htmlspecialchars($row['ip']) . "</td>
                            <td>
                                <div class='action-buttons'>
                                    <button class='btn-edit' onclick=\"confirmEdit('" . $row['id_karyawan'] . "')\">Edit</button>
                                    <button class='btn-delete' onclick=\"confirmDelete('" . $row['id_karyawan'] . "')\">Hapus</button>
                                </div>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' style='text-align: center;'>Belum ada data karyawan</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <button onclick="window.location.href='index.html'">Tambah Data Baru</button>
        </div>
    </div>

    <!-- JavaScript untuk konfirmasi -->
    <script>
        function confirmEdit(id) {
            if (confirm("Apakah Anda yakin ingin mengedit data ID Karyawan: " + id + "?")) {
                window.location.href = "edit.php?id_karyawan=" + id;
            }
        }

        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ID Karyawan: " + id + "?")) {
                window.location.href = "delete.php?id_karyawan=" + id;
            }
        }
    </script>
</body>
</html>
