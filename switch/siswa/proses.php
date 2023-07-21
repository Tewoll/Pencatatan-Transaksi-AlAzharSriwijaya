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
<?php
		$dct = isset($_GET['data']) ? $_GET['data'] : '';
		$dct = inject_checker($connection, $dct);
		switch ($dct) {
			case 'tambah':
				$nisn = inject_checker($connection, $_POST['nisn']);
				$siswa = inject_checker($connection, $_POST['nama_siswa']);
				$nama = ucwords($siswa);
				$jenkel = inject_checker($connection, $_POST['jenkel']);
				$tmpt = inject_checker($connection, $_POST['tmpt_lahir']);
				$tmpt_lahir = ucwords($tmpt);
				$tgl = inject_checker($connection, $_POST['tgl_lahir']);
				$tgl_lahir = date('Y-m-d', strtotime($tgl));
				$i_wali = inject_checker($connection, $_POST['nama_wali']);
				$wali = ucwords($i_wali);
				$tingkat = inject_checker($connection, $_POST['tingkat']);
				$kelas = inject_checker($connection, $_POST['kelas']);
				$rombel = inject_checker($connection, $_POST['rombel']);
				$alam = inject_checker($connection, $_POST['alamat']);
				$alamat = ucwords($alam);
				$angkatan = inject_checker($connection, $_POST['angkatan']);

				$cari_bae = mysqli_query($connection, "SELECT nisn FROM tbl_siswa WHERE nisn='{$nisn}' AND id_tajaran='{$angkatan}'");
				$matek = mysqli_num_rows($cari_bae);

				if ($matek == 1) {
					// include_once 'switch/pesan-gagal.php';
					echo "<script type='text/javascript'>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Data gagal disimpan',
						text:  'NISN Sudah ada!!',
						type: 'error',
						showConfirmButton: false,
						timer: 3200
						});
						window.setTimeout(function(){ 
							window.location.replace('index.php?page=siswa&act=tambah');
							} ,3000); 
							</script>";
				} else {
					$qsiswa = mysqli_query(
						$connection,"INSERT INTO tbl_siswa (nisn, nama_siswa, jenkel, tmpt_lahir, tgl_lahir, nama_wali, id_rombel, alamat,id_tajaran) VALUES ('{$nisn}', '{$nama}', '{$jenkel}', '{$tmpt_lahir}', '{$tgl_lahir}', '{$wali}', '{$rombel}', '{$alamat}', '{$angkatan}')");
					if ($qsiswa == true) {
						echo "<script type='text/javascript'>
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Data berhasil disimpan',
						text:  'Mohon bersabar, halaman akan otomatis teralihkan ke index data.',
						type: 'success',
						showConfirmButton: false,
						timer: 3200
						});
						window.setTimeout(function(){ 
							window.location.replace('index.php?page=siswa&act=lihat_data&id=$rombel');
							} ,3000); 
							</script>";
					} else {
						// include_once 'switch/pesan-gagal.php';
						echo "<script type='text/javascript'>
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Data gagal disimpan',
						text:  'periksa kembali inputan data!!.',
						type: 'error',
						showConfirmButton: false,
						timer: 3200
						});
						window.setTimeout(function(){ 
							window.location.replace('index.php?page=siswa&act=tambah');
							} ,3000); 
							</script>";
					}
				}

				break;

			case 'ubah':
				if (isset($_POST['simpan'])) {
					$id = inject_checker($connection, $_POST['id_siswa']);
					$nisn = inject_checker($connection, $_POST['nisn']);
					$siswa = inject_checker($connection, $_POST['nama_siswa']);
					$nama = ucwords($siswa);
					$jenkel = inject_checker($connection, $_POST['jenkel']);
					$tmpt = inject_checker($connection, $_POST['tmpt_lahir']);
					$tmpt_lahir = ucwords($tmpt);
					$tgl = inject_checker($connection, $_POST['tgl_lahir']);
					$tgl_lahir = date('Y-m-d', strtotime($tgl));
					$i_wali = inject_checker($connection, $_POST['wali']);
					$wali = ucwords($i_wali);
					$tingkat = inject_checker($connection, $_POST['tingkat']);
					$kelas = inject_checker($connection, $_POST['kelas']);
					$rombel = inject_checker($connection, $_POST['rombel']);
					$alam = inject_checker($connection, $_POST['alamat']);
					$alamat = ucwords($alam);
					$angkatan = inject_checker($connection, $_POST['angkatan']);

					$qsiswa = mysqli_query($connection, "UPDATE tbl_siswa SET nisn = '{$nisn}', nama_siswa = '{$nama}', jenkel = '{$jenkel}', tmpt_lahir = '{$tmpt_lahir}', 
					tgl_lahir = '{$tgl_lahir}', nama_wali = '{$wali}', id_rombel = '{$rombel}', alamat = '{$alamat}', id_tajaran = '{$angkatan}' WHERE id_siswa = '{$id}'");
					if ($qsiswa == true) {
						/* untuk alamat */
						echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Data berhasil disimpan',
					text:  'Mohon bersabar, halaman akan otomatis teralihkan ke index data.',
					type: 'success',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=siswa&act=lihat_data&id=$rombel');
						} ,3000); 
					</script>";
					} else {
						// include_once 'switch/pesan-gagal.php';
						echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'Data gagal disimpan',
					text:  'periksa kembali inputan data!!.',
					type: 'error',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=siswa&act=edit&id=$id');
						} ,3000); 
					</script>";
					}
				} else {
					// include_once 'switch/pesan-gagal.php';
					echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'Data gagal disimpan',
					text:  'periksa kembali inputan data!!.',
					type: 'error',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=siswa&act=edit&id=$id');
						} ,3000); 
					</script>";
				}
				break;

			case 'hapus':
				if (isset($_GET['id'])) {
					$ids = $_GET['id'];

					$cari_siswa = mysqli_query($connection, "SELECT id_rombel FROM tbl_siswa WHERE id_siswa='{$ids}' AND id_tajaran='{$id_sem}'");
					$hslny = mysqli_fetch_assoc($cari_siswa);

					$query = mysqli_query($connection, "DELETE FROM tbl_siswa WHERE id_siswa='$ids'");

					// cek hasil query
					if ($query == true) {
						echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Data berhasil dihapus',
					text:  'Mohon bersabar, halaman akan otomatis teralihkan ke index data.',
					type: 'success',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=siswa&act=lihat_data&id=$hslny[id_rombel]');
						} ,3000); 
					</script>";
					}
				} else {
					// include_once 'switch/gagal-kelurahan.php';
					echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'Data gagal dihapus',
					type: 'error',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=siswa&act=lihat_data&id=$hslny[id_rombel]');
						} ,3000); 
					</script>";
				}
				break;

			default:
				echo '<meta http-equiv="refresh" content="0;url=index.php?page=siswa">';
				break;
		}
?>
<?php }
} ?>