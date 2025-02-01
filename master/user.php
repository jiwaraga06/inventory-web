<?php
require '../function/Master/user/functionuser.php';
session_start();
if ($_SESSION == null) {
    header('location:login.php');
}

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
    <title>GoParcel - User</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include './mysidebarmaster.php' ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include './mytopbarmaster.php' ?>
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
                        <h1 class="h3 mb-0 text-gray-800">User Account</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">Master Data</li>
                            <li class="breadcrumb-item active" aria-current="page">User Account</li>
                        </ol>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data User </h6>
                                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#modalAdd">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Add User</span>
                                    </a>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="datatableUser">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($datauser as $key => $a) :
                                                $iduser = $a['id'];
                                                $username = $a['username'];
                                                $password = $a['password'];
                                                $id_role = $a['id_role'];
                                                $role = $a['role'];

                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $username; ?></td>
                                                    <td><?= $role; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $iduser; ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $iduser; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Modal EDIT -->
                                                <div class="modal fade" id="modalEdit<?= $iduser; ?>" role="dialog" aria-hidden="true">
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
                                                                        <label for="exampleInputEmail1">Username</label>
                                                                        <input type="hidden" class="form-control" id="iduser" name="iduser" placeholder="..." value="<?= $iduser; ?>" required>

                                                                        <input type="text" class="form-control" id="username" name="username" placeholder="..." value="<?= $username; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Password</label>
                                                                        <input type="password" class="form-control" id="password" name="password" placeholder="..." required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Role</label>
                                                                        <select name="id_role" id="id_role" class="form-control mb-3">
                                                                            <?php foreach ($datarole as $key => $a):
                                                                                $id = $a['id_role'];
                                                                                $role = $a['role'];
                                                                            ?>
                                                                                <?php if ($id_role == $id) { ?>
                                                                                    <option value="<?= $id; ?>" value="<?= $id_role ?>" selected> <?= $role; ?></option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?= $id; ?>" value="<?= $id_role ?>"> <?= $role; ?></option>
                                                                                <?php } ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success" name="edituser">Save</button>
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
                                                <div class="modal fade" id="modalDelete<?= $iduser; ?>" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Apakah anda ingin menghapus User ini ?</h6>
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" id="iduser" name="iduser" placeholder="..." value="<?= $iduser; ?>" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger" name="deleteuser">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add User Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Role</label>
                                            <select name="id_role" id="id_role" class="form-control mb-3">
                                                <?php foreach ($datarole as $key => $a):
                                                    $id = $a['id_role'];
                                                    $role = $a['role'];
                                                ?>
                                                    <option value="<?= $id; ?>"><?= $role; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="adduser">Save</button>
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
            $('#datatableStatus').DataTable();
        });
    </script>
</body>

</html>