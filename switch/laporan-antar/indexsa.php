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
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-sm-xs"><b>Laporan Pembayaran Antar Jemput</b></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-tk-tab" data-toggle="pill"
                                    href="#custom-tabs-three-tk" role="tab" aria-controls="custom-tabs-three-tk"
                                    aria-selected="true">TK</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-sd-tab" data-toggle="pill"
                                    href="#custom-tabs-three-sd" role="tab" aria-controls="custom-tabs-three-sd"
                                    aria-selected="false">SD</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-smp-tab" data-toggle="pill"
                                    href="#custom-tabs-three-smp" role="tab" aria-controls="custom-tabs-three-smp"
                                    aria-selected="false">SMP</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            
                            <div class="tab-pane fade show active" id="custom-tabs-three-tk" role="tabpanel"
                                aria-labelledby="custom-tabs-three-tk-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="text-center"><b>Rekap Pembayaran Antar-Jemput TK Tahun Ajaran
                                                        <?php echo "$tahun_ajaran"; ?></b></div>
                                            </div>
                                            <div class="card-body text-xs">
                                                <table id="laporansd" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Kelas</th>
                                                            <th>Jenis</th>
                                                            <th>Periode</th>
                                                            <th>Jumlah Bayar Bayar</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>No Invoice</th>
                                                            <th>Detail</th>
                                                            <th>Met. Bayar</th>
                                                            <th>Ket</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $no = 1;
                                                        $query = "SELECT 
                                                    tbl_pembayaran_antar.id_bayar_antar, tbl_pembayaran_antar.kd_bayar_antar, tbl_pembayaran_antar.id_siswa, 
                                                    tbl_pembayaran_antar.masa_bulan, tbl_pembayaran_antar.masa_tahun, tbl_pembayaran_antar.jml_bayar, 
                                                    tbl_pembayaran_antar.tgl_bayar, tbl_pembayaran_antar.ket,tbl_pembayaran_antar.detail,tbl_pembayaran_antar.metode_bayar,
                                                    tbl_invoice.invoice, tbl_siswa.nama_siswa, tbl_siswa.id_rombel, id_tahun, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, tbl_kelas.nm_kelas, 
                                                    lib_tingkat.id_tingkat, lib_tajaran.tahun_ajaran
                                                    FROM tbl_pembayaran_antar, tbl_siswa, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat, lib_tajaran
                                                    WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa 
                                                    AND tbl_pembayaran_antar.kd_bayar_antar = tbl_invoice.kd_bayar
                                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                    AND tbl_pembayaran_antar.id_tahun = lib_tajaran.id_tajaran
                                                    AND tbl_kelas.id_tingkat = '1'
                                                    AND tbl_pembayaran_antar.id_tahun = '$id_sem'
                                                    ORDER BY tgl_bayar DESC";
                                                        $result = mysqli_query($connection, $query);
                                                        $data = mysqli_num_rows($result);
                                                        if ($data > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $kd_bay = $row['kd_bayar_antar'];

                                                                $qdetail = "SELECT kd_bayar_antar, detail_pembayaran_antar.id_ktgr_antar, tbl_ktgr_antar.jenis, tbl_ktgr_antar.jarak, detail_pembayaran_antar.harga_item as biaya FROM detail_pembayaran_antar, tbl_ktgr_antar
                                                            WHERE detail_pembayaran_antar.id_ktgr_antar = tbl_ktgr_antar.id_ktgr_antar AND kd_bayar_antar = '$kd_bay'";
                                                                $it = mysqli_query($connection, $qdetail);
                                                                $detail = mysqli_num_rows($it);
                                                                if ($detail > 0) {
                                                                    while ($item = mysqli_fetch_assoc($it)) {

                                                                        $jenis = $item['jenis'];
                                                                        $jarak = $item['jarak'];
                                                                        $harga = $item['biaya'];

                                                        ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $row['nama_siswa']; ?></td>
                                                            <td><?php echo $row['nm_kelas']; ?></td>
                                                            <td><?php echo $jenis; ?> ( Maks. <?php echo $jarak; ?> Km)
                                                            </td>
                                                            <td><?php echo $row['masa_bulan']; ?>
                                                                <?php echo $row['masa_tahun']; ?></td>
                                                            <td>Rp. <?php echo $row['jml_bayar']; ?></td>
                                                            <td><?php
                                                            $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                            echo $tgl_a; ?></td>
                                                            <td><?php echo $row['invoice']; ?></td>
                                                            <td><?php echo $row['detail']; ?></td>
                                                            <td><?php echo $row['metode_bayar']; ?></td>
                                                            <td><?php echo $row['ket']; ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                                        $no++;
                                                                    }
                                                                }
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-sd" role="tabpanel"
                                aria-labelledby="custom-tabs-three-sd-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="text-center"><b>Rekap Pembayaran Seragam SD Tahun Ajaran
                                                        <?php echo "$tahun_ajaran"; ?></b></div>
                                            </div>
                                            <div class="card-body text-xs">
                                                <table id="laporansd" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Kelas</th>
                                                            <th>Jenis</th>
                                                            <th>Periode</th>
                                                            <th>Jumlah Bayar Bayar</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>No Invoice</th>
                                                            <th>Detail</th>
                                                            <th>Met. Bayar</th>
                                                            <th>Ket</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $no = 1;
                                                        $query = "SELECT 
                                                    tbl_pembayaran_antar.id_bayar_antar, tbl_pembayaran_antar.kd_bayar_antar, tbl_pembayaran_antar.id_siswa, 
                                                    tbl_pembayaran_antar.masa_bulan, tbl_pembayaran_antar.masa_tahun, tbl_pembayaran_antar.jml_bayar, 
                                                    tbl_pembayaran_antar.tgl_bayar, tbl_pembayaran_antar.ket,tbl_pembayaran_antar.detail,tbl_pembayaran_antar.metode_bayar,
                                                    tbl_invoice.invoice, tbl_siswa.nama_siswa, tbl_siswa.id_rombel, id_tahun,
                                                    tbl_rombel.id_kelas,
                                                    tbl_kelas.id_tingkat,
                                                    tbl_kelas.nm_kelas, 
                                                    lib_tingkat.id_tingkat, lib_tajaran.tahun_ajaran
                                                    FROM tbl_pembayaran_antar, tbl_siswa, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat, lib_tajaran
                                                    WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa 
                                                    AND tbl_pembayaran_antar.kd_bayar_antar = tbl_invoice.kd_bayar
                                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                    AND tbl_pembayaran_antar.id_tahun = lib_tajaran.id_tajaran
                                                    AND tbl_kelas.id_tingkat = '2'
                                                    AND tbl_pembayaran_antar.id_tahun = '$id_sem'
                                                    ORDER BY tgl_bayar ASC";
                                                        $result = mysqli_query($connection, $query);
                                                        $data = mysqli_num_rows($result);
                                                        if ($data > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $kd_bay = $row['kd_bayar_antar'];

                                                                $qdetail = "SELECT kd_bayar_antar, detail_pembayaran_antar.id_ktgr_antar, tbl_ktgr_antar.jenis, tbl_ktgr_antar.jarak, detail_pembayaran_antar.harga_item as biaya FROM detail_pembayaran_antar, tbl_ktgr_antar
                                                            WHERE detail_pembayaran_antar.id_ktgr_antar = tbl_ktgr_antar.id_ktgr_antar AND kd_bayar_antar = '$kd_bay'";
                                                                $it = mysqli_query($connection, $qdetail);
                                                                $detail = mysqli_num_rows($it);
                                                                if ($detail > 0) {
                                                                    while ($item = mysqli_fetch_assoc($it)) {

                                                                        $jenis = $item['jenis'];
                                                                        $jarak = $item['jarak'];
                                                                        $harga = $item['biaya'];

                                                        ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $row['nama_siswa']; ?></td>
                                                            <td><?php echo $row['nm_kelas']; ?></td>
                                                            <td><?php echo $jenis; ?> ( Maks. <?php echo $jarak; ?> Km)
                                                            </td>
                                                            <td><?php echo $row['masa_bulan']; ?>
                                                                <?php echo $row['masa_tahun']; ?></td>
                                                            <td>Rp. <?php echo $row['jml_bayar']; ?></td>
                                                            <td><?php
                                                            $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                            echo $tgl_a; ?></td>
                                                            <td><?php echo $row['invoice']; ?></td>
                                                            <td><?php echo $row['detail']; ?></td>
                                                            <td><?php echo $row['metode_bayar']; ?></td>
                                                            <td><?php echo $row['ket']; ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                                        $no++;
                                                                    }
                                                                }
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-smp" role="tabpanel"
                                aria-labelledby="custom-tabs-three-smp-tab">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="text-center"><b>Rekap Pembayaran Seragam SMP Tahun Ajaran
                                                        <?php echo "$tahun_ajaran"; ?></b></div>
                                            </div>
                                            <div class="card-body text-xs">
                                                <table id="laporansmp" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">No</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Kelas</th>
                                                            <th>Jenis</th>
                                                            <th>Periode</th>
                                                            <th>Jumlah Bayar Bayar</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>No Invoice</th>
                                                            <th>Detail</th>
                                                            <th>Met. Bayar</th>
                                                            <th>Ket</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $no = 1;
                                                        $query = "SELECT 
                                                    tbl_pembayaran_antar.id_bayar_antar, tbl_pembayaran_antar.kd_bayar_antar, tbl_pembayaran_antar.id_siswa, 
                                                    tbl_pembayaran_antar.masa_bulan, tbl_pembayaran_antar.masa_tahun, tbl_pembayaran_antar.jml_bayar, 
                                                    tbl_pembayaran_antar.tgl_bayar, tbl_pembayaran_antar.ket,tbl_pembayaran_antar.detail,tbl_pembayaran_antar.metode_bayar,
                                                    tbl_invoice.invoice, tbl_siswa.nama_siswa, tbl_siswa.id_rombel, id_tahun,
                                                    tbl_rombel.id_kelas,
                                                    tbl_kelas.id_tingkat,
                                                    tbl_kelas.nm_kelas, 
                                                    lib_tingkat.id_tingkat, lib_tajaran.tahun_ajaran
                                                    FROM tbl_pembayaran_antar, tbl_siswa, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat, lib_tajaran
                                                    WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa 
                                                    AND tbl_pembayaran_antar.kd_bayar_antar = tbl_invoice.kd_bayar
                                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                    AND tbl_pembayaran_antar.id_tahun = lib_tajaran.id_tajaran
                                                    AND tbl_kelas.id_tingkat = '3'
                                                    AND tbl_pembayaran_antar.id_tahun = '$id_sem'
                                                    ORDER BY tgl_bayar ASC";
                                                        $result = mysqli_query($connection, $query);
                                                        $data = mysqli_num_rows($result);
                                                        if ($data > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $kd_bay = $row['kd_bayar_antar'];

                                                                $qdetail = "SELECT kd_bayar_antar, detail_pembayaran_antar.id_ktgr_antar, tbl_ktgr_antar.jenis, tbl_ktgr_antar.jarak, detail_pembayaran_antar.harga_item as biaya FROM detail_pembayaran_antar, tbl_ktgr_antar
                                                            WHERE detail_pembayaran_antar.id_ktgr_antar = tbl_ktgr_antar.id_ktgr_antar AND kd_bayar_antar = '$kd_bay'";
                                                                $it = mysqli_query($connection, $qdetail);
                                                                $detail = mysqli_num_rows($it);
                                                                if ($detail > 0) {
                                                                    while ($item = mysqli_fetch_assoc($it)) {

                                                                        $jenis = $item['jenis'];
                                                                        $jarak = $item['jarak'];
                                                                        $harga = $item['biaya'];

                                                        ?>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $row['nama_siswa']; ?></td>
                                                            <td><?php echo $row['nm_kelas']; ?></td>
                                                            <td><?php echo $jenis; ?> ( Maks. <?php echo $jarak; ?> Km)
                                                            </td>
                                                            <td><?php echo $row['masa_bulan']; ?>
                                                                <?php echo $row['masa_tahun']; ?></td>
                                                            <td>Rp. <?php echo $row['jml_bayar']; ?></td>
                                                            <td><?php
                                                            $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                            echo $tgl_a; ?></td>
                                                            <td><?php echo $row['invoice']; ?></td>
                                                            <td><?php echo $row['detail']; ?></td>
                                                            <td><?php echo $row['metode_bayar']; ?></td>
                                                            <td><?php echo $row['ket']; ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                                        $no++;
                                                                    }
                                                                }
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
