<?php
include "../../database.php";

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

$status = 1;
//get id
$id = $_GET['id'];
$operator = $_SESSION['username'];
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');


$sql = "UPDATE produksi SET status = '$status', operator = '$operator', tanggalwaktu = '$date' WHERE id = $id";
$result = mysqli_query($db, $sql);
if($result){
    echo "<script>alert('Data berhasil di update'); window.location.href='produksi.php';</script>";
}else{
    echo "<script>alert('Data gagal, ada kesalahan'); window.location.href='produksi.php';</script>";
}
