<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="styleadmin.css">
    <style>

.logout-btn {
    position: absolute;
    top: 100px;
    right: 20px;

    }

    .btn-logout {
    background-color: #f44336;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}
    .btn-logout:hover {
    background-color: #d32f2f;
}
    .container {
    position: relative;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px; /* Add margin to avoid overlap with the logout button */
}
th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.reservation-button {
    margin-top: 20px;
}
.reservation-button a {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
}
.reservation-button a:hover {
    background-color: #45a049;
}
</style>


</head>
<body>
    <div class="container">
        <h1>Dashboard Admin</h1>
        <p>Data Reservasi tiket tempat wisata</P>
        <div class="logout-btn">
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Reservasi</th>
                    <th>Nama Wisata</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Jumlah Pengunjung</th>
                    <th>Catatan Tambahan</th>
                    <th>Status Reservasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data reservasi akan dimuat di sini menggunakan PHP -->
                <?php
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

                // Query untuk mengambil data reservasi
                $sql = "SELECT * FROM Reservasi";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data untuk setiap baris
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nama_wisata"] . "</td>
                                <td>" . $row["nama_lengkap"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["nomor_telepon"] . "</td>
                                <td>" . $row["tanggal_kunjungan"] . "</td>
                                <td>" . $row["jumlah_pengunjung"] . "</td>
                                <td>" . $row["catatan_tambahan"] . "</td>
                                <td>" . $row["status_reservasi"] . "</td>
                                <td>
                                    <a href='update_reservasi.php?id=" . $row["id"] . "' class='btn update'>Update</a>
                                    <a href='delete_reservasi.php?id=" . $row["id"] . "' class='btn delete' onclick='return confirmDelete()'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data reservasi</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="reservation-button">
        <a href="homepage.html">Kembali ke Website</a>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus reservasi ini?");
        }
    </script>
</body>
</html>
