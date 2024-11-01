<?php 

require "koneksi.php";
$nama = htmlspecialchars($_GET['nama']);
$query = mysqli_query($con, "SELECT * FROM destinasi_wisata WHERE nama='$nama'");
$wisata = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Reservasi Wisata</title>
    <link rel="stylesheet" type="text/css" href="stylereservasi.css">

</head>
<body>
    <div class="container">

    <div class="back-button">
        <a href="destinasi-wisata.php">Kembali</a>

        <h1>Formulir Reservasi Wisata</h1>
        <form action="proses_reservasi.php" method="post">
            
            <label for="nama_wisata">Nama Wisata:</label>
            <input type="text" id="nama_wisata" name="nama_wisata" value="<?= htmlspecialchars($wisata['nama']) ?>" readonly>

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="nomor_telepon">Nomor Telepon:</label>
            <input type="text" id="nomor_telepon" name="nomor_telepon" required>

            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
            <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" required>

            <label for="jumlah_pengunjung">Jumlah Pengunjung:</label>
            <input type="number" id="jumlah_pengunjung" name="jumlah_pengunjung" required>

            <label for="catatan_tambahan">Catatan Tambahan:</label>
            <textarea id="catatan" name="catatan_tambahan" rows="4"></textarea>

            <input type="submit" value="Kirim Reservasi">
        </form>
    </div>
</body>
</html>
