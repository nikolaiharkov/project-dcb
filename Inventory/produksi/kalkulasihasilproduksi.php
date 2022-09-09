<?php
include '../../database.php';

// calculate all qty from table temphasilproduksi
$sql = "SELECT SUM(qty) AS totalqty FROM temphasilproduksi";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$totalqty = $row['totalqty'];

//$totalqty x 0.0005 = $angkatoleransi
$angkatoleransi = $totalqty * 0.0005;

//take sisa
$sisa = $_POST['sisa'];

// $angkatoleransi + $sisa = $totalsisa

$totalsisa = $angkatoleransi + $sisa;
$namasisa = "sisa produksi";

//insert $namasisa to nama from table sisa
//insert $totalsisa to jumlahsisa from table sisa
//if data found, update it

$sql = "SELECT * FROM sisa WHERE nama = '$namasisa'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
if ($row) {
    //sum jumlahsisa + $totalsisa and then update it
    $jumlahsisa = $row['jumlahsisa'];
    $totalsisa = $totalsisa + $jumlahsisa;
    $sql = "UPDATE sisa SET jumlahsisa = '$totalsisa' WHERE nama = '$namasisa'";
    mysqli_query($db, $sql);
} else {
    $sql = "INSERT INTO sisa (nama, jumlahsisa) VALUES ('$namasisa', '$totalsisa')";
    $result = mysqli_query($db, $sql);
}

//get hargaaset from table tempcoldstorage where id
$id = $_POST['id'];
$sql = "SELECT * FROM tempcoldstorage WHERE id = '$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$hargaaset = $row['hargaaset'];


//calculate berat from table temphasilproduksi
$sql = "SELECT SUM(berat) AS totalberat FROM temphasilproduksi";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$totalberat = $row['totalberat'];

//calculate $totalberat x $hargaaset = $totalmodal
$totalmodal = $totalberat * $hargaaset;

//calculate $totalmodal - $hargaaset = $selisihmodal
$selisihmodal = $totalmodal - $hargaaset;

//calculate $selisihmodal / $totalberat = $asetfreezer
$asetfreezer = $selisihmodal / $totalberat;

//calculate $asetfreezer + $hargaaset = $totalasetfreezer
$totalasetfreezer = $asetfreezer + $hargaaset;

//create array for jenisproduksi from table temphasilproduksi and implode it to string
$sql = "SELECT jenisproduksi FROM temphasilproduksi";
$result = mysqli_query($db, $sql);
$jenisproduksi = array();
while ($row = mysqli_fetch_array($result)) {
    $jenisproduksi[] = $row['jenisproduksi'];
}
$jenisproduksi = implode(", ", $jenisproduksi);

//create array for qty from table temphasilproduksi and implode it to string
$sql = "SELECT qty FROM temphasilproduksi";
$result = mysqli_query($db, $sql);
$qty = array();
while ($row = mysqli_fetch_array($result)) {
    $qty[] = $row['qty'];
}
$qty = implode(", ", $qty);

//create array for berat from table temphasilproduksi and implode it to string
$sql = "SELECT berat FROM temphasilproduksi";
$result = mysqli_query($db, $sql);
$berat = array();
while ($row = mysqli_fetch_array($result)) {
    $berat[] = $row['berat'];
}
$berat = implode(", ", $berat);

//insert jenisproduksi, qty, berat to tempcoldstorage jenisproduksi, qtyhasil, berat
$sql = "UPDATE tempcoldstorage SET jenisproduksi = '$jenisproduksi', qtyhasil = '$qty', berat = '$berat' WHERE id = '$id'";
$result = mysqli_query($db, $sql);

//insert jenisproduksi, qty, berat to freezerstorage
$sql = "INSERT INTO freezerstorage (jenisproduksi, qty, berat, totalassetfreezer) VALUES ('$jenisproduksi', '$qty', '$berat', '$totalasetfreezer')";
$result = mysqli_query($db, $sql);

$status = 2;
//update status to 2 in table tempcoldstorage
$sql = "UPDATE tempcoldstorage SET status = '$status' WHERE id = '$id'";
$result = mysqli_query($db, $sql);

//insert $totalasetfreezer to table tempcoldstorage totalassetfreezer where id
$sql = "UPDATE tempcoldstorage SET totalassetfreezer = '$totalasetfreezer' WHERE id = '$id'";
$result = mysqli_query($db, $sql);

//drop all data from table temphasilproduksi
$sql = "TRUNCATE TABLE temphasilproduksi";
$result = mysqli_query($db, $sql);

//show alert and redirect to page
echo "<script>alert('Data berhasil disimpan'); window.location.href='produksi.php'</script>";
