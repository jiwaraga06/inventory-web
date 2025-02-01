<?php
require '../function/connection.php';
// session_start();
$messageError = '';
$isSukses = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addsatuan"])) {
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    if ($satuan == '' || $keterangan == '') {
        $isSukses = false;
        $messageError .= "Kolom tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "INSERT INTO satuan_barang (id_satuan, satuan_barang, keterangan) VALUES (NULL, '$satuan', '$keterangan' )");
        if ($sql) {
            $isSukses = true;
            $messageError .= "Berhasil menambahkan satuan barang";
            // exit();
        } else {
            $isSukses = false;
            $messageError .= "Gagal menambahkan satuan barang";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editsatuan"])) {
    $id_satuan = $_POST['id_satuan'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    if ($satuan == '' || $keterangan == '') {
        $isSukses = false;
        $messageError .= "Kolom tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "UPDATE satuan_barang set satuan_barang = '$satuan', keterangan = '$keterangan' where  id_satuan ='$id_satuan' ");
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
    $id_satuan = $_POST['id_satuan'];
    if ($id_satuan == '') {
        $isSukses = false;
        $messageError .= "Kolom tidak boleh kosong";
    } else {
        $sql = mysqli_query($conn, "DELETE FROM satuan_barang  where  id_satuan ='$id_satuan' ");
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

?>
