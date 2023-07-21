<?php
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if (empty($bgp)) {
    header("Location:../../login.php");
} elseif ($bgp == 'index.php?page=') {
    header("Location:../../login.php");
} else {

    $sid = isset($_GET['id']) ? $_GET['id'] : '';
    $cid = inject_checker($connection, $sid);

    $qdata = "SELECT * FROM tbl_rombel WHERE id_rombel = '{$cid}'";
    $red = mysqli_query($connection, $qdata);
    $e = mysqli_fetch_assoc($red);
    $rombel = $e['nm_rombel'];
    $id_kelas = $e['id_kelas'];

    $qdatak = "SELECT * FROM tbl_kelas WHERE id_kelas = '{$id_kelas}'";
    $redk = mysqli_query($connection, $qdatak);
    $ek = mysqli_fetch_assoc($redk);
    $nm_kelas = $ek['nm_kelas'];
    $id_tingkat = $ek['id_tingkat'];


    $qdatat = "SELECT * FROM lib_tingkat WHERE id_tingkat = '{$id_tingkat}'";
    $redt = mysqli_query($connection, $qdatat);
    $et = mysqli_fetch_assoc($redt);
    $tingkat = $et['tingkat'];

?>

    <div class="content-header no-print">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan Transaksi Baju [ Rombel <?= $rombel; ?>]</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=index.php">Home</a></li>
                        <li class="breadcrumb-item">Data Laporan Transaksi Baju</a></li>
                        <li class="breadcrumb-item active">Rombel <?= $rombel; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card-footer justify-content-between no-print">
                <a href="index.php?page=laporan-baju&act=lihat_data&id=<?= $cid; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="index.php?page=laporan-baju" class="btn btn-warning float-md-right"><i class="fa fa-home"></i>
                    Tingkat</a>
            </div>
            <br />
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-info">

                        <div class="card-header">
                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <img src="dist/img/al-azhar.png" width="80px"></img>KOPERASI YAYASAN ISLAM Al-AZHAR SRIWIJAYA
                                            <?php $tg = date("Y-m-d");
                                            $tgl_ui = tanggal_indo($tg); ?>
                                            <small class="float-right text-sm">
                                                <br /><b>Tanggal Cetak :<br /></b>Palembang, <?php echo $tgl_ui ?></small>
                                        </h4>
                                    </div>
                                </div>
                                <div class="card-header mb-2">
                                    <h4 class="text-center"><b>Rekap Pembayaran Transaksi Baju / Seragam</b></h4>
                                </div>

                                <div class="row invoice-info">
                                    <div class="col-12 invoice-col">
                                        <h6>Rombel : <b><?= $rombel; ?></b></h6>
                                        <h6>Kelas : <b><?= $nm_kelas; ?></b></h6>
                                        <h6>Tingkat : <b><?= $tingkat; ?></b></h6>
                                        <h6>Tahun Ajaran : <b><?= $tahun_ajaran; ?></b></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-striped table-responsive">
                                            <thead>
                                                <tr class="text-center text-sm">
                                                    <th style="width: 3%">No</th>
                                                    <th>Siswa</th>
                                                    <th>Tgl. Bayar</th>
                                                    <th>Invoice</th>
                                                    <th>Metode</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Ket</th>
                                                    <th style="width: 15%;">Jml. Bayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // echo $cid;
                                                // echo $id_sem;
                                                $no = 1;
                                                $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_pembayaran_baju.id_siswa, tbl_pembayaran_baju.metode_bayar, b_bayar, jumlah_byr, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                                                    tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat
                                                    FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                                                    WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                                                    AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                                                    AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                    AND tbl_pembayaran_baju.id_tahun = '{$id_sem}' 
                                                    AND tbl_rombel.id_rombel = '{$cid}' 
                                                    AND tbl_pembayaran_baju.ket = 'Lunas'
                                                    ORDER BY tgl_bayar ASC";
                                                $result = mysqli_query($connection, $query);
                                                $data = mysqli_num_rows($result);
                                                if ($data > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr class="text-sm">
                                                            <td class="text-center"><?php echo $no; ?></td>
                                                            <td><?php echo $row['nama_siswa']; ?></td>
                                                            <td class="text-center"><?php $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                                                    echo $tgl_a; ?></td>
                                                            <td class="text-center"><?php echo $row['invoice']; ?></td>
                                                            <td class="text-center" class="text-center">
                                                                <?php echo $row['metode_bayar']; ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $row['tahun_ajaran']; ?></td>
                                                            <td class="text-center"><?php echo $row['ket']; ?></td>
                                                            <td class="text-center">Rp. <?php echo $row['jumlah_byr']; ?></td>

                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                <?php } ?>

                                                <tr>
                                                    <td colspan="7" class="text-right"><b>JUMLAH :</b></td>
                                                    <?php

                                                    $querytotal = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_pembayaran_baju.id_siswa, tbl_pembayaran_baju.metode_bayar, b_bayar, jumlah_byr, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                                                    tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat, SUM(jumlah_byr) as total
                                                    FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                                                    WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                                                    AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                                                    AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                    AND tbl_pembayaran_baju.id_tahun = '{$id_sem}' 
                                                    AND tbl_rombel.id_rombel = '{$cid}'
                                                    AND tbl_pembayaran_baju.ket = 'Lunas'";
                                                    $resulttotal = mysqli_query($connection, $querytotal);
                                                    $row = mysqli_fetch_assoc($resulttotal);
                                                    ?>
                                                    <td class="text-center">Rp. <?php echo $row['total']; ?></td>
                                                </tr>
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
    </section>

<?php } ?>
<script>
    window.addEventListener("load", window.print());
</script>