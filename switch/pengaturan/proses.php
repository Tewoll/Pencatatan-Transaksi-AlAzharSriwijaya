<?php 
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if(empty($bgp)){
	header("Location:../../login.php");	
}elseif($bgp == 'index.php?page='){
	header("Location:../../login.php");	
}else{

			
?>
<?php
$dct = isset($_GET['data']) ? $_GET['data'] : '';
$dct = inject_checker($connection,$dct);
switch($dct) 
{
	case 'tambahajaran':
		if (isset($_POST['simpan'])) {

			$tahun_ajaran = inject_checker($connection,$_POST['tahun_ajaran']);
			$status = inject_checker($connection,$_POST['status']);

			$qganti = mysqli_query($connection,"INSERT INTO lib_tajaran(tahun_ajaran,status) VALUES ('{$tahun_ajaran}','{$status}')") OR die('Ada kesalahan pada query '.mysqli_error($connection));
			
			if ($qganti == true) {
				/* untuk alamat */
				echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Perubahan data berhasil disimpan',
					text:  'Mohon bersabar, halaman akan otomatis teralihkan ke index data.',
					type: 'success',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
						</script>";
			}else{
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
							window.location.replace('index.php?page=pengaturan');
							} ,3000); 
							</script>";
			}
		
		}else { 
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
							window.location.replace('index.php?page=pengaturan');
							} ,3000); 
							</script>";
		}
	break;

	case 'ubahajaran':
		if (isset($_GET['id'])) {
			$idp = $_GET['id'];

			$query = mysqli_query($connection, "UPDATE lib_tajaran SET status = 'Tidak Aktif'") or die('Ada kesalahan pada query delete : '.mysqli_error($connection));

			// cek hasil query
			if ($query == true) {
				$query = mysqli_query($connection, "UPDATE lib_tajaran SET status = 'Aktif' WHERE id_tajaran = '{$idp}'") or die('Ada kesalahan pada query delete : '.mysqli_error($connection));
				echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Tahun ajaran berhasil diubah',
					text:  'Mohon bersabar, halaman akan otomatis teralihkan ke index data.',
					type: 'success',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
					</script>";
			}
			
		}else {  
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
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
					</script>";
		}
	break;

	case 'hapusajaran':
		if (isset($_GET['id'])) {
			$idp = $_GET['id'];

			$query = mysqli_query($connection, "DELETE FROM lib_tajaran WHERE id_tajaran='$idp'") or die('Ada kesalahan pada query delete : '.mysqli_error($connection));

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
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
					</script>";
			}
			
		}else {  
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
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
					</script>";
		}
	break;

	case 'tambah':
			
			$user = inject_checker($connection,$_POST['user']);
			$level = inject_checker($connection,$_POST['level']);
			$psu = $_POST['pass'];
			
			
			$ps = sha1($psu);
			$qagt = mysqli_query($connection, "INSERT INTO tbl_user(username, pass, level)  VALUES('{$user}', '{$ps}', '{$level}')")OR die('Ada kesalahan pada query '.mysqli_error($connection));
			if ($qagt == true) {
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
							window.location.replace('index.php?page=pengaturan');
							} ,3000); 
							</script>";
			}else{
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
							window.location.replace('index.php?page=pengaturan&act=tambah');
							} ,3000); 
							</script>";
			}
				
			
	break;
	
	case 'ubah':
		if (isset($_POST['simpan'])) {

			$id_user = inject_checker($connection,$_POST['id_user']);
			$username = inject_checker($connection,$_POST['username']);
			$level = inject_checker($connection,$_POST['level']);
			$psu = $_POST['ps_user'];

				if($psu == NULL){
					$qagt = mysqli_query($connection,"UPDATE tbl_user SET username = '{$username}', level = '{$level}' WHERE id_user = '{$id_user}'") OR die('Ada kesalahan pada query '.mysqli_error($connection));
				}else{
					$ps = sha1($psu);
					$qagt = mysqli_query($connection,"UPDATE tbl_user SET username = '{$username}', pass = '{$ps}', level = '{$level}' WHERE id_user = '{$id_user}'") OR die('Ada kesalahan pada query '.mysqli_error($connection));
				}
			
			if ($qagt == true) {
				/* untuk alamat */
				echo "<script type='text/javascript'>
				Swal.fire({
					position: 'center',
					icon: 'success',
					title: 'Perubahan data berhasil disimpan',
					text:  'Mohon bersabar, halaman akan otomatis teralihkan ke index data.',
					type: 'success',
					showConfirmButton: false,
					timer: 3200
					});
					window.setTimeout(function(){ 
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
						</script>";
			}else{
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
							window.location.replace('index.php?page=pengaturan');
							} ,3000); 
							</script>";
			}
		
		}else { 
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
							window.location.replace('index.php?page=pengaturan');
							} ,3000); 
							</script>";
		}
	break;

	case 'hapus':
		if (isset($_GET['id'])) {
			$idp = $_GET['id'];

			$query = mysqli_query($connection, "DELETE FROM tbl_user WHERE id_user='$idp'") or die('Ada kesalahan pada query delete : '.mysqli_error($connection));

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
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
					</script>";
			}
			
		}else {  
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
						window.location.replace('index.php?page=pengaturan');
						} ,3000); 
					</script>";
		}
	break;
	
	default:
		echo '<meta http-equiv="refresh" content="0;url=index.php?page=pengaturan">';
	break;
}
?>
<?php } ?>