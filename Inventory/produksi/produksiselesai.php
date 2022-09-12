<?php
include "../../database.php";

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

$status = 1;
//get id
$id = $_GET['id'];

$sql = "UPDATE tempcoldstorage SET status = '$status' WHERE id = '$id'";
$result = mysqli_query($db, $sql);
if($result){
    echo "<script>alert('Data berhasil di update'); window.location.href='produksi.php';</script>";
}else{
    echo "<script>alert('Data gagal, ada kesalahan'); window.location.href='produksi.php';</script>";
}
