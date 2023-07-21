<?php
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if (empty($bgp)) {
    header("Location:../../login.php");
} elseif ($bgp == 'index.php?page=') {
    header("Location:../../login.php");
} else {
    if ($level != 'admin') {
        echo "<script type='text/javascript'>
		Swal.fire({
			position: 'center',
			icon: 'error',
			title: 'Halaman tidak dapat diakses, <br> login sebagai administrator untuk mengakses halaman ini!',
			type: 'error',
			showConfirmButton: false,
			timer: 3200
			});
			window.setTimeout(function(){ 
				window.location.replace('index.php');
				} ,3000); 
				</script>";
    } else {

        $sid = isset($_GET['id']) ? $_GET['id'] : '';
        $cid = inject_checker($connection, $sid);
        $qedit = "SELECT id_bayar_baju, tbl_invoice.invoice, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_siswa.nama_wali, tbl_pembayaran_baju.id_siswa,tbl_pembayaran_baju.metode_bayar, jumlah_byr, jml_dibyarkan, tgl_bayar, ket, tbl_rombel.id_rombel, 
                tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat  
        FROM tbl_pembayaran_baju, tbl_siswa, tbl_rombel ,tbl_kelas, lib_tingkat, tbl_invoice
        WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa AND tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat 
        AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar AND kd_bayar_baju = '{$cid}'";
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
            $no_invoice = $e['invoice'];
            $metode_bayar = $e['metode_bayar'];
            $jml_dibyarkan = $e['jml_dibyarkan'];
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
                                            <img src="dist/img/al-azhar.png" width="80px"></img>KOPERASI YAYASAN ISLAM Al-AZHAR SRIWIJAYA
                                            <?php $tg = date("Y-m-d");
                                            $tgl_ui = tanggal_indo($tg); ?>
                                            <small class="float-right text-sm">
                                        No. Invoice : <b><?php echo $no_invoice; ?></b><br />
                                        <br /><b>Tanggal Cetak Invoice:<br/></b>Palembang, <?php echo $tgl_ui ?></small>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <p class="text-xs">JL. Beringin II, Blok F-32, Jakabaring, 15 Ulu,<br />
                                            Kecamatan Seberang Ulu I, Kota Palembang,<br />
                                            Sumatera Selatan 30267</p>
                                            <p class="text-xs">Phone : <b>0711 753 9661</b> <br />
                                            Email : <b>alazharsriwijaya@gmail.com</b> </p>
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <address class="text-sm">
                                            Nama Siswa : <strong><?php echo $ids; ?></strong><br />
                                            Nama Wali : <strong><?php echo $nm_wali; ?></strong><br />
                                            Alamat : <strong><?php echo $alamat; ?></strong><br />
                                            Kelas : <strong><?php echo $kelas; ?></strong><br />
                                            Tingkatan : <strong><?php echo $tingkat; ?></strong><br />
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col text-sm">
                                        Kode Bayar: <b><?php echo $kd_bayar; ?></b><br />
                                        Metode Bayar: <b><?php echo $metode_bayar; ?></b><br/>
                                        Keterangan: <b><?php echo $ket; ?></b><br/>
                                        <?php 
                                        if($ket == 'Belum Lunas'){
                                            $sisa = ($jml - $jml_dibyarkan);
                                        ?>
                                        Sisa Bayar: <b><?php echo $sisa; ?></b><br/>
                                        <?php } ?>
                                        Tanggal Pembayaran: <b><?php $tgl_a = tanggal_indo($e['tgl_bayar']);
                                                                    echo $tgl_a; ?></b><br />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Keterangan</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                /* query alamat */

                                                $qdetail = "SELECT kd_bayar_baju, detail_pembayaran_baju.id_ktgr_baju, tbl_ktgr_baju.nm_baju, tbl_ktgr_baju.jenis_seragam, tbl_ktgr_baju.uk_baju, detail_pembayaran_baju.harga_item as harga FROM detail_pembayaran_baju, tbl_ktgr_baju
                                                WHERE detail_pembayaran_baju.id_ktgr_baju = tbl_ktgr_baju.id_ktgr_baju AND kd_bayar_baju = '{$kd_bayar}'";
                                                $it = mysqli_query($connection, $qdetail);
                                                $detail = mysqli_num_rows($it);
                                                if ($detail > 0) {
                                                    while($item = mysqli_fetch_assoc($it)){

                                                    $nama_baju = $item['nm_baju'];
                                                    $uk_baju = $item['uk_baju'];
                                                    $tipe = $item['jenis_seragam'];
                                                    $harga = $item['harga'];

                                                ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php echo $nama_baju ?></td>
                                                    <td>Rp. <?php echo $harga ?></td>
                                                    <td>
                                                        Tipe <?php echo $tipe ?>, Ukuran <?php echo $uk_baju ?> (<?=$tingkat?>)
                                                    </td>
                                                    <td>Rp. <?php echo $harga ?></td>
                                                </tr>
                                                <?php } }?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><b>Total Bayar :</b></td>
                                                    <td>
                                                        <?php if ($ket == 'Lunas'){?>
                                                        <b>Rp. <?php echo $jml ?></b>
                                                        <?php }else{?>
                                                            <b>Rp. <?php echo $jml_dibyarkan ?></b>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-muted well well-sm shadow-none text-xs" style="margin-top: 2px">
                                            *Barang yang sudah di beli<br/>
                                            tidak dapat ditukar atau dikembalikan.
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <p class="lead text-center"></p><br/>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr></tr>
                                            </table>
                                        </div>
                                        <p class="lead text-center"></p>
                                    </div>
                                    
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">
                                        <p class="lead text-center"></p><br/>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr></tr>
                                            </table>
                                        </div>
                                        <p class="lead text-center"></p>
                                    </div>
                                </div>

                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="index.php?page=bayar-baju" class="btn btn-danger"><i class="fas fa-arrow-left"></i>
                                            Tutup</a>
                                        <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a> -->
                                        <a onclick="JavaScript:window.location.href='index.php?page=bayar-baju&act=export-pdf&id=<?php echo $kd_bayar; ?>';" type="button" class="btn btn-default float-right" style="margin-right: 5px">
                                            <i class="fas fa-print"></i> Print
                                        </a>
                                        <!-- <a type="button" href='cetak-baju.php?id=<?php echo $kd_bayar; ?>' target="_blank" class="btn btn-primary float-right" style="margin-right: 5px">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else {
            echo '<meta http-equiv="refresh" content="0;url=index.php?page=bayar-baju">';
        } ?>
<?php }
} ?>