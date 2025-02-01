<?php
require './function/Auth/login.php';

//cek login

if ($_SESSION) {
  header('location:index.php');
}

// $messageError = '';
// $rememberMe = '';
// if (isset($_POST['login'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   $hashed_password = md5($password);

//   if ($username == '' or $password == '') {
//     $messageError .= "Silahkan masukan username dan password";
//   } else {
//     $cekdatabase = mysqli_query($conn, "SELECT * FROM user where username='$username' AND password='$hashed_password'");
//     $data = mysqli_fetch_assoc($cekdatabase);

//     if ($data) {
//       $_SESSION['log'] = 'True';
//       $_SESSION['username'] = $username;
//       if ($rememberMe == 1) {
//         setcookie("username", "$username");
//       }
//       header('location:index.php');
//     } else {
//       $messageError .= "Akun tidak ditemukan";
//       // header('location:login.php');
//     }
//   }
// };

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="img/logo/LOGOPT3.png" style="height: 75px; margin-bottom: 12px;">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control" id="exampleInputText" aria-describedby="textHelp"
                        placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="rememberMe" <?php if ($rememberMe == "1") echo "checked" ?>>
                        <label class="custom-control-label" for="customCheck"> RememberMe</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn-primary btn-block" name="login">Login</button>
                    </div>
                    <?php if ($messageError) { ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $messageError ?>
                      </div>
                    <?php } ?>


                    <hr>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>