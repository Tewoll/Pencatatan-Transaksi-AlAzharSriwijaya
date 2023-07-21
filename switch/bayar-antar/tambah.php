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

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pembayaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?page=bayar-antar">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Tambah Data Pembayaran</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<br>
<form method="POST" class="form-horizontal" action="index.php?page=bayar-antar&act=proses&data=tambah" id="form1"
    name="tambah" enctype="multipart/form-data">
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-9 col-lg-12">
                        <div class="card mb-4">
                            <div class="modal-header">
                                <h4 class="modal-title m-0 font-weight-bold text-primary float-md-left">Isi Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="helperText">Nama Siswa<span class="text-danger">&nbsp;*</span></label>
                                    <select class="form-control select2" id="postName" name="siswa"
                                        tabindex="-1"></select>
                                    <p><small class="text-muted"><i>Pilih siswa.</i></small></p>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Bayar<span class="text-danger">&nbsp;*</span></label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        <input type="text" name="tgl_bayar" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" data-toggle="datetimepicker" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Masa Periode Antar Jemput<span class="text-danger">&nbsp;*</span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control select2" name="masa_bulan" tabindex="-1">
                                                <option disabled selected> Pilih Bulan</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="masa_tahun"
                                                class="form-control datetimepicker-input" id="reservationdatetahun"
                                                data-target="#reservationdatetahun" data-toggle="datetimepicker"
                                                required placeholder="Pilih Tahun">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kategori Antar Jemput<span class="text-danger">&nbsp;*</span></label>
                                    <select class="custom-select form-control-border" name="antar" tabindex="-1">
                                        <?php
                                                $query = "SELECT id_ktgr_antar, jenis, jarak, id_type_pemb, biaya FROM tbl_ktgr_antar";
                                                $result = $connection->query($query);
                                                if (!$result) {
                                                    printf("Errormessage: %s\n", $konek->error);
                                                }
                                                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                                ?>
                                        <option value="<?= $data['id_ktgr_antar'] ?>"><?= $data['jenis'] ?> - Untuk
                                            Jarak Maks <?= $data['jarak'] ?> Km, (Rp. <?= $data['biaya'] ?>)</option>
                                        <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                                <!-- <div class="row" id=detail>
                                        </div> -->

                                <div class="paste-new-forms"></div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="helperText">Metode Pembayaran<span class="text-danger">&nbsp;*</span></label>

                                            <select class="form-control select2" id="example" name="metode" tabindex="-1">
                                                <option disabled> Pilih Metode Pembayaran</option>
                                                <option value="Tunai">Tunai</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6" id="textbox" style="display:none;">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Bukti Transfer<span class="text-danger">&nbsp;*<span class="small d-inline-block"><i>Abaikan jika metode pembayaran Tunai</i></span></span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="b_bayar">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="helperText">Detail Antar Jemput<span class="text-danger">&nbsp;*</span></label>
                                    <textarea class="form-control" rows="3" name="detail" placeholder="Masukkan detail antar"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="helperText">Keterangan<span class="text-danger">&nbsp;*</span></label><br />
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="tombolLunas" id="lunasTidak" value="Lunas">
                                        <label for="lunasTidak" class="custom-control-label mr-5">Lunas</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="tombolLunas" id="lunasYa" value="Belum Lunas">
                                        <label for="lunasYa" class="custom-control-label">Belum Lunas</label>
                                    </div>
                                </div>
                                <div class="hiden">
                                    <div class="form-group">
                                        <label>Jumlah yang dibayarkan</label>
                                        <input type="text" id="rupiah" class="form-control form-control-border" name="jml_dibyarkan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-12 fixed">
                        <div class="card mb-3">
                            <div class="card-header py-12">
                                <h2 class="h6 m-0 font-weight-bold text-primary">Pengaturan</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <a class="btn btn-danger btn-submit" data-toggle="modal"
                                        data-target="#modal-kembali">Batal</a>
                                    <a class="btn btn-primary btn-submit float-md-right" data-toggle="modal"
                                        data-target="#modal-simpan"> Input Pembayaran</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-simpan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apa anda yakin akan menyimpan data pembayaran ?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default btn-sm"
                                        data-dismiss="modal">Batal</button>
                                    <input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan"
                                        value="Simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-kembali">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apa anda yakin membatalkan proses input data ?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default btn-sm"
                                        data-dismiss="modal">Tutup</button>
                                    <a href="index.php?page=bayar-antar"
                                        class="btn btn-primary btn-sm float-md-right">Ya, batalkan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php }
} ?>