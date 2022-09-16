<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

$username = $_SESSION['username'];
//id with post
$id = $_POST['id'];
date_default_timezone_set('Asia/Jakarta');

//get table sisa, if table sisa is null do operation, else do operation
$sql = "SELECT * FROM sisa";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
if($row == null){
    
$sql = "SELECT * FROM temphasilproduksi";
foreach($db->query($sql) as $row){
    $jenisproduksi = $row['jenisproduksi'];
    $qty = $row['qty'];
    $berat = $row['berat'];
    //if jenisproduksi and berat from temphasilproduksi is not have same value with jenisproduksi and berat from freezerstorage then insert data to freezerstorage
    $sql2 = "SELECT * FROM freezerstorage WHERE jenisproduksi = '$jenisproduksi' AND berat = '$berat'";
    if($db->query($sql2)->num_rows == 0){
        $sql3 = "INSERT INTO freezerstorage (jenisproduksi, qty, berat) VALUES ('$jenisproduksi', '$qty', '$berat')";
        $db->query($sql3);
    }else{
        //if jenisproduksi and berat from temphasilproduksi is have same value with jenisproduksi and berat from freezerstorage then update qty from freezerstorage
        $sql4 = "UPDATE freezerstorage SET qty = qty + '$qty' WHERE jenisproduksi = '$jenisproduksi' AND berat = '$berat'";
        $db->query($sql4);
    }
}

//get hargaaset from table tempcoldstorage where id = $id
$sql5 = "SELECT * FROM tempcoldstorage WHERE id = '$id'";
foreach($db->query($sql5) as $row){
    $qty = $row['qty'];
    $hargadasar = $row['hargadasar'];

}

//sum totalberat from table temphasilproduksi
$sql6 = "SELECT SUM(totalberat) AS totalberat FROM temphasilproduksi";
$result = $db->query($sql6);
$row = $result->fetch_assoc();
$totalberat = $row['totalberat'];

$jenisproduksisisa = $_POST['jenisproduksisisa'];
$jumlahsisa = $_POST['jumlahsisa'];
$jumlahsisa = str_replace(',', '.', $jumlahsisa);
    //if there is coma in jumlahsisa, then replace it with dot

    //totalberatproduksi = totalqty + jumlahsisa
    $totalberatproduksi = $totalberat + $jumlahsisa;

    // selisih = totalberatproduksi - qty
    $selisih = $qty - $totalberatproduksi;
    
    //hargaselisih = selisih * hargadasar
    $hargaselisih = $selisih * $hargadasar;
    
    //lanjutan = hargaselisih / totalberatproduksi
    $lanjutan = $hargaselisih / $totalberatproduksi;
    
    // modalterbaru = hargadasar + lanjutan
    $modalterbaru = $hargadasar + $lanjutan;
    
    //totalassetbaru = modalterbaru * totalberatproduksi
    $totalassetbaru = $modalterbaru * $totalberatproduksi;

//update totalassetbaru to table tempcoldstorage where id = $id
$sql7 = "UPDATE tempcoldstorage SET totalassetfreezer = '$totalassetbaru' WHERE id = '$id'";
$db->query($sql7);

//insert jenisproduksisisa and jumlahsisa to table sisa nama, jumlahsisa
$sql8 = "INSERT INTO sisa (nama, jumlahsisa) VALUES ('$jenisproduksisisa', '$jumlahsisa')";
$db->query($sql8);

//select jenisproduksi from table temphasilproduksi, and implode it with coma
$sql9 = "SELECT * FROM temphasilproduksi";
//result
$result = $db->query($sql9);
$jenisproduksi = array();
while($row = $result->fetch_assoc()){
    $jenisproduksi[] = $row['jenisproduksi'];
}
$jenisproduksi = implode(', ', $jenisproduksi);

//select qty from table temphasilproduksi, and implode it with coma
$sql10 = "SELECT * FROM temphasilproduksi";
//result
$result = $db->query($sql10);
$qty = array();
while($row = $result->fetch_assoc()){
    $qty[] = $row['qty'];
}
$qty = implode(', ', $qty);

//select berat from table temphasilproduksi, and implode it with coma
$sql11 = "SELECT * FROM temphasilproduksi";
//result
$result = $db->query($sql11);
$berat = array();
while($row = $result->fetch_assoc()){
    $berat[] = $row['berat'];
}
$berat = implode(', ', $berat);

//insert jenisproduksi, qty, berat to tempcoldstorage jenisproduksi, qtyhasil, berat
$sql12 = "UPDATE tempcoldstorage SET jenisproduksi = '$jenisproduksi', qtyhasil = '$qty', berat = '$berat' WHERE id = '$id'";
$db->query($sql12);

//update status to 2 from table tempcoldstorage where id = $id
$sql13 = "UPDATE tempcoldstorage SET status = '2' WHERE id = '$id'";
$db->query($sql13);

//update operator to $operator from table tempcoldstorage where id = $id
//get operator from session
$operator = $_SESSION['username'];
$sql14 = "UPDATE tempcoldstorage SET operator = '$operator' WHERE id = '$id'";
$db->query($sql14);

//get tanggalwaktu with timezone jakarta and update to table tempcoldstorage where id = $id
$tanggalwaktu = date('Y-m-d H:i:s');
$sql15 = "UPDATE tempcoldstorage SET tanggalwaktu = '$tanggalwaktu' WHERE id = '$id'";
$db->query($sql15);

//trancate table temphasilproduksi if all operation is done
$sql16 = "TRUNCATE TABLE temphasilproduksi";
$db->query($sql16);

echo "<script>alert('Data berhasil di input');window.location.href='produksi.php';</script>";
}else{
    echo "<script>alert('Data gagal di input');window.location.href='produksi.php';</script>";
}