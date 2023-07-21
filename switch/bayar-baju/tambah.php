<?php
$baca = "index.php?page=";
$bgp = isset($_GET["page"]) ? $_GET["page"] : "";
if (empty($bgp)) {
	header("Location:../../login.php");
} elseif ($bgp == "index.php?page=") {
	header("Location:../../login.php");
} else {
	if ($level != "admin") {
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
							<li class="breadcrumb-item"><a href="index.php?page=bayar-baju">Pembayaran</a></li>
							<li class="breadcrumb-item active">Tambah Data Pembayaran</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<br>
		<form method="POST" class="form-horizontal" action="index.php?page=bayar-baju&act=proses&data=tambah" id="form1" name="tambah" enctype="multipart/form-data">
			<section class="content">
				<div class="container-fluid">
					<div class="col-12">
						<div class="row">
							<div class="col-xl-9 col-lg-12">
								<div class="card mb-4">
									<div class="modal-header">
										<h4 class="modal-title m-0 font-weight-bold text-primary float-md-left">Isi Form</h4>
										<a class="add-more-form btn btn-secondary btn-sm float-md-right" href="javascript:void(0)">
											<i class="fas fa-plus"></i> Tambah Item
										</a>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label for="helperText">Nama Siswa<span class="text-danger">&nbsp;*</span></label>
											<select class="form-control select2" id="postName" name="siswa" tabindex="-1"></select>
											<p><small class="text-muted"><i>Pilih siswa.</i></small></p>
										</div>
										<div class="form-group">
											<label>Tanggal Bayar<span class="text-danger">&nbsp;*</span></label>
											<div class="input-group date" id="reservationdate" data-target-input="nearest">
												<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
												<input type="text" name="tgl_bayar" class="form-control datetimepicker-input" data-target="#reservationdate" data-toggle="datetimepicker" required>
											</div>
										</div>
										<div class="mainan-form">
											<div class="form-group">
												<label>Jenis Seragam<span class="text-danger">&nbsp;*</span></label>
												<select class="custom-select form-control-border" name="seragam[]" tabindex="-1" id="seragam">
													<?php
													$query = "SELECT id_ktgr_baju, nm_baju, lib_tingkat.tingkat, jk, uk_baju, jenis_seragam,harga FROM tbl_ktgr_baju, lib_tingkat 
													WHERE tbl_ktgr_baju.id_tingkat = lib_tingkat.id_tingkat AND stok !=0 ORDER BY lib_tingkat.id_tingkat";
													$result = $connection->query($query);
													if (!$result) {
														printf("Data");
													}
													while ($data = $result->fetch_array(MYSQLI_ASSOC)) { ?>
														<option value="<?= $data["id_ktgr_baju"] ?>"><?= $data["nm_baju"] ?> ( <?= $data["jenis_seragam"] ?> ) - Untuk <?= $data["jk"] ?>, Tingkat <?= $data["tingkat"] ?>, Ukuran <?= $data["uk_baju"] ?> (Rp. <?= $data["harga"] ?>)</option>
													<?php }
													?>
												</select>
											</div>
											<!-- <div class="row" id=detail>
											</div> -->
										</div>
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

										<!-- <div class="form-group">
											<label for="helperText">Keterangan<span class="text-danger">&nbsp;*</span></label>
											<select class="form-control select2" name="ket" tabindex="-1">
												<option disabled> Pilih </option>
												<option value="Lunas" selected>Lunas</option>
												<option value="Belum Lunas">Belum Lunas</option>
											</select>
										</div> -->
										<!-- jumlah yang di bayar -->

										<!-- <div class="form-group">
											<label for="exampleInputBorder">Bottom Border only <code>.form-control-border</code></label>
											<input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder=".form-control-border">
										</div> -->


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
											<a class="btn btn-danger btn-submit" data-toggle="modal" data-target="#modal-kembali">Batal</a>
											<a class="btn btn-primary btn-submit float-md-right" data-toggle="modal" data-target="#modal-simpan"> Input Pembayaran</a>
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
											<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
											<input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan" value="Simpan">
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
											<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
											<a href="index.php?page=bayar-baju" class="btn btn-primary btn-sm float-md-right">Ya, batalkan</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
<?php
	}
} ?>