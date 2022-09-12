<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

// take nama
$nama = $_POST['nama'];

//insert data to datamerek
$sql = "INSERT INTO datamerek (nama) VALUES ('$nama')";
if ($db->query($sql) === TRUE) {
    echo "<script>alert('data berhasil ditambahkan'); window.location.href='merek.php';</script>";
} else {
    echo "<script>alert('data gagal ditambahkan'); window.location.href='merek.php';</script>";
}
