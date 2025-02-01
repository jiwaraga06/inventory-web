<?php
require '../function/connection.php';
// session_start();
$messageError = '';
$isSukses = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addstatus"])) {

    $status_barang = $_POST['status_barang'];

    if ($status_barang == '') {
        $isSukses = false;
        $messageError .= "Kolom tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "INSERT INTO status_barang (id_status_barang, status_barang) VALUES (NULL, '$status_barang' )");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menambahkan status barang";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal menambahkan status barang";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editstatus"])) {
    $id_status_barang = $_POST['id_status_barang'];
    $status_barang = $_POST['status_barang'];

    if ($satuan == '' || $keterangan == '') {
        $isSukses = false;
        $messageError .= "Kolom tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "UPDATE status_barang set status_barang = '$status_barang' where  id_status_barang ='$id_status_barang' ");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil mengubah satuan barang";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal mengubah satuan barang";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletesatuan"])) {
    $id_status_barang = $_POST['id_status_barang'];
    if ($id_satuan == '') {
        $isSukses = false;
        $messageError .= "Kolom tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "DELETE FROM status_barang  where  id_status_barang ='$id_status_barang' ");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menghapus satuan barang";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal menghapus satuan barang";
        }
    }
}
