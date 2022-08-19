<?php
include '../../database.php';

//get id
$id = $_GET['id'];
//delete data from datamerek where id = $id
$sql = "DELETE FROM datamerek WHERE id = $id";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil dihapus'); window.location.href='merek.php';</script>";
}else{
    echo "<script>alert('data gagal dihapus'); window.location.href='merek.php';</script>";
}
