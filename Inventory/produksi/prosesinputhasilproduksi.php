<?php
include "../../database.php";

//take post from jenisproduksi, qty, berat
$jenisproduksi = $_POST['jenisproduksi'];
$qty = $_POST['qty'];
$berat = $_POST['berat'];
$id = $_POST['idku'];

//if there is found any coma in berat, replace it with dot
$berat = str_replace(",", ".", $berat);

//insert into table temphasilproduksi
$sql = "INSERT INTO temphasilproduksi (jenisproduksi, qty, berat) VALUES ('$jenisproduksi', '$qty', '$berat')";
$result = mysqli_query($db, $sql);
//show message "Data berhasil disimpan" if success
if ($result) {
    echo "<script>alert('Data berhasil disimpan'); window.location = 'inputhasilproduksi.php?id=$id';</script>";
} else {
    echo "<script>alert('Data gagal disimpan'); window.location = 'inputhasilproduksi.php?id=$id';</script>";
}
