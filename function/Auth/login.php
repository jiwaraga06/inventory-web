<?php
require './function/connection.php';
session_start();
$messageError = '';
$rememberMe = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    if ($username == '' or $password == '') {
        $messageError .= "Silahkan masukan username dan password";
    } else {
        $cekdatabase = mysqli_query($conn, "SELECT * FROM user where username='$username' AND password='$hashed_password'");
        $data = mysqli_fetch_assoc($cekdatabase);

        if ($data) {
            $_SESSION['log'] = 'True';
            $_SESSION['username'] = $username;
            if ($rememberMe == 1) {
                setcookie("username", "$username");
            }
            // $messageError .= "Akun ditemukan";
            header('location:../projectuasweb/index.php');
        } else {
            $messageError .= "Akun tidak ditemukan";
            // header('location:login.php');
        }
    }
};
