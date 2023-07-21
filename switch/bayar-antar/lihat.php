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

        $qedit = "SELECT 
        tbl_pembayaran_antar.id_bayar_antar as id_bayar, 
        tbl_pembayaran_antar.kd_bayar_antar as kode_bayar, 
        tbl_pembayaran_antar.jml_bayar as bayar, 
        tbl_pembayaran_antar.metode_bayar as metode, 
        tbl_pembayaran_antar.tgl_bayar as tanggal, 
        tbl_pembayaran_antar.ket as ket,
        tbl_pembayaran_antar.masa_bulan as bulan,  
        tbl_pembayaran_antar.masa_tahun as tahun,
        jml_dibyarkan,  
        tbl_siswa.nama_siswa as siswa, 
        tbl_siswa.nama_wali as wali, 
        tbl_siswa.alamat as alamat ,
        tbl_rombel.id_rombel as id_rombel, 
        tbl_rombel.nm_rombel as rombel, 
        tbl_kelas.nm_kelas as kelas, 
        tbl_kelas.id_tingkat as id_tingkat, 
        lib_tingkat.tingkat as tingkat 
        FROM tbl_pembayaran_antar, tbl_siswa, tbl_rombel ,tbl_kelas, lib_tingkat
        WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa AND tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas 
        AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND kd_bayar_antar = '{$cid}'";
        $red = mysqli_query($connection, $qedit);
        $ed = mysqli_num_rows($red);
        if ($ed > 0) {
            $e = mysqli_fetch_assoc($red);
            $id_bayar = $e['id_bayar'];
            $kode_bayar = $e['kode_bayar'];
            $siswa = $e['siswa'];
            $bayar = $e['bayar'];
            $tanggal = $e['tanggal'];
            $ket = $e['ket'];
            $siswa = $e['siswa'];
            $wali =  $e['wali'];
            $alamat = $e['alamat'];
            $id_rombel = $e['id_rombel'];
            $rombel = $e['rombel'];
            $kelas = $e['kelas'];
            $id_tingkat = $e['id_tingkat'];
            $tingkat = $e['tingkat'];
            $bulan = $e['bulan'];
            $tahun = $e['tahun'];
            $metode = $e['metode'];
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
                                                <?php
                                                $query = mysqli_query($connection, "SELECT invoice FROM tbl_invoice WHERE kd_bayar = '{$sid}'");
                                                $hasil = mysqli_fetch_array($query);
                                                $no_invoice = $hasil['invoice'];
                                                ?>
                                                No. Invoice : <b><?php echo $no_invoice; ?></b><br />
                                                <br /><b>Tanggal Cetak Invoice:<br /></b>Palembang, <?php echo $tgl_ui ?></small>
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
                                            Nama Siswa : <strong><?php echo $siswa; ?></strong><br />
                                            Nama Wali : <strong><?php echo $wali; ?></strong><br />
                                            Alamat : <strong><?php echo $alamat; ?></strong><br />
                                            Kelas : <strong><?php echo $kelas; ?></strong><br />
                                            Tingkatan : <strong><?php echo $tingkat; ?></strong><br />
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col text-sm">
                                        Kode Bayar: <b><?php echo $kode_bayar; ?></b><br />
                                        Masa Periode: <b><?php echo $bulan;?> <?php echo $tahun; ?></b><br/>
                                        Tanggal Pembayaran: <b><?php $tgl_a = tanggal_indo($e['tanggal']); echo $tgl_a; ?></b><br />
                                        Metode Bayar: <b><?php echo $metode; ?></b><br />
                                        Keterangan: <b><?php echo $ket; ?></b><br/>
                                        <?php 
                                        if($ket == 'Belum Lunas'){
                                            $sisa = ($bayar - $jml_dibyarkan);
                                        ?>
                                        Sisa Bayar: <b><?php echo $sisa; ?></b>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Jenis Kategori Antar Jemput</th>
                                                    <th>Jarak Maksimal</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $qdetail = "SELECT kd_bayar_antar, detail_pembayaran_antar.id_ktgr_antar, tbl_ktgr_antar.jenis, tbl_ktgr_antar.jarak, detail_pembayaran_antar.harga_item as biaya FROM detail_pembayaran_antar, tbl_ktgr_antar
                                                WHERE detail_pembayaran_antar.id_ktgr_antar = tbl_ktgr_antar.id_ktgr_antar AND kd_bayar_antar = '{$kode_bayar}'";
                                                $it = mysqli_query($connection, $qdetail);
                                                $detail = mysqli_num_rows($it);
                                                // var_dump($detail);
                                                // die();
                                                if ($detail > 0) {
                                                    while ($item = mysqli_fetch_assoc($it)) {

                                                        $jenis = $item['jenis'];
                                                        $jarak = $item['jarak'];
                                                        $harga = $item['biaya'];

                                                ?>
                                                <tr>
                                                    <td>1</td>
                                                    <?php
                                                    if ($jenis == "P") {?>
                                                    <td><?php echo 'Pergi Saja'; ?></td>
                                                    <?php
                                                    } else {?>
                                                    <td><?php echo 'Pulang Pergi'; ?></td>
                                                    <?php
                                                    } ?>
                                                    <td><?php echo $jarak ?> Km</td>
                                                    <td>Rp. <?php echo $harga ?></td>
                                                </tr>
                                                <?php }
                                                } ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right"><b>Total Bayar :</b></td>
                                                    <td>
                                                        <?php if ($ket == 'Lunas'){?>
                                                        <b>Rp. <?php echo $bayar ?></b>
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
                                            *Barang yang sudah di beli<br />
                                            tidak dapat ditukar atau dikembalikan.
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <p class="lead text-center"></p><br />
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
                                        <p class="lead text-center"></p><br />
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
                                        <a href="index.php?page=bayar-antar" class="btn btn-danger"><i class="fas fa-arrow-left"></i>
                                            Tutup</a>
                                        <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a> -->
                                        <a onclick="JavaScript:window.location.href='index.php?page=bayar-antar&act=export-pdf&id=<?php echo $kode_bayar; ?>';" type="button" class="btn btn-default float-right" style="margin-right: 5px">
                                            <i class="fas fa-print"></i> Print
                                        </a>
                                        <!-- <a type="button" href='cetak-antar.php?id=<?php echo $kode_bayar; ?>' target="_blank" class="btn btn-primary float-right" style="margin-right: 5px">
                                            <i class="fas fa-download"></i> Generate PDF -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else {
            echo '<meta http-equiv="refresh" content="0;url=index.php?page=bayar-antar">';
        } ?>
<?php }
} ?>