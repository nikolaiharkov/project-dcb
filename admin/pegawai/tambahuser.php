<?php
include '../../database.php';

//get data from username, password, role
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

//hash password to md5
$password = md5($password);

//if role is admin, insert data to useradmin table
//if role is pegawaian, insert data to userpegawai table
//if success show window alert "data berhasil ditambahkan"
//if failed show windows alert "data gagal ditambahkan"

if($role == 'admin'){
    $sql = "INSERT INTO useradmin (username, password) VALUES ('$username', '$password')";
    if($db->query($sql) === TRUE){
        echo "<script>alert('data berhasil ditambahkan'); window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('data gagal ditambahkan'); window.location.href='index.php';</script>";
    }
}else if($role == 'pegawai'){
    $sql = "INSERT INTO userpegawai (username, password) VALUES ('$username', '$password')";
    if($db->query($sql) === TRUE){
        echo "<script>alert('data berhasil ditambahkan'); window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('data gagal ditambahkan'); window.location.href='index.php';</script>";
    }
}
?>