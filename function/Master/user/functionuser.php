<?php
require '../function/connection.php';
// session_start();
$messageError = '';
$isSukses = '';
$datauser = array();
$datarole = array();

$sqluser = mysqli_query($conn, "SELECT u.id, u.username, u.password, u.id_role , r.`role` from user u inner join role r on u.id_role = r.id_role");
if ($sqluser) {
    while ($a = mysqli_fetch_array($sqluser)) {
        array_push($datauser, array(
            "id" => $a["id"],
            "username" => $a["username"],
            "password" => $a["password"],
            "id_role" => $a["id_role"],
            "role" => $a["role"],
        ));
    }
} else {
}
$sqlrole = mysqli_query($conn, "SELECT * FROM role");
if ($sqlrole) {
    while ($a = mysqli_fetch_array($sqlrole)) {
        array_push($datarole, array(
            "id_role" => $a["id_role"],
            "role" => $a["role"],
        ));
    }
} else {
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adduser"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_role = $_POST['id_role'];
    $hashed_password = md5($password);

    $sql = mysqli_query($conn, "INSERT INTO user (id, username, password, id_role) VALUES (NULL, '$username', '$hashed_password', '$id_role' )");
    if ($username != '') {

        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menambahkan user";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal menambahkan user";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edituser"])) {
    $iduser = $_POST['iduser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_role = $_POST['id_role'];
    $hashed_password = md5($password);

    $sql = mysqli_query($conn, "UPDATE user set username = '$username', passwrod = '$hashed_password', id_role = '$id_role' where  id ='$iduser' ");
    if ($iduser != '') {
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil mengubah user";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal mengubah user";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteuser"])) {
    $iduser = $_POST['iduser'];
    if ($iduser != '') {
        $sql = mysqli_query($conn, "DELETE FROM user  where  id ='$iduser' ");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menghapus user";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal menghapus user";
        }
    }
}
