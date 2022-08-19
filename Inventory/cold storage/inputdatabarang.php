<?php
include '../../database.php';

// take operator
// take importir
// take merek
// take jenis daging
// take berat daging
// take harga dasar
// take foto

//get timestamp from system jakarta time
//asia/jakarta
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');

// change comma from berat_daging to dot
$berat_daging = str_replace(',', '.', $_POST['beratdaging']);
$operator = $_POST['operator'];
$importir = $_POST['importir'];
$merek = $_POST['merek'];
$jenis_daging = $_POST['jenisdaging'];
$harga_dasar = $_POST['hargadasar'];
$harga_aset = $harga_dasar * $berat_daging;

//strreplace to change comma to dot from beratdaging
//dont change if dot


$foto = $_FILES['foto']['name'];
//only allow jpg, png, jpeg
// file size less than 10mb
// save file to ../../assets/img/coldstorage/
$ekstensi_diperbolehkan	= array('png','jpg');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1000000){			
        // $query update
        $sql = mysqli_query($db, "INSERT INTO datacoldstorage (tanggalwaktu, operator, importir, merek, jenisdaging, qty, hargadasar, hargaaset, foto) VALUES ('$date', '$operator', '$importir', '$merek', '$jenis_daging', '$berat_daging', '$harga_dasar', '$harga_aset', '$foto')");
        if($sql){
            move_uploaded_file($file_tmp, '../../assets/img/coldstorage/'.$nama);
            //if file uploaded direct to index.php?page=tambah&status=success
            echo "<script>alert('data berhasil ditambahkan'); window.location.href='data_barang.php';</script>";
        }else{
            echo "<script>alert('data gagal ditambahkan'); window.location.href='data_barang.php';</script>";
        }
    }else{
        echo "<script>alert('ukuran file terlalu besar'); window.location.href='data_barang.php';</script>";
    }
}else{
    echo "<script>alert('ekstensi file tidak diperbolehkan'); window.location.href='data_barang.php';</script>";
}
?>