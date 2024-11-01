<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visittemanggung";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah parameter id telah diterima
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk mengambil data reservasi dengan id tertentu
    $sql = "SELECT * FROM Reservasi WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Data reservasi ditemukan, tampilkan formulir update
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Reservasi</title>
    <link rel="stylesheet" type="text/css" href="stylereservasi.css">
</head>
<body>
    <div class="container">
        <h1>Update Reservasi</h1>
        <form action="proses_update_reservasi.php" method="POST">
            <!-- Gunakan hidden input untuk menyimpan id reservasi -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nama_wisata">Nama Wisata:</label><br>
            <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo $row['nama_wisata']; ?>"><br>
            <label for="nama_lengkap">Nama Lengkap:</label><br>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
            <label for="nomor_telepon">Nomor Telepon:</label><br>
            <input type="text" id="nomor_telepon" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>"><br>
            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label><br>
            <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" value="<?php echo $row['tanggal_kunjungan']; ?>"><br>
            <label for="jumlah_pengunjung">Jumlah Pengunjung:</label><br>
            <input type="number" id="jumlah_pengunjung" name="jumlah_pengunjung" value="<?php echo $row['jumlah_pengunjung']; ?>"><br>
            <label for="catatan_tambahan">Catatan Tambahan:</label><br>
            <textarea id="catatan_tambahan" name="catatan_tambahan"><?php echo $row['catatan_tambahan']; ?></textarea><br><br>
            
            <label for="status_reservasi">Ubah Status Reservasi :</label>

            <select name="status_reservasi" id="status_reservasi">
                <option value="Pending">Pending</option>
                <option value="Dikonfirmasi">Dikonfirmasi</option>
                <option value="Ditolak">Ditolak</option>
            </select>
            
            <input type="submit" value="Update" class="btn">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        echo "Data reservasi tidak ditemukan.";
    }
} else {
    echo "Parameter id tidak diterima.";
}

$conn->close();
?>