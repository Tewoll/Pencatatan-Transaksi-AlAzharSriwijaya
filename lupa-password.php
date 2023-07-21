<?php
ob_start();
session_start();
require_once "config/database.php";
require_once "config/functions.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "plugins/PHPMailer/src/PHPMailer.php";
require "plugins/PHPMailer/src/SMTP.php";

$uid = isset($_SESSION["iduser"]) ? trim($_SESSION["iduser"]) : "";
if (!empty($uid == true)) {
    header("Location:index.php?page=home");
} else { ?>

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
                background: #778899;
                background: url(dist/img/background.jpg);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
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
                    <div class="card-body">
                        <?php
                            $error="";
                            if (isset($_POST["email"]) && !empty($_POST["email"])) {
                                $email = $_POST["email"];
                                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                                if (!$email) {
                                    $error .= "<p>Invalid email address please type a valid email address!</p>";
                                } else {
                                $sel_query = "SELECT * FROM tbl_user WHERE email = '" . $email . "'";
                                $results = mysqli_query($connection, $sel_query);
                                $row = mysqli_num_rows($results);

                                if (!($row)) {
                                    $error .= "<p class='text-center'>No user is registered with this email address!</p>";
                                }
                            
                                if ($error != "") {
                                    echo "<div class='error text-center'>" . $error . "</div> <br /><p class='mt-3 mb-1'><a class='btn btn-danger btn-block btn-sm' class='text-center' href='javascript:history.go(-1)'>Go Back</a></p>";
                                } else {
                                    $expFormat = mktime(date("H"),date("i"),date("s"),date("m"),date("d") + 1,date("Y"));
                                    $expDate = date("Y-m-d H:i:s", $expFormat);
                                    $key = md5($email);
                                    $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                                    $key = $key . $addKey;
                                    // Insert Temp Table
                                    mysqli_query($connection, "INSERT INTO password_reset_temp(email, kunci, expDate) VALUES ('{$email}', '{$key}', '{$expDate}');");

                                    $output  = "<p>Dear user,</p>";
                                    $output .= "<p>Please click on the following link to reset your password.</p>";
                                    $output .= "<p>-------------------------------------------------------------</p>";
                                    $output .= '<p><a href="https://www.alazharsriwijaya.my.id/recovery-password.php?key=' . $key . "&email=" . $email . '&action=reset" target="_blank">https://www.alazharsriwijaya.my.id/reset-password.php?key=' . $key . "&email=" . $email . "&action=reset</a></p>";
                                    $output .= "<p>-------------------------------------------------------------</p>";
                                    $output .= '<p>Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reason.</p>';
                                    $output .= '<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';
                                    $output .= "<p>Thanks,</p>";
                                    $output .= "<p>Al-Azhar Sriwijaya Team</p>";
                                    $body    = $output;
                                    $subject = "Password Recovery - Al-Azhar Sriwijaya";

                                    $email_to = $email;
                                    $fromserver = "info@alazharsriwijaya.my.id";
                                    
                                    $mail = new PHPMailer();
                                    $mail->IsSMTP();
                                    $mail->Host = "mail.alazharsriwijaya.my.id"; // Enter your host here
                                    $mail->SMTPAuth = true;
                                    $mail->Username = "info@alazharsriwijaya.my.id"; // Enter your email here
                                    $mail->Password = "Manusiabias4"; //Enter your password here
                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                    $mail->Port = 465;
                                    $mail->IsHTML(true);
                                    $mail->setFrom("info@alazharsriwijaya.my.id","Al-Azhar Sriwijaya");
                                    $mail->Sender = $fromserver; // indicates ReturnPath header
                                    $mail->Subject = $subject;
                                    $mail->Body = $body;
                                    $mail->AddAddress($email_to);
                                    if (!$mail->Send()) {
                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                    } else {
                                        echo "<div class='error text-center'>
                                        <p>An email has been sent to you with instructions on how to reset your password.</p>
                                        </div><br/>";
                                    }
                                }
                            }
                            }else { ?>
                            <form name="reset" role="form" autocomplete="off" class="form" method="post">
                                <div class="input-group mb-3">
                                    <input name="email" placeholder="email address" class="form-control" type="email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="btn btn-primary btn-block btn-sm" type="submit" value="Reset Password" >
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                        <p class="mt-3 mb-1">
                            <p class="text-center"></p>
                            <a href="login.php" class="btn btn-default btn-block btn-sm" type="submit">Login</a>
                        </p>
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

<?php ob_end_flush(); }  ?>
