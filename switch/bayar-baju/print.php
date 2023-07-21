<?php
$sid = isset($_GET['id']) ? $_GET['id'] : '';
$cid = inject_checker($connection, $sid);
$qedit = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_siswa.nama_wali, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, ket, tbl_rombel.id_rombel, 
        tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat  
FROM tbl_pembayaran_baju, tbl_siswa, tbl_rombel ,tbl_kelas, lib_tingkat
WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa AND tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND kd_bayar_baju = '{$cid}'";
$red = mysqli_query($connection, $qedit);
$ed = mysqli_num_rows($red);
if ($ed > 0) {
    $e = mysqli_fetch_assoc($red);
    $ids = $e['nama_siswa'];
    $nm_wali = $e['nama_wali'];
    $kd_bayar = $e['kd_bayar_baju'];
    $jml = $e['jumlah_byr'];
    $alamat = $e['alamat'];
    $tgl = $e['tgl_bayar'];
    $kelas = $e['nm_kelas'];
    $ket = $e['ket'];
    $tingkat = $e['tingkat'];
    /* query alamat */

    $qdetail = "SELECT kd_bayar_baju, detail_pembayaran_baju.id_ktgr_baju, tbl_ktgr_baju.nm_baju, tbl_ktgr_baju.harga FROM detail_pembayaran_baju, tbl_ktgr_baju
    WHERE detail_pembayaran_baju.id_ktgr_baju = tbl_ktgr_baju.id_ktgr_baju AND kd_bayar_baju = '{$kd_bayar}'";
    $it = mysqli_query($connection, $qdetail);
    $detail = mysqli_num_rows($it);
    if ($detail > 0) {
        $item =mysqli_fetch_assoc($it);

        $nama_baju = $item['nm_baju'];
        $harga = $item['harga'];
    }
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kwitansi Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kwitansi Pembayaran</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="dist/img/al-azhar.png" width="50px"></img> YAYASAN Al-AZHAR SRIWIJAYA
                                <?php $tg = date("Y-m-d"); $tgl_ui = tanggal_indo($tg);?>
                                <small class="float-right"><b>Tanggal Invoice:</b> <?php echo $tgl_ui?></small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Admin</strong><br />
                                <!-- 795 Folsom Ave, Suite 600<br />
                                            San Francisco, CA 94107<br />
                                            Phone: (804) 123-5432<br />
                                            Email: info@almasaeedstudio.com -->
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?php echo $ids;?></strong><br />
                                <b>Nama Wali Siswa: </b><?php echo $nm_wali;?><br />
                                <b>Alamat: </b><?php echo $alamat;?><br />
                                <b>Tingkatan: </b><?php echo $tingkat;?><br />
                                <b>Kelas: </b><?php echo $kelas;?><br />
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br />
                            <br />
                            <b>Kode Bayar:</b> <?php echo $kd_bayar;?><br />
                            <b>Tanggal Pembayaran:</b> <?php $tgl_a = tanggal_indo($e['tgl_bayar']);
                                        echo $tgl_a;?><br />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Nama Seragam</th>
                                        <th>Harga</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $nama_baju?></td>
                                        <td>Rp. <?php echo $harga?></td>
                                        <td>
                                            El snort testosterone trophy driving gloves
                                            handsome
                                        </td>
                                        <td>Rp. <?php echo $harga?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- <p class="lead">Payment Methods:</p>
                                        <img src="../../dist/img/credit/visa.png" alt="Visa" />
                                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard" />
                                        <img src="../../dist/img/credit/american-express.png" alt="American Express" />
                                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal" />

                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy
                                            zoodles, weebly ning heekya handango imeem plugg dopplr
                                            jibjab, movity jajah plickers sifteo edmodo ifttt
                                            zimbra.
                                        </p> -->
                        </div>
                        <div class="col-6">
                            <p class="lead">Amount Due 2/22/2014</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Total:</th>
                                        <td>$265.24</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row no-print">
                        <div class="col-12">
                            <a href="index.php?page=bayar-baju" class="btn btn-danger"><i class="fas fa-arrow-left"></i>
                                Tutup</a>
                            <a href="invoice-print.html" rel="noopener" target="_blank"
                                class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                            <button
                                onclick="JavaScript:window.location.href='index.php?page=bayar-baju&act=export-pdf&id=<?php echo $kd_bayar; ?>';"
                                type="button" class="btn btn-primary float-right" style="margin-right: 5px">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
} 

?>
<script>
    window.print();
</script>