<?php
include '../../database.php';

//get id
$id = $_GET['id'];
//delete data from dataimportir where id = $id
$sql = "DELETE FROM dataimportir WHERE id = $id";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil dihapus'); window.location.href='importir.php';</script>";
}else{
    echo "<script>alert('data gagal dihapus'); window.location.href='importir.php';</script>";
}
?>