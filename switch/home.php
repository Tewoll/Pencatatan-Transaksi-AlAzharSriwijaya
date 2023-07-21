<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Selamat datang <?php echo $nama; ?> di SILAYAR Al-Azhar.</strong>
        </div>
    </div>

    <section class="content text-sm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info bg-info">
                        <h5><i class="fas fa-info"></i> Catatan:</h5>
                        Tahun ajaran akademik pada saat ini yaitu <b>Tahun Ajaran <?php echo $tahun_ajaran; ?></b>.
                        <?php if (
                            $level == "admin"
                        ) { ?> Anda dapat mengubah tahun ajaran di menu <a href="index.php?page=pengaturan">Pengaturan</a>
                        <?php } else {} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content text-sm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <?php
                    $query = "SELECT COUNT(id_bayar_baju) as jumlah
                FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                AND tbl_pembayaran_baju.id_tahun = '{$id_sem}'";
                    $result = mysqli_query($connection, $query);
                    $data = mysqli_num_rows($result);
                    if ($data > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="info-box mb-4">
                                <span class="info-box-icon"><i class="fas fa-tshirt nav-icon"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Transaksi Pembayaran Baju : <b><?php echo $row[
                                        "jumlah"
                                    ]; ?>
                                            x</b></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span class="progress-description"><a href="index.php?page=laporan-baju" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a></span>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
                <div class="col-lg-6">
                    <?php
                    $query = "SELECT COUNT(id_bayar_antar) as total
                FROM tbl_pembayaran_antar, tbl_siswa, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat, lib_tajaran
                WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa 
                AND tbl_pembayaran_antar.kd_bayar_antar = tbl_invoice.kd_bayar
                AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                AND tbl_pembayaran_antar.id_tahun = lib_tajaran.id_tajaran
                AND tbl_pembayaran_antar.id_tahun = '{$id_sem}'";
                    $result = mysqli_query($connection, $query);
                    $data = mysqli_num_rows($result);
                    if ($data > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="info-box mb-4">
                                <span class="info-box-icon"><i class="fa fa-bus-simple nav-icon"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Transaksi Pembayaran Antar Jemput :
                                        <b><?php echo $row["total"]; ?>
                                            x</b></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span class="progress-description"><a href="index.php?page=laporan-antar" class="small-box-footer">Lihat data <i class="fas fa-arrow-circle-right"></i></a></span>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
                <div class="clearfix hidden-md-up"></div>
            </div>
        </div>
    </section>

    <section class="content text-sm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                            <?php
                            $querybaj = "SELECT SUM(jumlah_byr) as jumlah
                FROM tbl_pembayaran_baju
                WHERE tbl_pembayaran_baju.id_tahun = '{$id_sem}'";
                            $result = mysqli_query($connection, $querybaj);
                            $row = mysqli_fetch_assoc($result);
                            $queryant = "SELECT SUM(jml_bayar) as jumlahs
                FROM tbl_pembayaran_antar
                WHERE tbl_pembayaran_antar.id_tahun = '{$id_sem}'";
                            $results = mysqli_query($connection, $queryant);
                            $rows = mysqli_fetch_assoc($results);
                            $hasilnya = $row["jumlah"] + $rows["jumlahs"];
                            ?>
                                <h3 class="card-title"><b>Data Pemasukan</b></h3>
                                <!-- <a href="javascript:void(0);">View Report</a> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Rp. <?= $hasilnya ?></span>
                                    <span>Jumlah Pembayaran</span>
                                </p>
                                <!-- <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 33.1%
                                    </span>
                                    <span class="text-muted">Since last month</span>
                                </p> -->
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Baju
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Antar-Jemput
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Grafik Tipe Pembayaran</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($level == "admin") { ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Transaksi Pembayaran Baju Terakhir</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Query -->
                            <?php
                            $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                    tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat, lib_tingkat.tingkat
                    FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                    WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                    AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                    AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                    AND tbl_pembayaran_baju.id_tahun = '$id_sem' 
                    ORDER BY tgl_bayar DESC LIMIT 10";
                            $result = mysqli_query($connection, $query);
                            $data = mysqli_num_rows($result);
                            if ($data > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <div class="card-body p-0">
                                        <ul class="products-list product-list-in-card pl-2 pr-2">
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="dist/img/baju.jpg" alt="Product Image" class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-title"><?php echo $row[
                                                        "nama_siswa"
                                                    ]; ?>
                                                        (<?php echo $row[
                                                            "tingkat"
                                                        ]; ?>)
                                                        <span class="badge badge-warning float-right">Rp.
                                                            <?php echo $row[
                                                                "jumlah_byr"
                                                            ]; ?></span>
                                                    </div>
                                                    <span class="product-description">
                                                        Kode Bayar : <?php echo $row[
                                                            "kd_bayar_baju"
                                                        ]; ?>
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                            <?php }
                            } else {
                                echo "<div class='card-body p-4 text-center'>\n                        <div class='callout callout-danger'>\n              <h5><i class='fas fa-info'></i>&nbsp;Data masih kosong!!</h5>\n              \n            </div></div>";
                            }
                            ?>
                            <div class="card-footer text-center">
                                <a href="index.php?page=bayar-baju" class="uppercase">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Transaksi Pembayaran Antar Jemput Terakhir</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Query -->
                            <?php
                            $query = "SELECT 
                    tbl_pembayaran_antar.id_bayar_antar, tbl_pembayaran_antar.kd_bayar_antar, tbl_pembayaran_antar.id_siswa, 
                    tbl_pembayaran_antar.masa_bulan, tbl_pembayaran_antar.masa_tahun, tbl_pembayaran_antar.jml_bayar, 
                    tbl_pembayaran_antar.tgl_bayar, tbl_pembayaran_antar.ket,tbl_pembayaran_antar.detail,tbl_pembayaran_antar.metode_bayar,
                    tbl_invoice.invoice, tbl_siswa.nama_siswa, tbl_siswa.id_rombel, id_tahun, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, tbl_kelas.nm_kelas, 
                    lib_tingkat.id_tingkat, lib_tajaran.tahun_ajaran, lib_tingkat.tingkat
                    FROM tbl_pembayaran_antar, tbl_siswa, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat, lib_tajaran
                    WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa 
                    AND tbl_pembayaran_antar.kd_bayar_antar = tbl_invoice.kd_bayar
                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                    AND tbl_pembayaran_antar.id_tahun = lib_tajaran.id_tajaran
                    AND tbl_pembayaran_antar.id_tahun = '$id_sem'
                    ORDER BY tgl_bayar DESC LIMIT 10";
                            $result = mysqli_query($connection, $query);
                            $data = mysqli_num_rows($result);
                            if ($data > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <div class="card-body p-0">
                                        <ul class="products-list product-list-in-card pl-2 pr-2">
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="dist/img/bus.png" alt="Product Image" class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-title"><?php echo $row[
                                                        "nama_siswa"
                                                    ]; ?>
                                                        (<?php echo $row[
                                                            "tingkat"
                                                        ]; ?>)
                                                        <span class="badge badge-warning float-right">Rp.
                                                            <?php echo $row[
                                                                "jml_bayar"
                                                            ]; ?></span>
                                                    </div>
                                                    <span class="product-description">
                                                        Kode Bayar : <?php echo $row[
                                                            "kd_bayar_antar"
                                                        ]; ?>
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                            <?php }
                            } else {
                                echo "<div class='card-body p-4 text-center'>\n                        \n                        <div class='callout callout-danger'>\n              <p><i class='fas fa-info'></i>&nbsp;Data masih kosong!!</p>\n              \n            </div></div>";
                            }
                            ?>
                            <div class="card-footer text-center">
                                <a href="index.php?page=bayar-antar" class="uppercase">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
