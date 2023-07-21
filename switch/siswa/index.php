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
        <div class="card">
            <div class="card-header">
                <a href="index.php?page=siswa&act=tambah" type="button" class="btn btn-primary float-md-right">Tambah
                    Data</a>
            </div>
        </div>
        <div class="row">
            <?php

            $query = mysqli_query($connection, "SELECT * FROM lib_tingkat");
            $result = array(); 
            while ($data = mysqli_fetch_array($query)) {
            $result[] = $data; //result dijadikan array 
            }
            foreach ($result as $key=>$value){                              
                
                $jml = mysqli_query($connection, "SELECT COUNT(id_siswa) as jumlah FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
                WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat 
                AND id_tajaran='{$id_sem}'  AND lib_tingkat.id_tingkat='$value[id_tingkat]';");
                $hsl = array(); 
                while ($dt = mysqli_fetch_array($jml)) {
                $hsl[] = $dt; //result dijadikan array 
                }
                foreach ($hsl as $kunci){                                
                      
                
            ?>
            <div class="col-md-4 col-sm-6 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Tingkat <?=$value['tingkat'];?></h3>

                        <p>Jumlah Seluruh Siswa adalah <?=$kunci['jumlah'];?> orang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="index.php?page=siswa&act=lihat_kelas&id=<?=$value['id_tingkat'];?>"
                        class="small-box-footer">Lihat Data Kelas <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <?php } }?>
        </div>
    </div>
</section>

<?php }
} ?>

<br />