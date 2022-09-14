<?php
include '../database.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('anda harus login terlebih dahulu'); window.location.href='../login.php';</script>";
}

//get username from session
$username = $_SESSION['username'];

$password = $_POST['password'];
$password = md5($password);

//update to table userpegawai where username is username
$sql = "UPDATE userpegawai SET password = '$password' WHERE username = '$username'";
if($db->query($sql) === TRUE){
    echo "<script>alert('password berhasil diubah'); window.location.href='index.php';</script>";
}else{
    echo "<script>alert('password gagal diubah'); window.location.href='index.php';</script>";
}