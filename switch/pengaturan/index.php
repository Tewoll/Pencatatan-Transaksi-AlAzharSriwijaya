<?php 
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if(empty($bgp)){
	header("Location:../../login.php");	
}elseif($bgp == 'index.php?page='){
	header("Location:../../login.php");	
}else{

	?>

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<!-- <h1 class="m-0">Master Data</h1> -->
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Pengaturan Sistem</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- /.card -->
					<div class="card">
						<div class="card-header">
							<h1 class="m-0 justify">Pengaturan</h1>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Manajemen Pengguna</a>
								</li>
								<?php
								if ($level == 'admin') {
								?>
								<li class="nav-item">
									<a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Ubah Tahun Ajaran</a>
								</li>
								<?php }else{}?>
							</ul>
							<div class="tab-content" id="custom-content-above-tabContent">
								<div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
									
									<br>
									<div class="card">
										<?php
										if ($level == 'admin') {
										?>
										<div class="card-header">
											<a data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-primary">Tambah</a>
										</div>
										<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Tambah Pengguna</h4>
													</div>

													<form method="POST" class="form-horizontal" action="index.php?page=pengaturan&act=proses&data=tambah" id="form1" name="tambah">
														<div class="modal-body">
															<div class="card-body">
																<div class="form-group">
																	<label for="exampleInputBorder">Username</label>
																	<input type="text" name="user" class="form-control form-control-border" required>
																</div>
																<div class="form-group">
																	<label for="exampleInputBorder">Password</label>
																	<input type="text" name="pass" class="form-control form-control-border" required>
																</div>
																<div class="form-group">
																	<label class="exampleInputBorder">Level Akses</label>
																	<select class="form-control form-control-border" name="level">
																		<option value="admin">Administrator</option>
																		<option value="eksekutif">Eksekutif</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan" value="Simpan">
														</div>
													</form>
												</div>
											</div>
										</div>
										<?php }else{

										}

										if ($level == 'admin') {
										?>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th style="width: 10px">No</th>
														<th>Username</th>
														<th>Level</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 0; 
													$sql2 = "SELECT id_user, username, level from tbl_user where id_user order by id_user ASC";
													$result = mysqli_query($connection,$sql2);
													$kt_data = mysqli_num_rows($result);
													if ($kt_data > 0) { while($row = mysqli_fetch_assoc($result)){
													?>
													<tr>
														<td><?=++$no ?></td>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['level']; ?></td>
														<td>
															<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit-<?php echo $row['id_user']; ?>">
																<i class="fas fa-edit" title="Edit"></i> Edit</a>
															<?php if($row['id_user'] == $idus){ }else{ ?>
															<a class="btn btn-xs bg-danger" href="#" onClick="confirm_modal('index.php?page=pengaturan&act=proses&data=hapus&id=<?php echo $row['id_user']; ?>');"><i class='fas fa-trash' title="Hapus" ></i> Hapus</a>

															<?php } ?>
															
														</td>
														<!-- Modal Popup untuk delete-->
														<div class="modal fade" id="modal_delete">
															<div class="modal-dialog">
																<div class="modal-content" style="margin-top:100px;">
																	<div class="modal-header">
																		<h4 class="modal-title">Konfirmasi hapus data</h4>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p>Apa anda akan menghapus data siswa ini ?</p>
																	</div>

																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
																		<a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
																	</div>
																</div>
															</div>
														</div>

														<div class="modal fade" id="modal-edit-<?php echo $row['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Edit User</h4>
																	</div>
																	<form method="POST" class="form-horizontal" action="index.php?page=pengaturan&act=proses&data=ubah" id="form1" method="post" name="ubah">
																		<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user']; ?>" required>
																		<input type="hidden" class="form-control" name="level" value="<?php echo $row['level']; ?>" required>
																		<div class="modal-body">
																			<div class="card-body">
																				<div class="form-group">
																					<label for="exampleInputBorder">Username</label>
																					<input type="text" class="form-control form-control-border" name="username" value="<?php echo $row['username']; ?>" required>
																				</div>
																				<div class="form-group">
																					<label class="exampleInputBorder">Level Akses</label>
																					<select class="form-control form-control-border" name="level">
																						<option value="admin"<?php if($row['level'] == 'admin') {echo ' selected';} ?>>Administrator</option>
																						<option value="eksekutif"<?php if($row['level'] == 'eksekutif') {echo ' selected';} ?>>Eksekutif</option>
																					</select>
																				</div>
																				<div class="form-group">
																					<label class="exampleInputBorder">Password</label>
																					<input type="password" class="form-control form-control-border" name="ps_user">
																					<p><small class="text-muted"><i>Jika tidak ingin merubah password, kosongkan saja.</i></small></p>
																				</div>
																			</div>
																			
																		</div>
																		<div class="modal-footer">
																			<input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan" value="Simpan">
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</tr>
													<?php } }?>
												</tbody>

											</table>
										</div>
										<?php }else{?>

										<div class="card-body">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th style="width: 10px">No</th>
														<th>Username</th>
														<th>Level</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 0; 
													$sql2 = "SELECT id_user, username, level from tbl_user where id_user = '$idus'";
													$result = mysqli_query($connection,$sql2);
													$kt_data = mysqli_num_rows($result);
													if ($kt_data > 0) { while($row = mysqli_fetch_assoc($result)){
													?>
													<tr>
														<td><?=++$no ?></td>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['level']; ?></td>
														<td>
															<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit-<?php echo $row['id_user']; ?>">
																<i class="fas fa-edit" title="Edit"></i> Edit</a>
															
														</td>
														<div class="modal fade" id="modal-edit-<?php echo $row['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Edit User</h4>
																	</div>
																	<form method="POST" class="form-horizontal" action="index.php?page=pengaturan&act=proses&data=ubah" id="form1" method="post" name="ubah">
																		<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user']; ?>" required>
																		<input type="hidden" class="form-control" name="level" value="<?php echo $row['level']; ?>" required>
																		<div class="modal-body">
																			<div class="card-body">
																				<div class="form-group">
																					<label for="exampleInputBorder">Username</label>
																					<input type="text" class="form-control form-control-border" name="username" value="<?php echo $row['username']; ?>" required>
																				</div>
																				<div class="form-group">
																					<label class="exampleInputBorder">Password</label>
																					<input type="password" class="form-control form-control-border" name="ps_user">
																					<p><small class="text-muted"><i>Jika tidak ingin merubah password, kosongkan saja.</i></small></p>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan" value="Simpan">
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</tr>
													<?php } }?>
												</tbody>

											</table>
										</div>
										<?php  } ?> 

									</div>
								</div>

								<!-- tab tahun ajaran -->
								<div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
									<br>
									<section class="content">
										<div class="container-fluid">
											<div class="row">
												<div class="col-md-4">
													<div class="card">
														<form method="POST" class="form-horizontal" action="index.php?page=pengaturan&act=proses&data=tambahajaran" id="form1" method="post" name="tambahajaran">
															<input type="hidden" class="form-control" name="status" value="Tidak Aktif" required>
															<div class="card mb-4">
																<div class="card-header py-12">
																	<h6 class="m-0 font-weight-bold text-primary">Form Tambah Tahun Ajaran</h6>
																</div>
																<div class="card-body">       
																	<div class="form-group">
																		<label for="helperText">Tahun Ajaran<span class="text-danger">&nbsp;*</span></label>
																		<input type="text" id="helperText" class="form-control" name="tahun_ajaran" required >
																		<p><small class="text-muted"><i>Contoh dengan format 2021/2022</i></small></p> 
																	</div>
																</div>
																<div class="card-footer py-12">
																	<div class="form-group">
																		<a class="btn btn-primary btn-submit btn-sm float-md-right" data-toggle="modal" data-target="#modal-simpan"> Tambah</a>
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
																					<p>Apa anda akan menyimpan data semester?</p>
																				</div>
																				<div class="modal-footer justify-content-between">
																					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
																					<input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan" value="Simpan">
																				</div>
																			</div>
																			<!-- /.modal-content -->
																		</div>
																		<!-- /.modal-dialog -->
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
												<div class="col-md-8">
													<div class="card">
														<!-- /.card-header -->
														<div class="card-header py-12">
															<h6 class="m-0 font-weight-bold text-primary">Data Tahun Ajaran</h6>
														</div>
														<div class="card-body">
															<div class="table-responsive">
																<table class="table table-bordered">
																	<thead>
																		<tr>
																			<th>No</th>
																			<th>Tahun Ajaran</th>
																			<th>Status</th>
																			<th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php 
																		$no = 1;
																		$kueri = "SELECT * FROM lib_tajaran ORDER BY tahun_ajaran ASC";
																		$temu = mysqli_query($connection,$kueri);
																		$gana = mysqli_num_rows($temu);
																		if ($gana > 0) { while($kotak = mysqli_fetch_assoc($temu)){
																			?>
																			<tr>
																				<td><?php echo $no++;?></td>
																				<td><?php echo $kotak['tahun_ajaran']; ?></td>
																				<td><?php echo $kotak['status']; ?></td>
																				<td>
																					<?php if ($kotak['status'] == 'Aktif'){ ?>
																						<a class="btn btn-xs bg-default" title="Aktif" disabled> Aktif</a>

																					<?php  }else{ 
																						?>
																						<a class="btn btn-xs bg-primary" href="#" onClick="confirm_edit_modal('index.php?page=pengaturan&act=proses&data=ubahajaran&id=<?php echo $kotak['id_tajaran']; ?>');" title="Aktifkan Tahun Ajaran"> Aktifkan</a>
																						<a class="btn btn-xs bg-danger" href="#" onClick="confirm_hapus_modal('index.php?page=pengaturan&act=proses&data=hapusajaran&id=<?php echo $kotak['id_tajaran']; ?>');" title="Hapus" ></i> Hapus</a>
																						<?php

																					}

																					?>
																				</td>
																				<!-- Modal Popup untuk hapus-->
																				<div class="modal fade" id="modal_hapus">
																					<div class="modal-dialog">
																						<div class="modal-content" style="margin-top:100px;">
																							<div class="modal-header">
																								<h4 class="modal-title">Konfirmasi hapus data</h4>
																								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																									<span aria-hidden="true">&times;</span>
																								</button>
																							</div>
																							<div class="modal-body">
																								<p>Apa anda akan menghapus data tahun ajaran ini ?</p>
																							</div>

																							<div class="modal-footer justify-content-between">
																								<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
																								<a href="#" class="btn btn-danger btn-sm" id="hapus_link">Hapus</a>
																							</div>
																						</div>
																					</div>
																				</div>

																				<!-- Modal Popup untuk edit-->
																				<div class="modal fade" id="modal_edit">
																					<div class="modal-dialog">
																						<div class="modal-content" style="margin-top:100px;">
																							<div class="modal-header">
																								<h4 class="modal-title">Konfirmasi ubah tahun ajaran</h4>
																								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																									<span aria-hidden="true">&times;</span>
																								</button>
																							</div>
																							<div class="modal-body">
																								<p>Apa anda akan mengaktifkan tahun ajaran ini ?</p>
																							</div>

																							<div class="modal-footer justify-content-between">
																								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
																								<a href="#" class="btn btn-primary btn-sm" id="edit_link">Aktifkan</a>
																							</div>
																						</div>
																					</div>
																				</div>

																			</tr>
																		<?php }} ?>
																	</tbody>
																</table>
															</div>
														</div>
														<!-- /.card-body -->
													</div>
												</div>

											</div>
										</div>
									</section>
								</div>
							</div>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<?php } ?>