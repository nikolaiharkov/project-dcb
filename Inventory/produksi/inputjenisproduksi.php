<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}
//take namaimportir
$namaimportir = $_POST['nama'];

//create data to table data importir
$sql = "INSERT INTO jenisproduksi (nama) VALUES ('$namaimportir')";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil ditambahkan'); window.location.href='jenis_produksi.php';</script>";
}else{
    echo "<script>alert('data gagal ditambahkan'); window.location.href='jenis_produksi.php';</script>";
}
?>