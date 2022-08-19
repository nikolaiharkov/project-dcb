<?php
include '../../database.php';

//take namaimportir
$namaimportir = $_POST['namajenisdaging'];

//create data to table data importir
$sql = "INSERT INTO datajenisdaging (nama) VALUES ('$namaimportir')";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil ditambahkan'); window.location.href='jenis_daging.php';</script>";
}else{
    echo "<script>alert('data gagal ditambahkan'); window.location.href='jenis_daging.php';</script>";
}
?>