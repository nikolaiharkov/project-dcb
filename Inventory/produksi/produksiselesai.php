<?php
include "../../database.php";

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
