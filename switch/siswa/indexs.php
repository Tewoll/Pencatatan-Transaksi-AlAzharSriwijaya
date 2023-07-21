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

		$thisPage = "siswa";

?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <a href="index.php?page=siswa&act=tambah" type="button" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>TTL</th>
                                        <th>Umur</th>
                                        <th>Kelas</th>
                                        <th>Tingkat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
											$no = 1;
											$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
											FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
											WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
											$result = mysqli_query($connection, $query);
											$data = mysqli_num_rows($result);
											if ($data > 0) {
												while ($row = mysqli_fetch_assoc($result)) {

											?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['nisn']; ?></td>
                                        <td><?php echo $row['nama_siswa']; ?></td>
                                        <td><?php echo $row['jenkel']; ?></td>
                                        <td><?php echo $row['tmpt_lahir']; ?>,
                                            <?php echo tanggal_indo($row['tgl_lahir']); ?></td>
                                        <td><?php
															$lahir    = new DateTime($row['tgl_lahir']);
															$today    = new DateTime();
															$umur = $today->diff($lahir);
															echo $umur->y;
															echo ' Tahun '; ?></td>
                                        <td><?php echo $row['nm_kelas']; ?></td>
                                        <td><?php echo $row['tingkat']; ?></td>
                                        <td>
                                            <a class="btn btn-xs bg-warning"
                                                href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
                                                <i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs bg-danger" href="#"
                                                onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
                                                    class='fas fa-trash' title="Hapus"></i></i></a>
                                        </td>

                                    </tr>
									
                                    <div class="modal fade" id="modal_delete">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-top:100px;">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi hapus data</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apa anda akan menghapus data siswa ini ?</p>
                                                </div>

                                                <div class="modal-footer justify-content-between ">
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        data-dismiss="modal">Cancel</button>
                                                    <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
													$no++;
												}
											}
											?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <a href="index.php?page=siswa&act=tambah" type="button" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
							<!-- link TK -->
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-tk-below" data-toggle="pill"
                                    href="#tab-tk" role="tab"
                                    aria-controls="tk-tab" aria-selected="true">TK</a>
                            </li>
							<!-- link SD -->
                            <li class="nav-item">
                                <a class="nav-link" id="tab-sd-below" data-toggle="pill"
                                    href="#tab-sd" role="tab"
                                    aria-controls="sd-tab" aria-selected="false">SD</a>
                            </li>
							<!-- link SMP -->
                            <li class="nav-item">
                                <a class="nav-link" id="tab-smp-below" data-toggle="pill"
                                    href="#tab-smp" role="tab"
                                    aria-controls="smp-tab" aria-selected="false">SMP</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
							<!-- Tab TK -->
                            <div class="tab-pane fade show active" id="tab-tk" role="tabpanel"
                                aria-labelledby="tk-tab">
								<br/>
								<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-kelas-tk-1" data-toggle="pill"
											href="#tab-kelas-tk-I" role="tab"
											aria-controls="tk-tab-kelas-1" aria-selected="true">Kelas TA I</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-tk-1" data-toggle="pill"
											href="#tab-kelas-tk-II" role="tab"
											aria-controls="tk-tab-kelas-2" aria-selected="true">Kelas TA II</a>
									</li>
								</ul>
								<div class="tab-content" id="custom-content-below-tabContent">
									<div class="tab-pane fade show active" id="tab-kelas-tk-I" role="tabpanel"
										aria-labelledby="tk-tab-kelas-1">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-tk-1" data-toggle="pill"
														href="#tk-rombel-I" role="tab" aria-controls="tk-rombel-I"
														aria-selected="true">Rombel TA I - A</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="tk-rombel-I"
														role="tabpanel" aria-labelledby="rombel-tk-1">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-1" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="tab-kelas-tk-II" role="tabpanel"
										aria-labelledby="tk-tab-kelas-2">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-tk-2" data-toggle="pill"
														href="#tk-rombel-II" role="tab" aria-controls="tk-rombel-II"
														aria-selected="false">Rombel TA II - A</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="tk-rombel-II" role="tabpanel"
														aria-labelledby="rombel-tk-2">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-2" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
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
							<!-- Tab SD -->
                            <div class="tab-pane fade" id="tab-sd" role="tabpanel"
                                aria-labelledby="sd-tab">
								<br/>
								<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-kelas-sd-1" data-toggle="pill"
											href="#tab-kelas-sd-I" role="tab"
											aria-controls="sd-tab-kelas-1" aria-selected="true">Kelas I</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-sd-2" data-toggle="pill"
											href="#tab-kelas-sd-II" role="tab"
											aria-controls="sd-tab-kelas-2" aria-selected="true">Kelas II</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-sd-3" data-toggle="pill"
											href="#tab-kelas-sd-III" role="tab"
											aria-controls="sd-tab-kelas-3" aria-selected="true">Kelas III</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-sd-4" data-toggle="pill"
											href="#tab-kelas-sd-IV" role="tab"
											aria-controls="sd-tab-kelas-4" aria-selected="true">Kelas IV</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-sd-5" data-toggle="pill"
											href="#tab-kelas-sd-V" role="tab"
											aria-controls="sd-tab-kelas-5" aria-selected="true">Kelas V</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-sd-6" data-toggle="pill"
											href="#tab-kelas-sd-VI" role="tab"
											aria-controls="sd-tab-kelas-6" aria-selected="true">Kelas VI</a>
									</li>
								</ul>
								<div class="tab-content" id="custom-content-below-tabContent">
									<div class="tab-pane fade show active" id="tab-kelas-sd-I" role="tabpanel"
										aria-labelledby="sd-tab-kelas-1">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-sd-1A" data-toggle="pill"
														href="#sd-rombel-IA" role="tab" aria-controls="sd-rombel-IA"
														aria-selected="true">Rombel I A</a>
													<a class="nav-link" id="rombel-sd-1B" data-toggle="pill"
														href="#sd-rombel-IB" role="tab" aria-controls="sd-rombel-IB"
														aria-selected="true">Rombel I B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="sd-rombel-IA"
														role="tabpanel" aria-labelledby="rombel-sd-1A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-3" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='I A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left fade" id="sd-rombel-IB"
														role="tabpanel" aria-labelledby="rombel-sd-1B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-4" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='I B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-sd-II" role="tabpanel"
										aria-labelledby="sd-tab-kelas-2">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-sd-2A" data-toggle="pill"
														href="#sd-rombel-IIA" role="tab" aria-controls="sd-rombel-IIA"
														aria-selected="false">Rombel II A</a>
													<a class="nav-link" id="rombel-sd-2B" data-toggle="pill"
														href="#sd-rombel-IIB" role="tab" aria-controls="sd-rombel-IIB"
														aria-selected="false">Rombel II B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="sd-rombel-IIA" role="tabpanel"
														aria-labelledby="rombel-sd-2A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-5" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='2 A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left" id="sd-rombel-IIB" role="tabpanel"
														aria-labelledby="rombel-sd-2B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-6" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='II B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-sd-III" role="tabpanel"
										aria-labelledby="sd-tab-kelas-3">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-sd-3A" data-toggle="pill"
														href="#sd-rombel-IIIA" role="tab" aria-controls="sd-rombel-IIIA"
														aria-selected="false">Rombel III A</a>
													<a class="nav-link" id="rombel-sd-3B" data-toggle="pill"
														href="#sd-rombel-IIIB" role="tab" aria-controls="sd-rombel-IIIB"
														aria-selected="false">Rombel III B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="sd-rombel-IIIA" role="tabpanel"
														aria-labelledby="rombel-sd-3A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-7" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='III A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left" id="sd-rombel-IIIB" role="tabpanel"
														aria-labelledby="rombel-sd-3B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-8" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='III B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-sd-IV" role="tabpanel"
										aria-labelledby="sd-tab-kelas-4">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-sd-4A" data-toggle="pill"
														href="#sd-rombel-IVA" role="tab" aria-controls="sd-rombel-IVA"
														aria-selected="false">Rombel IV A</a>
													<a class="nav-link" id="rombel-sd-4B" data-toggle="pill"
														href="#sd-rombel-IVB" role="tab" aria-controls="sd-rombel-IVB"
														aria-selected="false">Rombel IV B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="sd-rombel-IVA" role="tabpanel"
														aria-labelledby="rombel-sd-4A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-9" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='IV A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left" id="sd-rombel-IVB" role="tabpanel"
														aria-labelledby="rombel-sd-4B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-10" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='IV B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-sd-V" role="tabpanel"
										aria-labelledby="sd-tab-kelas-5">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-sd-5A" data-toggle="pill"
														href="#sd-rombel-VA" role="tab" aria-controls="sd-rombel-VA"
														aria-selected="false">Rombel V A</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="sd-rombel-VA" role="tabpanel"
														aria-labelledby="rombel-sd-5A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-11" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='V A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-sd-VI" role="tabpanel"
										aria-labelledby="sd-tab-kelas-6">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-sd-6A" data-toggle="pill"
														href="#sd-rombel-VIA" role="tab" aria-controls="sd-rombel-VIA"
														aria-selected="false">Rombel VI A</a>
													<a class="nav-link" id="rombel-sd-6B" data-toggle="pill"
														href="#sd-rombel-VIB" role="tab" aria-controls="sd-rombel-VIB"
														aria-selected="false">Rombel VI B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="sd-rombel-VIA" role="tabpanel"
														aria-labelledby="rombel-sd-6A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-12" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='VI A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left" id="sd-rombel-VIB" role="tabpanel"
														aria-labelledby="rombel-sd-6B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-13" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='VI B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
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
							<!-- Tab SMP -->
                            <div class="tab-pane fade" id="tab-smp" role="tabpanel"
                                aria-labelledby="smp-tab">
								<br/>
								<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-kelas-smp-7" data-toggle="pill"
											href="#tab-kelas-smp-VII" role="tab"
											aria-controls="smp-tab-kelas-7" aria-selected="true">Kelas VII</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-smp-8" data-toggle="pill"
											href="#tab-kelas-smp-VIII" role="tab"
											aria-controls="smp-tab-kelas-8" aria-selected="true">Kelas VIII</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab-kelas-smp-9" data-toggle="pill"
											href="#tab-kelas-smp-IX" role="tab"
											aria-controls="smp-tab-kelas-9" aria-selected="true">Kelas IX</a>
									</li>
								</ul>
								<div class="tab-content" id="custom-content-below-tabContent">
									<div class="tab-pane fade show active" id="tab-kelas-smp-VII" role="tabpanel"
										aria-labelledby="smp-tab-kelas-7">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-smp-7A" data-toggle="pill"
														href="#smp-rombel-VIIA" role="tab" aria-controls="smp-rombel-VIIA"
														aria-selected="true">Rombel VII A</a>
													<a class="nav-link" id="rombel-smp-7B" data-toggle="pill"
														href="#smp-rombel-VIIB" role="tab" aria-controls="smp-rombel-VIIB"
														aria-selected="true">Rombel VII B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="smp-rombel-VIIA"
														role="tabpanel" aria-labelledby="rombel-smp-VIA">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-14" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='VII A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left fade" id="smp-rombel-VIIB"
														role="tabpanel" aria-labelledby="rombel-smp-7B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-15" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='VII B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-smp-VIII" role="tabpanel"
										aria-labelledby="smp-tab-kelas-8">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-smp-8A" data-toggle="pill"
														href="#smp-rombel-VIIIA" role="tab" aria-controls="smp-rombel-VIIIA"
														aria-selected="false">Rombel VIII A</a>
													<a class="nav-link" id="rombel-smp-8B" data-toggle="pill"
														href="#smp-rombel-VIIIB" role="tab" aria-controls="smp-rombel-VIIIB"
														aria-selected="false">Rombel VIII B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="smp-rombel-VIIIA" role="tabpanel"
														aria-labelledby="rombel-smp-8A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-16" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='VIII A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left" id="sd-rombel-VIIIB" role="tabpanel"
														aria-labelledby="rombel-sd-8B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-17" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='VIII B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab-kelas-smp-IX" role="tabpanel"
										aria-labelledby="smp-tab-kelas-9">
										<br/>
										<div class="row">
											<div class="col-4 col-sm-2">
												<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
													aria-orientation="vertical">
													<a class="nav-link active" id="rombel-smp-9A" data-toggle="pill"
														href="#smp-rombel-IXA" role="tab" aria-controls="smp-rombel-IXA"
														aria-selected="false">Rombel IX A</a>
													<a class="nav-link" id="rombel-smp-9B" data-toggle="pill"
														href="#smp-rombel-IXB" role="tab" aria-controls="smp-rombel-IXB"
														aria-selected="false">Rombel IX B</a>
												</div>
											</div>
											<div class="col-8 col-sm-10">
												<div class="tab-content" id="vert-tabs-tabContent">
													<div class="tab-pane text-left fade show active" id="smp-rombel-IXA" role="tabpanel"
														aria-labelledby="rombel-smp-9A">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-18" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='IX A' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<div class="tab-pane text-left" id="sd-rombel-IXB" role="tabpanel"
														aria-labelledby="rombel-sd-9B">
														<!-- Table Data -->
														<div class="card-body">
															<div class="table-responsive">
																<table id="siswa-19" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th style="width: 10px">No</th>
																			<th>NIS</th>
																			<th>Nama</th>
																			<th>JK</th>
																			<th>TTL</th>
																			<th>Umur</th>
																			<th>Aksi</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$no = 1;
																			$query = "SELECT tbl_siswa.id_siswa, tbl_siswa.nisn, tbl_siswa.nama_siswa, tbl_siswa.jenkel, tbl_siswa.tmpt_lahir, tbl_siswa.tgl_lahir, tbl_siswa.nama_wali, tbl_siswa.id_rombel, tbl_rombel.nm_rombel, tbl_kelas.nm_kelas, tbl_kelas.id_tingkat, lib_tingkat.tingkat, tbl_siswa.alamat, tbl_siswa.id_tajaran 
																			FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
																			WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat AND nm_rombel='IX B' AND id_tajaran='{$id_sem}' ORDER BY tbl_kelas.nm_kelas ASC";
																			$result = mysqli_query($connection, $query);
																			$data = mysqli_num_rows($result);
																			if ($data > 0) {
																				while ($row = mysqli_fetch_assoc($result)) {

																		?>
																		<tr>
																			<td><?php echo $no; ?></td>
																			<td><?php echo $row['nisn']; ?></td>
																			<td><?php echo $row['nama_siswa']; ?></td>
																			<td><?php echo $row['jenkel']; ?></td>
																			<td><?php echo $row['tmpt_lahir']; ?>,
																				<?php echo tanggal_indo($row['tgl_lahir']); ?></td>
																			<td><?php
																			$lahir    = new DateTime($row['tgl_lahir']);
																			$today    = new DateTime();
																			$umur = $today->diff($lahir);
																			echo $umur->y;
																			echo ' Tahun '; ?></td>
																			<td>
																				<a class="btn btn-xs bg-warning"
																					href="index.php?page=siswa&act=edit&id=<?php echo $row['id_siswa']; ?>">
																					<i class="fas fa-edit"></i></a>
																				<a class="btn btn-xs bg-danger" href="#"
																					onClick="confirm_modal('index.php?page=siswa&act=proses&data=hapus&id=<?php echo $row['id_siswa']; ?>');"><i
																						class='fas fa-trash' title="Hapus"></i></i></a>
																			</td>

																		</tr>
																		<!-- Modal Popup untuk delete-->
																		<div class="modal fade" id="modal_delete">
																			<div class="modal-dialog">
																				<div class="modal-content" style="margin-top:100px;">
																					<div class="modal-header">
																						<h4 class="modal-title">Konfirmasi hapus data</h4>
																						<button type="button" class="close" data-dismiss="modal"
																							aria-label="Close">
																							<span aria-hidden="true">&times;</span>
																						</button>
																					</div>
																					<div class="modal-body">
																						<p>Apa anda akan menghapus data siswa ini ?</p>
																					</div>

																					<div class="modal-footer justify-content-between ">
																						<button type="button" class="btn btn-default btn-sm"
																							data-dismiss="modal">Cancel</button>
																						<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																					</div>
																				</div>
																			</div>
																		</div>
																		<?php
																						$no++;
																					}
																				}
																				?>
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
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
} ?>



<br/>
                                