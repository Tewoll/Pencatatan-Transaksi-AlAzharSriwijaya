<?php
ob_start();
session_start();
require_once "config/database.php";
require_once "config/functions.php";

$uid = isset($_SESSION["iduser"]) ? trim($_SESSION["iduser"]) : "";
if (!empty($uid == true)) {
  header("Location:index.php?page=home");
} else {
  
  if (isset($_POST["user_login_btn"])){
    $_SESSION['last_login_timestamp'] = time();  
    }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title>SILAYAR Al-Azhar</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
    <link href="plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/adminlte.min.css" rel="stylesheet">
    <style>
      body {
                background: #778899;
                background: url(dist/img/background.jpg);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
      }
    </style>
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center"> <a href="index.php" class="h4">Sistem Informasi<br>Laporan Pembayaran<br><b>Al-Azhar</b></a> </div>
        <div class="card-body">
          <div class="ribbon-lg ribbon-wrapper">
            <div class="bg-info ribbon">TewollArt</div>
          </div>
          <p class="login-box-msg"><?php if (isset($_POST["user_login_btn"])) {
                                    $login_username = inject_checker($connection, $_POST["user"]);
                                    $lg_password = inject_checker($connection, $_POST["pass"]);
                                    $login_password = sha1($lg_password);

                                    if (empty($login_username)) {
                                      $error_msg = "Username masih kosong";
                                      echo $error_msg;
                                      header("Refresh:2;");
                                      header("Url:login.php;");
                                    } elseif (empty($login_password)) {
                                      $error_msg = "Password masih kosong";
                                      echo $error_msg;
                                      header("Refresh:2;");
                                      header("Url:login.php;");
                                    } else {
                                      $query = " SELECT id_user FROM tbl_user WHERE username = '{$login_username}'";
                                      $run_query = mysqli_query($connection, $query);

                                      if (mysqli_num_rows($run_query) == 1) {
                                        while ($result = mysqli_fetch_assoc($run_query)) {
                                          $user_id = $result["id_user"];
                                          $queryx = "SELECT id_user, sessions FROM tbl_user WHERE id_user = '{$user_id}' and pass = '{$login_password}'";
                                          $run_queryx = mysqli_query($connection, $queryx);
                                          if (mysqli_num_rows($run_queryx) == 1) {
                                            $_SESSION["iduser"] = $user_id;
                                            $sid_lama = session_id();
                                            session_regenerate_id();
                                            $sid_baru = session_id();
                                            mysqli_query(
                                              $connection,
                                              "UPDATE tbl_user SET sessions = '{$sid_baru}' where id_user = '{$user_id}'"
                                            ) or
                                              die("Ada kesalahan pada query insert update : " .
                                                mysqli_error($connection));
                                            $_SESSION["idsesi"] = $sid_baru;
                                            $sukses_msg =
                                              "Berhasil login, silakan tunggu beberapa saat anda akan diarahkan ke halaman dashboard";
                                            echo $sukses_msg;
                                            echo '<meta http-equiv="refresh" content="3;url=index.php">';
                                          } else {
                                            $error_msg = "Password salah";
                                            echo $error_msg;
                                            header("Refresh:2;");
                                            header("Url:login.php;");
                                          }
                                        }
                                      } else {
                                        $error_msg = "Username salah";
                                        echo $error_msg;
                                        header("Refresh:2;");
                                        header("Url:login.php;");
                                      }
                                    }
                                  } ?></p>
          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" name="login">
            <div class="input-group mb-3"> <input class="form-control" name="user" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
              </div>
            </div>
            <div class="input-group mb-3"> <input class="form-control" name="pass" placeholder="Password" type="password">
              <div class="input-group-append">
                <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary"> <input type="checkbox" id="remember"> <label for="remember"> Remember Me </label> </div>
              </div>
              <div class="col-4"> <input class="btn btn-block btn-primary" name="user_login_btn" type="submit" onclick="return submitlogin()" value=Login> </div>
            </div>
          </form>
          <p class="mb-1"> <a href="lupa-password.php">I forgot my password</a> </p>
        </div>
      </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
  <?php ob_end_flush();
} ?>