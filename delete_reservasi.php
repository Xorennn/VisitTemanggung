<?php 
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
include 'koneksi.php';

$id = $_GET['id'];

$result = mysqli_query($con, "DELETE FROM reservasi WHERE id=$id");

//Redirect kembali ke dashboard admin
header("location:dasbordadmin.php");
?>