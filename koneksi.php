<?php
    $con = mysqli_connect("localhost", "root", "", "visittemanggung");
    
    
    // Periksa Koneksi
    if (mysqli_connect_errno()) {
        echo "Gagal mengkoneksikan ke MySQL: " . mysqli_connect_error();
        exit();
    }
?>