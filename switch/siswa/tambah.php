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
	} else { ?>

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Tambah Data Siswa</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item"><a href="index.php?page=siswa_mi">Data Siswa</a></li>
						<li class="breadcrumb-item active">Tambah Data Siswa</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<br>
	<form method="POST" class="form-horizontal" action="index.php?page=siswa&act=proses&data=tambah" id="form1" name="tambah">
		<section class="content">
			<div class="container-fluid">
				<div class="col-12">
					<div class="row">

						<div class="col-xl-9 col-lg-12">
							<div class="card mb-4">
								<div class="card-header py-12">
									<h6 class="m-0 font-weight-bold text-primary">Isi Form</h6>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="helperText">NIS<span class="text-danger">&nbsp;*</span></label>
										<input type="number" onkeypress="return hanyaAngka(event)" id="helperText" class="form-control" name="nisn" required>
										<p><small class="text-muted"><i>Masukkan NIS.</i></small></p>
									</div>
									<div class="form-group">
										<label for="helperText">Nama Siswa<span class="text-danger">&nbsp;*</span></label>
										<input type="text" id="helperText" class="form-control" name="nama_siswa" required>
										<p><small class="text-muted"><i>Masukkan nama Siswa.</i></small></p>
									</div>
									<div class="form-group">
										<label for="helperText">Jenis Kelamin<span class="text-danger">&nbsp;*</span></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
											</div>
											<select class="form-control select2" name="jenkel" tabindex="-1">
												<option disabled selected> Pilih </option>
												<option value="L">Laki-Laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>
										<p><small class="text-muted"><i>Masukkan jenis kelamin siswa.</i></small></p>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group">
												<label for="helperText">Tempat lahir<span class="text-danger">&nbsp;*</span></label>
												<input type="text" id="helperText" class="form-control" name="tmpt_lahir" required>
												<p><small class="text-muted"><i>Masukkan tempat lahir siswa.</i></small></p>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group">
												<label>Tanggal Lahir<span class="text-danger">&nbsp;*</span></label>
												<div class="input-group date" id="reservationdate" data-target-input="nearest">
													<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
													<input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" data-toggle="datetimepicker" required>
												</div>
												<p><small class="text-muted"><i>Masukkan tanggal lahir siswa dengan format Tanggal - Bulan - Tahun.</i></small></p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="helperText">Nama Wali<span class="text-danger">&nbsp;*</span></label>
										<input type="text" id="helperText" class="form-control" name="nama_wali" required>
										<p><small class="text-muted"><i>Masukkan nama wali siswa.</i></small></p>
									</div>
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group">
												<label for="helperText">Tingkatan Sekolah<span class="text-danger">&nbsp;*</span></label>
												<select class="form-control" name="tingkat" tabindex="-1" id="tingkat">
													<option value=""> Pilih Tingkatan siswa </option>
													<?php
													$query = "select * from lib_tingkat";
													$result = $connection->query($query);
													if (!$result) {
														printf("Errormessage: %s\n", $konek->error);
													}
													while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
													?>
														<option value="<?= $data['id_tingkat'] ?>"><?= $data['tingkat'] ?></option>
													<?php
													}
													?>
												</select>
												<p><small class="text-muted"><i>Pilih tingkat sekolah.</i></small></p>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="form-group">
												<label for="helperText">Kelas<span class="text-danger">&nbsp;*</span></label>
												<select class="form-control" name="kelas" tabindex="-1" id="kelas">
													<option disabled> Pilih Tingkat sekolah terlebih dahulu! </option>
												</select>
												<p><small class="text-muted"><i>Pilih kelas siswa.</i></small></p>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="helperText">Rombel<span class="text-danger">&nbsp;*</span></label>
												<select class="form-control" name="rombel" tabindex="-1" id="rombel">
													<option disabled> Pilih kelas terlebih dahulu! </option>
												</select>
												<p><small class="text-muted"><i>Pilih rombel siswa.</i></small></p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="helperText">Alamat<span class="text-danger">&nbsp;*</span></label>
										<textarea style="height:100px" class="form-control" name="alamat" required></textarea>

										<p><small class="text-muted"><i>Masukkan alamat siswa.</i></small></p>
									</div>
									<div class="form-group">
										<label for="helperText">Tahun Angkatan<span class="text-danger">&nbsp;*</span></label>
										<div class="input-group">
											<select class="form-control select2bs4" name="angkatan" tabindex="-1" required>
												<?php
												$qtk = mysqli_query($connection, "SELECT * from lib_tajaran WHERE id_tajaran='$id_sem' ORDER BY tahun_ajaran ASC");
												$ptk = mysqli_num_rows($qtk);
												if ($ptk > 0) {
													while ($tkt = mysqli_fetch_assoc($qtk)) { ?>
															<option value="<?php echo $tkt['id_tajaran']; ?>"><?php echo $tkt['tahun_ajaran']; ?> </option>
												<?php }
												} ?>
											</select>
										</div>
										<p><small class="text-muted"><i>Pilih tahun angkatan siswa.</i></small></p>
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
										<a class="btn btn-danger btn-submit" data-toggle="modal" data-target="#modal-kembali">Kembali</a>
										<a class="btn btn-primary btn-submit float-md-right" data-toggle="modal" data-target="#modal-simpan"> Simpan</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="modal-simpan">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Konfirmasi simpan data</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Apa anda akan menyimpan perubahan data siswa ?</p>
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
										<h4 class="modal-title">Konfirmasi simpan data</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Apa anda tidak akan menyimpan perubahan data ?</p>
									</div>
									<div class="modal-footer justify-content-between">
										<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
										<a href="index.php?page=siswa" class="btn btn-primary btn-sm float-md-right">Ya, Jangan simpan</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>
<?php } } ?>