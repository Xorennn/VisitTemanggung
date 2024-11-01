<?php 

require "koneksi.php";

if ($stmt = $con->prepare('INSERT INTO reservasi (nama_wisata, nama_lengkap, email, nomor_telepon, tanggal_kunjungan, jumlah_pengunjung, catatan_tambahan)
                            VALUES (?, ?, ?, ?, ?, ?, ?)')) {
    $stmt->bind_param('sssssis', $_POST['nama_wisata'], $_POST['nama_lengkap'],$_POST['email'], $_POST['nomor_telepon'], $_POST['tanggal_kunjungan'], $_POST['jumlah_pengunjung'], $_POST['catatan_tambahan']);
    $stmt->execute();
    echo "Data berhasil disimpan";
    $stmt->close();
} else {
    echo 'Terjadi Kesalahan';
}

?>