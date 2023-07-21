<?php
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if (empty($bgp)) {
    header("Location:../../login.php");
} elseif ($bgp == 'index.php?page=') {
    header("Location:../../login.php");
} else {

?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan Transaksi Seragam /  Baju</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Data Laporan Transaksi Baju</a></li>
                        <li class="breadcrumb-item active">Data Tingkat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php

                $query = mysqli_query($connection, "SELECT * FROM lib_tingkat");
                $result = array();
                while ($data = mysqli_fetch_array($query)) {
                    $result[] = $data; //result dijadikan array 
                }
                foreach ($result as $key => $value) {

                    $jml = mysqli_query($connection, "SELECT COUNT(id_bayar_baju) as jumlah
                    FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                    WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                    AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                    AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                    AND tbl_pembayaran_baju.id_tahun = '{$id_sem}' 
                    AND lib_tingkat.id_tingkat = '{$value['id_tingkat']}'");
                    
                    $hsl = array();
                    while ($dt = mysqli_fetch_array($jml)) {
                        $hsl[] = $dt; //result dijadikan array 
                    }
                    foreach ($hsl as $kunci) {

                ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Tingkat <?= $value['tingkat']; ?></h3>

                                    <p>Jumlah Seluruh adalah <?= $kunci['jumlah']; ?> Transaksi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="index.php?page=laporan-baju&act=data_kelas&id=<?= $value['id_tingkat']; ?>" class="small-box-footer">Lihat Data Kelas <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                <?php }
                } ?>
            </div>
        </div>
    </section>

<?php }
