<!doctype html>
<html lang=en>

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
        <div class="card card-info card-outline">
            <div class="card-header text-center"> <a class="h4" href="index.php">Sistem Informasi<br>Laporan Pembayaran<br><b>Al-Azhar</b></a> </div>
            <div class="bg-light card-body">
                <div class="ribbon-lg ribbon-wrapper">
                    <div class="bg-info ribbon">TewollArt</div>
                </div>
                <p class="login-box-msg">
                    <?php
                    session_start();
                    unset($sesi);
                    session_destroy();
                    ob_start();
                    $sukses_msg = "Session Telah Habis, Silahkan Login Ulang Kembali";
                    echo $sukses_msg;
                    // echo '<meta http-equiv="refresh" content="3;url=login.php">';
                    echo '<div class="row"><div class="col-12"> <a href="login.php" class="btn btn-block btn-primary">Kembali Ke Halaman Login</a></div></div>';
                    ob_end_flush();
                    ?>
                </p>
            </div>
        </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>