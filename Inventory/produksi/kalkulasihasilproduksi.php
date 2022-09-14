<?php
include '../../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../../login.php';</script>";
}

//get session
$username = $_SESSION['username'];
//get id


//get data from table sisa
$sql = "SELECT * FROM sisa";
$result = $db->query($sql);
$datasisa = $result->fetch_assoc();

//if table sisa is null then
if($datasisa == null){
    
    $id = $_GET['id'];

//get data from table tempcoldstorage where id is id
$sql = "SELECT * FROM tempcoldstorage WHERE id = '$id'";
$result = $db->query($sql);
$data = $result->fetch_assoc();
// get qty
$qty = $data['qty'];
//get hargadasar
$hargadasar = $data['hargadasar'];

// totalmodalawal = qty * hargadasar
$totalmodalawal = $qty * $hargadasar;

//sum all qty from table temphasilproduksi
$sql = "SELECT SUM(qty) AS totalqty FROM temphasilproduksi";
$result = $db->query($sql);
$data = $result->fetch_assoc();
$totalqty = $data['totalqty'];

// get sisa from post
$sisa = $_POST['sisa'];

// totalberatproduksi = totalqty + sisa
$totalberatproduksi = $totalqty + $sisa;

// selisih = totalberatproduksi - qty
$selisih = $totalberatproduksi - $qty;

//hargaselisih = selisih * hargadasar
$hargaselisih = $selisih * $hargadasar;

//lanjutan = hargaselisih / totalberatproduksi
$lanjutan = $hargaselisih / $totalberatproduksi;

// modalterbaru = hargadasar + lanjutan
$modalterbaru = $hargadasar + $lanjutan;

//totalassetbaru = modalterbaru * totalberatproduksi
$totalassetbaru = $modalterbaru * $totalberatproduksi;
    
    $sql = "SELECT * FROM freezerstorage";
    $result = $db->query($sql);
    $datafreezerstorage = $result->fetch_assoc();

    //get temphasilproduksi
    $sql = "SELECT * FROM temphasilproduksi";
    $result = $db->query($sql);
    $datatemphasilproduksi = $result->fetch_assoc();

    //if jenisproduksi from freezerstorage and berat dont have same value then insert copy data from temphasilproduki to freezerstorage
    //if jenisproduksi from freezerstorage and berat have same value, then sum qty from temphasilproduksi and update qty from freezerstorage
    if($datafreezerstorage['jenisproduksi'] != $datatemphasilproduksi['jenisproduksi'] && $datafreezerstorage['berat'] != $datatemphasilproduksi['berat']){
        $sql = "INSERT INTO freezerstorage (jenisproduksi, qty, berat) VALUES ('$datatemphasilproduksi[jenisproduksi]', '$datatemphasilproduksi[qty]', '$datatemphasilproduksi[berat]')";
        $result = mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE freezerstorage SET qty = qty + '$datatemphasilproduksi[qty]' WHERE jenisproduksi = '$datatemphasilproduksi[jenisproduksi]' AND berat = '$datatemphasilproduksi[berat]'";
        $result = mysqli_query($db, $sql);
    }


    //get data from table temphasilproduksi
    $sql = "SELECT * FROM temphasilproduksi";
    $result = $db->query($sql);
    $data = $result->fetch_assoc();
    //get jenisproduksi, berat, qty from temphasilproduksi
    $jenisproduksi = $data['jenisproduksi'];
    $berat = $data['berat'];
    $qty = $data['qty'];
    //implode array to string and update to tempcoldstorage
    $jenisproduksi = implode(", ", $jenisproduksi);
    $berat = implode(", ", $berat);
    $qty = implode(", ", $qty);
    //update to tempcoldstorage where id is id
    $sql = "UPDATE tempcoldstorage SET jenisproduksi = '$jenisproduksi', berat = '$berat', qty = '$qty' WHERE id = '$id'";
    $result = $db->query($sql);
    
    //update $totalassetbaru to table tempcoldstorage where id
    $sql = "UPDATE tempcoldstorage SET totalassetfreezer = '$totalassetbaru' WHERE id = '$id'";
    $result = $db->query($sql);

    //get sisa from post
    $sisa = $_POST['jumlahsisa'];
    $jenisproduksisa = $_POST['jenisproduksisisa'];

    //insert to table sisa
    $sql = "INSERT INTO sisa (nama, jumlahsisa) VALUES ('$jenisproduksisa', '$sisa')";
    $result = $db->query($sql);

    if($result){
        $status = "2";
        //update status to table tempcoldstorage where id is id
        $sql = "UPDATE tempcoldstorage SET status = '$status' WHERE id = '$id'";
        $result = $db->query($sql);

        $sql = "TRUNCATE TABLE temphasilproduksi";
        $result = $db->query($sql);
        echo "<script>alert('Data berhasil di input'); window.location.href='produksi.php?id=$id';</script>";
    }


}else{
echo "<script>alert('Data gagal, ada kesalahan'); window.location.href='inputhasilproduksi.php?id=$id';</script>";
}