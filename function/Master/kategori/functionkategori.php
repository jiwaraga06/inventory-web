<?php
require '../function/connection.php';
// session_start();
$messageError = '';
$isSukses = '';
$rememberMe = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addkategori"])) {
    $kategori = $_POST['kategori'];

    if ($kategori == '') {
        $isSukses = false;
        $messageError .= "Kolom kategori tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "INSERT INTO kategori_barang (id_kategori, kategori_barang) VALUES (NULL, '$kategori' )");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menambahkan kategori";
            // exit();
            // header('location:../../projectuasweb/master/kategori.php');
        } else {
            $isSukses = false;
            $messageError .= "Gagal menambahkan kategori";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editkategori"])) {
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];

    if ($kategori == '') {
        $isSukses = false;
        $messageError .= "Kolom kategori tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "UPDATE kategori_barang SET kategori_barang = '$kategori' where id_kategori = '$id_kategori'");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil mengubah kategori";
            // header('location:../../projectuasweb/master/kategori.php');
        } else {
            $isSukses = false;
            $messageError .= "Gagal mengubah kategori";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletekategori"])) {
    $id_kategori = $_POST['id_kategori'];

    if ($id_kategori == '') {
        $isSukses = false;
        $messageError .= "Kolom kategori tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "DELETE FROM kategori_barang  where id_kategori = '$id_kategori'");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menghapus kategori";
            // header('location:../../projectuasweb/master/kategori.php');
        } else {
            $isSukses = false;
            $messageError .= "Gagal menghapus kategori";
        }
    }
}

?>
