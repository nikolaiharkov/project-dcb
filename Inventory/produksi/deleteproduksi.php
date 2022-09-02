<?php

include "../../database.php";

//get id
$id = $_GET['id'];

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');

//select from table tempcoldstorage where id
$sql = "SELECT * FROM tempcoldstorage WHERE id = '$id'";
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

//insert into table datacoldstorage
$sql = "INSERT INTO datacoldstorage (tanggalwaktu, importir, merek, jenisdaging, qty, hargadasar, hargaaset, operator, foto) VALUES ('$date', '$importir', '$merek', '$jenisdaging', '$qty', '$hargadasar', '$hargaaset', '$operator', '$foto')";
$result = mysqli_query($db, $sql);
if($result){
    //delete from table tempcoldstorage where id
    $sql = "DELETE FROM tempcoldstorage WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "<script>alert('Data berhasil di input'); window.location.href='produksi.php';</script>";
    }
}