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

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Laporan Transaksi Antar [ Rombel <?= $rombel; ?>]</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=index.php">Home</a></li>
                        <li class="breadcrumb-item">Data Laporan Transaksi Antar</a></li>
                        <li class="breadcrumb-item active">Rombel <?= $rombel; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content text-xs">
        <div class="container-fluid">
            <div class="card-footer justify-content-between">
                <a href="index.php?page=laporan-antar&act=data_rombel&id=<?= $id_kelas; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="index.php?page=laporan-antar" class="btn btn-warning float-md-right"><i class="fa fa-home"></i> Tingkat</a>
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
                                    <h4 class="text-center"><b>Rekap Pembayaran Transaksi Antar Jemput</b></h4>
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
                                    <div class="col-12 text-sm">
                                        <table id="laporan" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis</th>
                                                    <th>Periode</th>
                                                    <th>Jumlah Bayar</th>
                                                    <th>Tanggal Bayar</th>
                                                    <th>No Invoice</th>
                                                    <th>Met. Bayar</th>
                                                    <th>Ket</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $query = "SELECT 
                                                    tbl_pembayaran_antar.id_bayar_antar, tbl_pembayaran_antar.kd_bayar_antar, b_bayar,tbl_pembayaran_antar.id_siswa, 
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
                                                    AND tbl_pembayaran_antar.id_tahun = '$id_sem' 
                                                    AND tbl_rombel.id_rombel = '{$cid}' 
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
                                                                global $total;
                                                                $jenis = $item['jenis'];
                                                                $jarak = $item['jarak'];
                                                                $harga = $item['biaya']; ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $no; ?></td>
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
                                                                    <td class="text-center">
                                                                        <?php echo $row['metode_bayar'];
                                                                        if ($row['metode_bayar'] == "Transfer") {
                                                                        ?>
                                                                            <a class="btn btn-sm btn-info" href="dist/img/bukti_bayar/<?php echo $row['b_bayar']; ?>" data-toggle="lightbox" data-title="Bukti Transfer">
                                                                                <i class="fas fa-eye" title="Bukti Transfer"></i></a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td><?php echo $row['ket']; ?></td>
                                                                </tr>
                                                                <?php $no++; ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right text-sm"><b>Jumlah Total:</b></td>
                                                    <?php
                                                    $querytotal = "SELECT id_bayar_antar, kd_bayar_antar, tbl_siswa.nama_siswa, tbl_pembayaran_antar.id_siswa, tbl_pembayaran_antar.metode_bayar, b_bayar, jml_bayar, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                                                    tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat, SUM(jml_bayar) as total
                                                    FROM tbl_pembayaran_antar, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                                                    WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa 
                                                    AND tbl_pembayaran_antar.id_tahun = lib_tajaran.id_tajaran 
                                                    AND tbl_pembayaran_antar.kd_bayar_antar = tbl_invoice.kd_bayar
                                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                    AND tbl_pembayaran_antar.id_tahun = '{$id_sem}' 
                                                    AND tbl_rombel.id_rombel = '{$cid}'
                                                    AND tbl_pembayaran_antar.ket = 'Lunas'";
                                                    $resulttotal = mysqli_query($connection, $querytotal);
                                                    $row = mysqli_fetch_assoc($resulttotal);
                                                    ?>
                                                    <td class="text-center">Rp. <?php echo $row['total']; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-12">
                                        <a onclick="JavaScript:window.location.href='index.php?page=laporan-antar&act=cetak-antar&id=<?= $cid; ?>';" type="button" class="btn btn-default float-right" style="margin-right: 5px">
                                            <i class="fas fa-print"></i> Print
                                        </a>
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