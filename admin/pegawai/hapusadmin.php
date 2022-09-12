<?php
include '../../database.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}
//get id from userpegawai
$id = $_GET['id'];

//delete data from userpegawai where id = $id
$sql = "DELETE FROM useradmin WHERE id = $id";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil dihapus'); window.location.href='index.php';</script>";
}else{
    echo "<script>alert('data gagal dihapus'); window.location.href='index.php';</script>";
}
?>