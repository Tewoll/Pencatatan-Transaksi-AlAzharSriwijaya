<?php
ob_start();
session_start();
require_once "config/database.php";
require_once "config/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SILAYAR Al-Azhar</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">

        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
        <style>
            body {
            background: "#789";
            background: url("dist/img/background.jpg");
            background-position: "center";
            background-repeat: "no-repeat";
            background-size: "cover"
            }
            .error p {
                color:#FF0000;
                font-size:20px;
                font-weight:bold;
                margin:50px;
            }
        </style>
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="index.php" class="h4">Sistem Informasi<br>Laporan Pembayaran<br><b>Al-Azhar</b></a>
                </div>
                <div class="card-body">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-info">TewollArt</div>
                    </div>
                    <div class="card-body text-center">
                    <?php
                    $error="";
                    if ( isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && $_GET["action"] == "reset" && !isset($_POST["action"])) {
                      $key = $_GET["key"];
                      $email = $_GET["email"];
                      $curDate = date("Y-m-d H:i:s");
                      $query = mysqli_query( $connection, "SELECT * FROM password_reset_temp WHERE kunci ='{$key}' AND email='{$email}';");
                      $row = mysqli_num_rows($query);
                      if ($row == "") { $error .= '<h2>Invalid Link</h2>
                        <p>The link is invalid/expired. Either you did not copy the correct link 
                        from the email, or you have already used the key in which case it is 
                        deactivated.</p>
                        <p><a href="https://www.alazharsriwijaya.my.id/lupa-password.php">
                        Click here</a> to reset password.</p>';
                      } else {
                          $row = mysqli_fetch_assoc($query);
                          $expDate = $row["expDate"];
                          if ($expDate >= $curDate) { ?>
                          
                          <p class="login-box-msg">Anda hanya selangkah lagi dari kata sandi baru Anda, pulihkan kata sandi Anda sekarang.</p>
                        <form method="post" action="" name="update">
                            <input type="hidden" name="action" value="update" />
                            <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="pass1" maxlength="15" required placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input  type="password" class="form-control" name="pass2" maxlength="15" required placeholder="Confirm Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input class="btn btn-primary btn-block" type="submit" value="Reset Password"/>
                                </div>
                                <!-- /.col -->
                            </div>
                            </form>
                          <?php } else {
                            $error .= "<h2>Link Expired</h2>
                            <p>The link is expired. You are trying to use the expired link which 
                            as valid only 24 hours (1 days after request).<br /><br /></p>";
                          }
                        }
                        if ($error != "") {
                          echo "<div class='error'>" . $error . "</div><br />";
                        }
                      } // isset email key validate end
                      if ( isset($_POST["email"]) && isset($_POST["action"]) && $_POST["action"] == "update") {
                        $error = "";
                        $pass1 = mysqli_real_escape_string($connection, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($connection, $_POST["pass2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                      if ($pass1 != $pass2) {
                        $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                      }
                      if ($error != "") {
                          echo "<div class='error'>" . $error . "</div><br />";
                      } else {
                        $pass1 = sha1($pass1);
                        mysqli_query( $connection, "UPDATE tbl_user SET pass='{$pass1}' WHERE email='{$email}';");
                        mysqli_query( $connection, "DELETE FROM password_reset_temp WHERE email='{$email}';");
                        echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
                        <p><a href="https://www.alazharsriwijaya.my.id/login.php">
                        Click here</a> to Login.</p></div><br />';
                      }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>

<?php ob_end_flush(); ?>

