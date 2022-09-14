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
$jenisproduk = "0";
$qtyhasil = "0";
$berat = "0";
$totalassetfreezer = "0";
$operator = $_SESSION['username'];

$foto = $_FILES['foto']['name'];
$ekstensi_diperbolehkan	= array('png','jpg','jpeg','heic');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1000000){
        //insert into tempcoldstorage (tanggalwaktu, importir, merek, jenisdaging, qty, hargadasar, hargaaset, operator, foto, status, jenisproduksi, qtyhasil, berat, totalassetfreezer) VALUES ('$date', '$importir', '$merek', '$jenisdaging', '$qty', '$hargadasar', '$hargaaset', '$operator', '$foto', '$status', '$jenisproduk', '$qtyhasil', '$berat', '$totalassetfreezer')";
        $sql = mysqli_query($db, "INSERT INTO tempcoldstorage (tanggalwaktu, importir, merek, jenisdaging, qty, hargadasar, hargaaset, operator, foto, status, jenisproduksi, qtyhasil, berat, totalassetfreezer) VALUES ('$date', '$importir', '$merek', '$jenisdaging', '$qty', '$hargadasar', '$hargaaset', '$operator', '$foto', '$status', '$jenisproduk', '$qtyhasil', '$berat', '$totalassetfreezer')");
        if($sql){
            move_uploaded_file($file_tmp, '../../assets/img/produksi/'.$nama);
            echo "<script>alert('data berhasil ditambahkan'); window.location.href='produksi.php';</script>";
            $sql = "DELETE FROM datacoldstorage WHERE id = '$coldstorage'";
            $result = mysqli_query($db, $sql);
        }else{
            echo "<script>alert('data gagal ditambahkan'); window.location.href='produksi.php';</script>";
        }
    }else{
        echo "<script>alert('ukuran file terlalu besar'); window.location.href='produksi.php';</script>";
    }
}else{
    echo "<script>alert('ekstensi file tidak diperbolehkan'); window.location.href='produksi.php';</script>";
}