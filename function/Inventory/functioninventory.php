<?php
require '../function/connection.php';
// session_start();
$messageError = '';
$isSukses = '';
$datakategori = array();
$datastatus = array();
$datasatuan = array();
$databarang = array();

$sqlkategori = mysqli_query($conn, "SELECT * FROM kategori_barang");
if ($sqlkategori) {
    while ($a = mysqli_fetch_array($sqlkategori)) {
        array_push($datakategori, array(
            "id_kategori" => $a["id_kategori"],
            "kategori_barang" => $a["kategori_barang"],
        ));
    }
}

$sqlstatus = mysqli_query($conn, "SELECT * FROM status_barang");
if ($sqlstatus) {
    while ($a = mysqli_fetch_array($sqlstatus)) {
        array_push($datastatus, array(
            "id_status_barang" => $a["id_status_barang"],
            "status_barang" => $a["status_barang"],
        ));
    }
}

$sqlsatuan = mysqli_query($conn, "SELECT * FROM satuan_barang");
if ($sqlsatuan) {
    while ($a = mysqli_fetch_array($sqlsatuan)) {
        array_push($datasatuan, array(
            "id_satuan" => $a["id_satuan"],
            "satuan_barang" => $a["satuan_barang"],
            "keterangan" => $a["keterangan"],
        ));
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addbarang"])) {

    $id_kategori_barang = $_POST['id_kategori_barang'];
    $id_satuan = $_POST['id_satuan'];
    $id_status_barang = $_POST['id_status_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $alamat_pengiriman = $_POST['alamat_pengiriman'];
    $kode_transaksi = $_POST['kode_transaksi'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $angka = preg_replace("/[^0-9]/", "", $harga_barang);

    $sql = mysqli_query($conn, "INSERT INTO barang (id_barang, id_kategori_barang, id_satuan, id_status_barang, nama_barang, harga_barang, alamat_pengiriman, kode_transaksi, jumlah_barang) 
                  VALUES (NULL, '$id_kategori_barang', '$id_satuan', '$id_status_barang', '$nama_barang', '$angka', '$alamat_pengiriman', '$kode_transaksi', '$jumlah_barang')");
    if ($sql) {
        $isSukses = true;
        // header('location:../../projectuasweb/inventory/databarang.php');
        $messageError .= "Berhasil menambahkan barang";
        // exit();
    } else {
        $isSukses = false;
        $messageError .= "Gagal menambahkan barang";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editbarang"])) {

    $id_barang = $_POST['id_barang'];
    $id_kategori_barang = $_POST['id_kategori_barang'];
    $id_satuan = $_POST['id_satuan'];
    $id_status_barang = $_POST['id_status_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $alamat_pengiriman = $_POST['alamat_pengiriman'];
    $kode_transaksi = $_POST['kode_transaksi'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $angka = preg_replace("/[^0-9]/", "", $harga_barang);

    $sql = mysqli_query($conn, "UPDATE barang 
        SET id_kategori_barang = '$id_kategori_barang' ,
        id_satuan = '$id_satuan',
        id_status_barang = '$id_status_barang',
        nama_barang = '$nama_barang',
        harga_barang = '$angka',
        alamat_pengiriman = '$alamat_pengiriman',
        kode_transaksi = '$kode_transaksi',
        jumlah_barang = '$jumlah_barang'
        where id_barang = '$id_barang' ");
    if ($sql) {
        $isSukses = true;
        // header('location:../../projectuasweb/inventory/databarang.php');
        $messageError .= "Berhasil mengubah barang";
        // exit();
    } else {
        $isSukses = false;
        $messageError .= "Gagal mengubah barang";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletebarang"])) {

    $id_barang = $_POST['id_barang'];

    $sql = mysqli_query($conn, "DELETE FROM barang where id_barang = '$id_barang' ");
    if ($sql) {
        $isSukses = true;
        // header('location:../../projectuasweb/inventory/databarang.php');
        $messageError .= "Berhasil menghapus barang";
        // exit();
    } else {
        $isSukses = false;
        $messageError .= "Gagal menghapus barang";
    }
}
