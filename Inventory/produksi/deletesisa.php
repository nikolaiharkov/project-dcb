<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

//get id
$id = $_GET['id'];
$idku = $_GET['idku'];
//delete data from dataimportir where id = $id
$sql = "DELETE FROM sisa WHERE id = $id";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil dihapus'); window.location.href='inputhasilproduksi.php?id=$idku';</script>";
}else{
    echo "<script>alert('data gagal dihapus'); window.location.href='inputhasilproduksi.php?id=$idku';</script>";
}
?>