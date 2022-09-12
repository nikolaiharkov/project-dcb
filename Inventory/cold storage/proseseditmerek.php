<?php
include '../../database.php';

// take nama
$nama = $_POST['nama'];

//take id
$id = $_POST['id'];

//update name by id to dataimportir
$sql = "UPDATE datamerek SET nama = '$nama' WHERE id = $id";
if ($db->query($sql) === TRUE) {
    echo "<script>alert('data berhasil diubah'); window.location.href='merek.php';</script>";
} else {
    echo "<script>alert('data gagal diubah'); window.location.href='merek.php';</script>";
}
