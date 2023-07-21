<?php
ob_start();
session_start();
$thisPage = "";
require_once "config/database.php";
require_once "config/functions.php";
$sesi = "";
if (empty($_SESSION["iduser"])) {
    echo '<meta http-equiv="refresh" content="0;url=login.php">';
} else {
    $sesi = $_SESSION["iduser"];
}

$qus = "SELECT id_user, nama, sessions, level FROM tbl_user WHERE id_user = '{$sesi}'";
$run_qus = mysqli_query($connection, $qus);
if (mysqli_num_rows($run_qus) == 1) {
    $vus = mysqli_fetch_assoc($run_qus);
    $level = $vus["level"];
    $nama = $vus["nama"];
    $idus = $vus["id_user"];
    // Tahun Ajaran
    $qsem = "SELECT * FROM lib_tajaran WHERE status = 'Aktif'";
    $rsem = mysqli_query($connection, $qsem);
    $data_sem = mysqli_num_rows($rsem);
    if ($data_sem > 0) {
        while ($sem = mysqli_fetch_assoc($rsem)) {
            $id_sem = $sem["id_tajaran"];
            $tahun_ajaran = $sem["tahun_ajaran"]; ?>
            <!DOCTYPE HTML>
            <html lang="id" style="height:auto">

            <?php date_default_timezone_set("Asia/Jakarta"); ?>

            <div id="timer" hidden></div>
            <script>
                var timer = document.getElementById("timer");
                var duration = 1800;

                setInterval(updateTimer, 1000);

                function updateTimer() {
                    duration--;
                    if (duration < 1) {
                        window.location = "autokeluar.php";
                    } else {
                        timer.innerText = duration;
                    }
                }

                window.addEventListener("mousemove", resetTimer);

                function resetTimer() {
                    duration = 1800;
                }
            </script>

            <?php include_once "include/header-minify.php"; ?>

            <body class="control-sidebar-slide-open layout-fixed layout-navbar-fixed sidebar-mini" style="height:auto">
                <div class="wrapper">
                    <?php include_once "include/navbar.php";
                    include_once "include/sidebar-minify.php";
                    require_once "include/modul-minify.php";
                    include_once "include/footer.php"; ?>
                </div>
                <?php include_once "include/js-minify.php"; ?>
            </body>
        <?php } ?>
<?php }
} else {
    echo '<meta http-equiv="refresh" content="3;url=login.php">';
} ?>
<?php ob_end_flush(); ?>