<?php
require '../function/Inventory/functioninventory.php';
session_start();
if ($_SESSION == null) {
    header('location:login.php');
}

$sqlbarang = mysqli_query($conn, "SELECT
    b.id_barang,
    b.nama_barang,
    b.harga_barang,
    b.jumlah_barang,
    b.kode_transaksi,
    b.alamat_pengiriman,
    b.id_kategori_barang,
    b.id_satuan,
    b.id_status_barang,
    kb.kategori_barang AS kategori_barang,
    s.status_barang AS status_barang,
    sb.satuan_barang AS satuan_barang
FROM barang b
INNER JOIN kategori_barang kb 
    ON kb.id_kategori = b.id_kategori_barang
INNER JOIN satuan_barang sb 
    ON sb.id_satuan = b.id_satuan
INNER JOIN status_barang s
    ON s.id_status_barang = b.id_status_barang");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../img/logo/LOGOPT3.png" rel="icon">
    <title>GoParcel - Inventory</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include './mysidebarinv.php' ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include './mytopbarinv.php' ?>
                <?php if ($isSukses == false && $messageError != '') { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $messageError ?>
                    </div>
                <?php } else if ($isSukses == true && $messageError != '') { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $messageError ?>
                    </div>
                <?php } ?>
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">Inventory</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Barang </h6>
                                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalAdd">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add Barang</span>
                                    </a>
                                </div>
                                
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="datatableBarang">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Jumlah</th>
                                                <th>Kode Transaksi</th>
                                                <th>Alamat Pengirim</th>
                                                <th>Kategori</th>
                                                <th>Satuan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($a = mysqli_fetch_array($sqlbarang)) {
                                                $id_barang = $a['id_barang'];
                                                $nama_barang = $a["nama_barang"];
                                                $harga_barang = $a["harga_barang"];
                                                $jumlah_barang = $a["jumlah_barang"];
                                                $kode_transaksi = $a["kode_transaksi"];
                                                $alamat_pengiriman = $a["alamat_pengiriman"];
                                                $id_kategori_barang = $a["id_kategori_barang"];
                                                $id_satuan = $a["id_satuan"];
                                                $id_status_barang = $a["id_status_barang"];
                                                $kategori_barang = $a["kategori_barang"];
                                                $status_barang = $a["status_barang"];
                                                $satuan_barang = $a["satuan_barang"];

                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $nama_barang; ?></td>
                                                    <td>Rp <?= number_format($harga_barang); ?></td>
                                                    <td><?= $jumlah_barang; ?></td>
                                                    <td><?= $kode_transaksi; ?></td>
                                                    <td><?= $alamat_pengiriman; ?></td>
                                                    <td><?= $kategori_barang; ?></td>
                                                    <td><?= $satuan_barang; ?></td>
                                                    <td><span class="badge bg-primary" style="color: white; padding: 8px"><?= $status_barang; ?></span></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id_barang; ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $id_barang; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Modal EDIT -->
                                                <div class="modal fade" id="modalEdit<?= $id_barang; ?>" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nama Barang</label>
                                                                        <input type="hidden" class="form-control" id="id_barang" name="id_barang" placeholder="..." value="<?= $id_barang ?>" required>
                                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="..." value="<?= $nama_barang ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Harga Barang</label>
                                                                        <input type="text" class="form-control" id="harga_barang" name="harga_barang" placeholder="..." onkeyup="formatRupiah(this)" value="Rp <?= number_format($harga_barang); ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Jumlah Barang</label>
                                                                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="..." value="<?= $jumlah_barang ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Kode Transaksi</label>
                                                                        <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi" placeholder="..." value="<?= $kode_transaksi ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Alamat Pengirim</label>
                                                                        <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" placeholder="..." value="<?= $alamat_pengiriman ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Kategori</label>
                                                                        <select name="id_kategori_barang" id="id_kategori_barang" class="form-control mb-3">
                                                                            <?php foreach ($datakategori as $key => $a):
                                                                                $id_kategori = $a['id_kategori'];
                                                                                $kategori_barang = $a['kategori_barang'];
                                                                            ?>
                                                                                <?php if ($id_kategori_barang == $id_kategori) { ?>
                                                                                    <option value="<?= $id_kategori; ?>" selected><?= $kategori_barang; ?></option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?= $id_kategori; ?>"><?= $kategori_barang; ?></option>
                                                                                <?php } ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Satuan</label>
                                                                        <select name="id_satuan" id="id_satuan" class="form-control mb-3">
                                                                            <?php foreach ($datasatuan as $key => $a):
                                                                                $idsatuan = $a['id_satuan'];
                                                                                $satuan_barang = $a['satuan_barang'];
                                                                            ?>
                                                                                <?php if ($id_satuan == $idsatuan) { ?>
                                                                                    <option value="<?= $idsatuan; ?>" selected><?= $satuan_barang; ?></option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?= $idsatuan; ?>"><?= $satuan_barang; ?></option>
                                                                                <?php } ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Status</label>
                                                                        <select name="id_status_barang" id="id_status_barang" class="form-control mb-3">
                                                                            <?php foreach ($datastatus as $key => $a):
                                                                                $idstatusbarang = $a['id_status_barang'];
                                                                                $status_barang = $a['status_barang'];
                                                                            ?>
                                                                                <?php if ($id_status_barang == $idstatusbarang) { ?>
                                                                                    <option value="<?= $idstatusbarang; ?>" selected><?= $status_barang; ?></option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?= $idstatusbarang; ?>"><?= $status_barang; ?></option>
                                                                                <?php } ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success" name="editbarang">Save</button>
                                                                    </div>
                                                                </form>
                                                                <?php if ($messageError) { ?>
                                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <?php echo $messageError ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Delete -->
                                                <div class="modal fade" id="modalDelete<?= $id_barang; ?>" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Apakah anda ingin menghapus Data Barang ini ?</h6>
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" id="id_barang" name="id_barang" placeholder="..." value="<?= $id_barang; ?>" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger" name="deletebarang">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal ADD -->
                    <div class="modal fade" id="modalAdd" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Barang</label>
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_barang">Harga Barang</label>
                                            <input type="text" class="form-control" id="harga_barang" name="harga_barang" placeholder="..." required onkeyup="formatRupiah(this)">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kode Transaksi</label>
                                            <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Pengirim</label>
                                            <input type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori</label>
                                            <select name="id_kategori_barang" id="id_kategori_barang" class="form-control mb-3">
                                                <?php foreach ($datakategori as $key => $a):
                                                    $id_kategori = $a['id_kategori'];
                                                    $kategori_barang = $a['kategori_barang'];
                                                ?>
                                                    <option value="<?= $id_kategori; ?>"><?= $kategori_barang; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Satuan</label>
                                            <select name="id_satuan" id="id_satuan" class="form-control mb-3">
                                                <?php foreach ($datasatuan as $key => $a):
                                                    $id_satuan = $a['id_satuan'];
                                                    $satuan_barang = $a['satuan_barang'];
                                                ?>
                                                    <option value="<?= $id_satuan; ?>"><?= $satuan_barang; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select name="id_status_barang" id="id_status_barang" class="form-control mb-3">
                                                <?php foreach ($datastatus as $key => $a):
                                                    $id_status_barang = $a['id_status_barang'];
                                                    $status_barang = $a['status_barang'];
                                                ?>
                                                    <option value="<?= $id_status_barang; ?>"><?= $status_barang; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="addbarang">Save</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <a href="./logout.php" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> - developed by
                            <b><a href="https://indrijunanda.gitlab.io/" target="_blank">MAHASISWA UTB</a></b>
                        </span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatableBarang').DataTable();
        });
        var angka = document.getElementById("harga_barang");
        angka.addEventListener("keyup", function(e) {
            angka.value = formatRupiah(this.value, "Rp ");
        });

        function formatRupiah(input) {
            let angka = input.value.replace(/[^0-9]/g, '');
            let numberString = angka.toString();
            let sisa = numberString.length % 3;
            let rupiah = numberString.substr(0, sisa);
            let ribuan = numberString.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                let separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            input.value = rupiah ? "Rp " + rupiah : "";
        }
    </script>
</body>

</html>