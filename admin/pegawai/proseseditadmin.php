<?php
include '../../database.php';

//get id
// get password
$id = $_POST['id'];
$password = $_POST['password'];

// hash password to md5
$password = md5($password);

// update data from userpegawai where id = $id
$sql = "UPDATE useradmin SET password = '$password' WHERE id = $id";
if($db->query($sql) === TRUE){
    echo "<script>alert('data berhasil diubah'); window.location.href='index.php';</script>";
}else{
    echo "<script>alert('data gagal diubah'); window.location.href='index.php';</script>";
}

