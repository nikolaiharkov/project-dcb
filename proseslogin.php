<?php
include 'database.php';

//get post username, password, login
$username = $_POST['username'];
$password = $_POST['password'];
$login = $_POST['login'];

$password = md5($password);

if ($login == "admin") {
    $sql = "SELECT * FROM useradmin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login'] = $login;
        header("location: admin/index.php");
    } else {
        echo "<script>alert('username atau password salah'); window.location.href='login.php';</script>";
    }
} elseif ($login == "inventory") {
    $sql = "SELECT * FROM userpegawai WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login'] = $login;
        header("location: Inventory/index.php");
    } else {
        echo "<script>alert('username atau password salah'); window.location.href='login.php';</script>";
    }
} else {
    $sql = "SELECT * FROM userpegawai WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login'] = $login;
        header("location: /POS/index.php");
    } else {
        echo "<script>alert('username atau password salah'); window.location.href='login.php';</script>";
    }
}