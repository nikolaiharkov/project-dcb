<?php

include '../../database.php';

//get id
$id = $_GET['id'];
$idku = $_GET['idku'];
//delete data from dataimportir where id = $id
$sql = "DELETE FROM temphasilproduksi WHERE id = $id";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil dihapus'); window.location.href='inputhasilproduksi.php?id=$idku';</script>";
}else{
    echo "<script>alert('data gagal dihapus'); window.location.href='inputhasilproduksi.php?id=$idku';</script>";
}