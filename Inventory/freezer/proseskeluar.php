<?php
include "../../database.php";
//session
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

//take item, pcs, keterangan
//get jenisproduksi
//get berat

$jenisproduksi = $_POST['jenisproduksi'];
$berat = $_POST['berat'];
// change coma to dot in berat
$berat = str_replace(',', '.', $berat);
$pcs = $_POST['pcs'];
$keterangan = $_POST['keterangan'];
$modal = $_POST['modal'];

//modal = modal * pcs
$modal = $modal * $pcs;

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');
//file from post

//operator = session username
$operator = $_SESSION['username'];

//get data from table freezerstorage
$sql = "SELECT * FROM freezerstorage";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
//get jenisproduksi, berat, qty
$jenisproduksifreezer = $row['jenisproduksi'];
$beratfreezer = $row['berat'];
$qtyfreezer = $row['qty'];

//if jenisproduksi and berat have same value with jenisproduksi and berat from freezerstorage then substract qtyfreezer with pcs
//and update qty from freezerstorage
if ($jenisproduksi == $jenisproduksifreezer && $berat == $beratfreezer) {
    $qtyfreezer = $qtyfreezer - $pcs;
    $sql = mysqli_query($db, "UPDATE freezerstorage SET qty = '$qtyfreezer' WHERE jenisproduksi = '$jenisproduksi' AND berat = '$berat'");
    //if success then insert data to freezerkeluar
    if ($sql) {
        $foto = $_FILES['foto']['name'];
$ekstensi_diperbolehkan	= array('png','jpg','jpeg','heic','heif');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1000000){			
        // $query update
        $sql = mysqli_query($db, "INSERT INTO freezerkeluar (tanggalwaktu, operator, jenisproduksi, berat, qty, keterangan, modal, foto) VALUES ('$date', '$operator', '$jenisproduksi', '$berat', '$pcs', '$keterangan', '$modal', '$foto')");
        if($sql){
            move_uploaded_file($file_tmp, '../../assets/img/freezer/'.$nama);
            //if file uploaded direct to index.php?page=tambah&status=success
            echo "<script>alert('data berhasil ditambahkan'); window.location.href='freezer_storage.php';</script>";
        }else{
            echo "<script>alert('data gagal ditambahkan'); window.location.href='freezer_storage.php';</script>";
        }
    }else{
        echo "<script>alert('ukuran file terlalu besar'); window.location.href='freezer_storage.php';</script>";
    }
}else{
    echo "<script>alert('ekstensi file tidak diperbolehkan'); window.location.href='freezer_storage.php';</script>";
}
    } else {
        echo "<script>alert('data gagal ditambahkan'); window.location.href='freezer_storage.php';</script>";
    }
} else {
    echo "<script>alert('data gagal ditambahkan'); window.location.href='freezer_storage.php';</script>";
}