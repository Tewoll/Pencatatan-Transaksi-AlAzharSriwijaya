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

				$id_kelas = inject_checker($connection, $_POST['id_kelas']);
				$rombel = inject_checker($connection, $_POST['nm_rombel']);
				$awal = ucwords($rombel);

				if ($id_kelas == NULL) {
					// include_once 'switch/pesan-gagal.php';
					echo '<meta http-equiv="refresh" content="2;url=index.php?page=rombel">';
				} else {
					$qrombel = mysqli_query($connection, "INSERT INTO tbl_rombel(id_kelas,nm_rombel)  VALUES('{$id_kelas}','{$awal}')") or die('Ada kesalahan pada query ' . mysqli_error($connection));
					if ($qrombel == true) {
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
							window.location.replace('index.php?page=rombel');
							} ,3000); 
							</script>";
					} else {
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
							window.location.replace('index.php?page=rombel&act=tambah');
							} ,3000); 
							</script>";
					}
				}

				break;

			case 'ubah':
				if (isset($_POST['simpan'])) {

					$id = inject_checker($connection, $_POST['id_rombel']);
					$id_kelas = inject_checker($connection, $_POST['id_kelas']);
					$rombel = inject_checker($connection, $_POST['nm_rombel']);
					$awal = ucwords($rombel);

					$qerombel = mysqli_query($connection, "UPDATE tbl_rombel SET id_kelas = '{$id_kelas}', nm_rombel = '{$awal}' WHERE id_rombel = '{$id}'") or die('Ada kesalahan pada query ' . mysqli_error($connection));
					if ($qerombel == true) {
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
						window.location.replace('index.php?page=rombel');
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
						window.location.replace('index.php?page=rombel&act=edit&id=$id');
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
						window.location.replace('index.php?page=rombel&act=edit&id=$id');
						} ,3000); 
					</script>";
				}
				break;

			case 'hapus':
				if (isset($_GET['id'])) {
					$ids = $_GET['id'];

					$query = mysqli_query($connection, "DELETE FROM tbl_rombel WHERE id_rombel='$ids'") or die('Ada kesalahan pada query delete : ' . mysqli_error($connection));

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
						window.location.replace('index.php?page=rombel');
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
						window.location.replace('index.php?page=rombel');
						} ,3000); 
					</script>";
				}
				break;

			default:
				echo '<meta http-equiv="refresh" content="0;url=index.php?page=rombel">';
				break;
		}
?>
<?php }
} ?>