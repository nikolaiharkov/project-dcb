<?php
include "../../database.php";

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

$coldstorage = $_POST['coldstorage'];

$status = 0;

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');

$sql = "SELECT * FROM datacoldstorage WHERE id = '$coldstorage'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$importir = $row['importir'];
$merek = $row['merek'];
$jenisdaging = $row['jenisdaging'];
$qty = $row['qty'];
$hargadasar = $row['hargadasar'];
$hargaaset = $row['hargaaset'];
$operator = $row['operator'];
$foto = $row['foto'];

$jenisproduk = "0";
$qtyhasil = "0";
$berat = "0";
$totalassetfreezer = "0";

$sql = "INSERT INTO tempcoldstorage (tanggalwaktu, importir, merek, jenisdaging, qty, hargadasar, hargaaset, operator, foto, status, jenisproduksi, qtyhasil, berat, totalassetfreezer) VALUES ('$date', '$importir', '$merek', '$jenisdaging', '$qty', '$hargadasar', '$hargaaset', '$operator', '$foto', '$status', '$jenisproduk', '$qtyhasil', '$berat', '$totalassetfreezer')";
$result = mysqli_query($db, $sql);

if($result){
    $sql = "DELETE FROM datacoldstorage WHERE id = '$coldstorage'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "<script>alert('Data berhasil di input'); window.location.href='produksi.php';</script>";
    }
}
