<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

include 'koneksi.php';

// Memeriksa apakah data dari formulir telah diterima
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai-nilai dari formulir
    $id = $_POST['id'];
    $nama_wisata = $_POST['nama_wisata'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $jumlah_pengunjung = $_POST['jumlah_pengunjung'];
    $catatan_tambahan = $_POST['catatan_tambahan'];
    $status_reservasi = $_POST['status_reservasi'];

    // Statement SQL untuk melakukan update
    $sql = "UPDATE Reservasi SET 
            nama_wisata='$nama_wisata',
            nama_lengkap='$nama_lengkap',
            email='$email',
            nomor_telepon='$nomor_telepon',
            tanggal_kunjungan='$tanggal_kunjungan',
            jumlah_pengunjung='$jumlah_pengunjung',
            catatan_tambahan='$catatan_tambahan',
            status_reservasi='$status_reservasi'
            WHERE id='$id'";

    // Mengeksekusi statement SQL
    if ($con->query($sql) === TRUE) {
        // Jika berhasil diupdate, redirect ke halaman dashboard admin
        header('Location: dasbordadmin.php');
        exit;
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>