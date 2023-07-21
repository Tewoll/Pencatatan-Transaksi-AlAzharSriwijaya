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
		$qedit = "SELECT * FROM tbl_siswa WHERE id_siswa = '{$cid}'";
		$red = mysqli_query($connection, $qedit);
		$ed = mysqli_num_rows($red);
		if ($ed > 0) {
			$e = mysqli_fetch_assoc($red);
			$idu = $e['id_siswa'];
			$idt = $e['id_rombel'];
			/* query alamat */

?>

			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Edit Data Siswa</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index.php?page=index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="index.php?page=siswa">Data Siswa</a></li>
								<li class="breadcrumb-item active">Edit Data Siswa</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<br>

			<form method="POST" class="form-horizontal" action="index.php?page=siswa&act=proses&data=ubah" id="form1" method="post" name="ubah">
				<input type="hidden" class="form-control" name="id_siswa" value="<?php echo $idu; ?>" required>
				<section class="content">
					<div class="container-fluid">
						<div class="col-12">
							<div class="row">

								<div class="col-xl-9 col-lg-12">
									<!-- Data Pribadi -->
									<div class="card mb-4">
										<div class="card-header py-12">
											<h6 class="m-0 font-weight-bold text-primary">Isi Form</h6>
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="helperText">NISN<span class="text-danger">&nbsp;*</span></label>
												<input type="number" onkeypress="return hanyaAngka(event)" id="helperText" class="form-control" name="nisn" value="<?php echo $e['nisn']; ?>" required>
												<p><small class="text-muted"><i>Masukkan NISN.</i></small></p>
											</div>
											<div class="form-group">
												<label for="helperText">Nama Siswa<span class="text-danger">&nbsp;*</span></label>
												<input type="text" id="helperText" class="form-control" name="nama_siswa" value="<?php echo $e['nama_siswa']; ?>" required>
												<p><small class="text-muted"><i>Masukkan nama Siswa.</i></small></p>
											</div>
											<div class="form-group">
												<label for="helperText">Jenis Kelamin<span class="text-danger">&nbsp;*</span></label>
												<select name="jenkel" class="form-control" tabindex="-1">
													<?php
													if ($e['jenkel'] == "L") {
														echo "<option value='L' size='20' selected>Laki-Laki</option>
												<option value='P'>Perempuan</option>";
													} else {
														echo "<option value='L' size='20' >Laki-Laki</option>
												<option value='P' selected>Perempuan</option>";
													}
													echo "</select>"; ?>
												<p><small class="text-muted"><i>Masukkan jenis kelamin siswa.</i></small></p>
											</div>
											<div class="form-group">
												<label for="helperText">Tempat lahir<span class="text-danger">&nbsp;*</span></label>
												<input type="text" id="helperText" class="form-control" name="tmpt_lahir" value="<?php echo $e['tmpt_lahir']; ?>" required>
												<p><small class="text-muted"><i>Masukkan tempat lahir siswa.</i></small></p>
											</div>
											<div class="form-group">
												<label>Tanggal Lahir<span class="text-danger">&nbsp;*</span></label>
												<div class="input-group date" id="reservationdate" data-target-input="nearest">
													<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
													<input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" data-toggle="datetimepicker" value="<?php echo date('d-m-Y', strtotime($e['tgl_lahir'])); ?>" required>
												</div>
												<p><small class="text-muted"><i>Masukkan tanggal lahir siswa dengan format Tanggal - Bulan - Tahun.</i></small></p>
											</div>
											<div class="form-group">
												<label for="helperText">Nama Wali<span class="text-danger">&nbsp;*</span></label>
												<input type="text" id="helperText" class="form-control" name="wali" value="<?php echo $e['nama_wali']; ?>" required>

												<p><small class="text-muted"><i>Masukkan nama orang tua siswa.</i></small></p>
											</div>
											<div class="row">
												<div class="col-lg-3">
													<div class="form-group">
														<label for="helperText">Rombel<span class="text-danger">&nbsp;*</span></label>
														<select class="form-control select2" name="rombel" tabindex="-1">
															<option disabled>---- Pilih Rombel ----</option>
															<?php
															$qtk = mysqli_query($connection, "SELECT * from tbl_rombel");
															$ptk = mysqli_num_rows($qtk);
															if ($ptk > 0) {
																while ($tkt = mysqli_fetch_assoc($qtk)) {
		
																	if ($idt == $tkt['id_rombel']) { ?>
																		<option value="<?php echo $tkt['id_rombel']; ?>" selected><?php echo $tkt['nm_rombel']; ?> </option>
																	<?php } else { ?>
																		<option value="<?php echo $tkt['id_rombel']; ?>"><?php echo $tkt['nm_rombel']; ?> </option>
															<?php }
																}
															} ?>
														</select>
														<p><small class="text-muted"><i>Pilih rombel siswa.</i></small></p>
													</div>
												</div>
												<div class="col-lg-5">
													<div class="form-group">
														<label for="helperText">Kelas<span class="text-danger">&nbsp;*</span></label>
														<select class="form-control select2" name="kelas" tabindex="-1">
															<?php
															$qkls = mysqli_query($connection, "SELECT id_kelas from tbl_rombel where id_rombel='$idt'");
															$pkls = mysqli_num_rows($qkls);
															if ($pkls > 0 ) {
																while ($kls = mysqli_fetch_assoc($qkls)){
																$id_kls = $kls['id_kelas'];

																$qklaas = mysqli_query($connection, "SELECT * FROM tbl_kelas");
																$dklaas = mysqli_num_rows($qklaas);
																	if($dklaas > 0 ){
																		while ($laas = mysqli_fetch_assoc($qklaas)) {
																			
																		if ($id_kls == $laas['id_kelas']) { ?>
																			<option value="<?php echo $laas['id_kelas']; ?>" selected><?php echo $laas['nm_kelas']; ?> </option>
																		<?php } else { ?>
																			<option value="<?php echo $laas['id_kelas']; ?>"><?php echo $laas['nm_kelas']; ?> </option>
															<?php }}}}} ?>
														</select>
														<p><small class="text-muted"><i>Pilih kelas siswa.</i></small></p>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label for="helperText">Tingkatan<span class="text-danger">&nbsp;*</span></label>
														<select class="form-control select2" name="tingkat" tabindex="-1">
														<?php
															$qtingk = mysqli_query($connection, "SELECT id_tingkat from tbl_kelas where id_kelas='$id_kls'");
															$ptingk = mysqli_num_rows($qtingk);
															if ($ptingk > 0 ) {
																while ($tingk = mysqli_fetch_assoc($qtingk)){
																$id_tingk = $tingk['id_tingkat'];

																$qtingka = mysqli_query($connection, "SELECT * FROM lib_tingkat");
																$dtingka = mysqli_num_rows($qtingka);
																	if($dtingka > 0 ){
																		while ($tingka = mysqli_fetch_assoc($qtingka)) {
																			
																		if ($id_tingk == $tingka['id_tingkat']) { ?>
																			<option value="<?php echo $tingka['id_tingkat']; ?>" selected><?php echo $tingka['tingkat']; ?> </option>
																		<?php } else { ?>
																			<option value="<?php echo $tingka['id_tingkat']; ?>"><?php echo $tingka['tingkat']; ?> </option>
															<?php }}}}} ?>
														</select>
														<p><small class="text-muted"><i>Pilih tingkat sekolah.</i></small></p>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="helperText">Alamat<span class="text-danger">&nbsp;*</span></label>
												<textarea style="height:100px" class="form-control" name="alamat"><?php echo $e['alamat'] ?></textarea>

												<p><small class="text-muted"><i>Masukkan alamat siswa.</i></small></p>
											</div>
											<div class="form-group">
												<label for="helperText">Tahun Angkatan<span class="text-danger">&nbsp;*</span></label>
												<select name="angkatan" class="form-control" tabindex="-1">
													<?php
													$qtk = mysqli_query($connection, "SELECT * from lib_tajaran ORDER BY tahun_ajaran ASC");
													$ptk = mysqli_num_rows($qtk);
													if ($ptk > 0) {
														while ($tkt = mysqli_fetch_assoc($qtk)) {

															if ($ida == $tkt['id_tajaran']) { ?>
																<option value="<?php echo $tkt['id_tajaran']; ?>" selected><?php echo $tkt['tahun_ajaran']; ?> </option>
															<?php } else { ?>
																<option value="<?php echo $tkt['id_tajaran']; ?>"><?php echo $tkt['tahun_ajaran']; ?> </option>
													<?php }
														}
													} ?>
												</select>
												<p><small class="text-muted"><i>Pilih tahun angkatan siswa yang akan diedit.</i></small></p>
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
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
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
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
								</div>
							</div>
						</div>
					</div>
				</section>
			</form>
		<?php } else {
			echo '<meta http-equiv="refresh" content="0;url=index.php?page=siswa">';
		} ?>
<?php }
} ?>