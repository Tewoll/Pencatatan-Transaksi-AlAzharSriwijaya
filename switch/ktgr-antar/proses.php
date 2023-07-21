<?php 
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if(empty($bgp)){
	header("Location:../../login.php");	
}elseif($bgp == 'index.php?page='){
	header("Location:../../login.php");	
}else{
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
	}else{

			
?>
<?php
$dct = isset($_GET['data']) ? $_GET['data'] : '';
$dct = inject_checker($connection,$dct);
switch($dct) 
{
	case 'tambah':
			
			$jenis = inject_checker($connection,$_POST['jenis']);
			$jarak = inject_checker($connection,$_POST['jarak']);
			$id_tipe = inject_checker($connection,$_POST['type']);
			$rego = inject_checker($connection,$_POST['biaya']);
			$biaya=preg_replace("/[^0-9]/","",$rego);


			if($jenis == NULL){
				// include_once 'switch/pesan-gagal.php';
				echo '<meta http-equiv="refresh" content="2;url=index.php?page=ktgr-antar">';
			}else{
				$qantar = mysqli_query($connection, "INSERT INTO  tbl_ktgr_antar (jenis, jarak, id_type_pemb, biaya)  
				VALUES('{$jenis}','{$jarak}','{$id_tipe}','{$biaya}')")OR die('Ada kesalahan pada query '.mysqli_error($connection));
				if ($qantar == true) {
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
							window.location.replace('index.php?page=ktgr-antar');
							} ,3000); 
							</script>";
				}else{
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
							window.location.replace('index.php?page=ktgr-antar);
							} ,3000); 
							</script>";
				}
			}
				
	break;
	
	case 'ubah':
		if (isset($_POST['simpan'])) {

			$id = inject_checker($connection,$_POST['id_antar']);
			$jenis = inject_checker($connection,$_POST['jenis']);
			$jarak = inject_checker($connection,$_POST['jarak']);
			$id_tipe = inject_checker($connection,$_POST['type']);
			$rego = inject_checker($connection,$_POST['biaya']);
			$biaya=preg_replace("/[^0-9]/","",$rego);
			
			
			$qeantar = mysqli_query($connection,"UPDATE tbl_ktgr_antar SET jenis = '{$jenis}', jarak = '{$jarak}', id_type_pemb = '{$id_tipe}', biaya = '{$biaya}'
			WHERE id_ktgr_antar = '{$id}'") OR die('Ada kesalahan pada query '.mysqli_error($connection));
			if ($qeantar == true) {
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
						window.location.replace('index.php?page=ktgr-antar');
						} ,3000); 
					</script>";
			}else{
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
						window.location.replace('index.php?page=ktgr-antar&act=edit&id=$id');
						} ,3000); 
					</script>";
			}
		
		}else { 
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
						window.location.replace('index.php?page=ktgr-antar&act=edit&id=$id');
						} ,3000); 
					</script>";
		}
	break;

	case 'hapus':
		if (isset($_GET['id'])) {
			$ids = $_GET['id'];

			$query = mysqli_query($connection, "DELETE FROM tbl_ktgr_antar WHERE id_ktgr_antar='$ids'") or die('Ada kesalahan pada query delete : '.mysqli_error($connection));

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
						window.location.replace('index.php?page=ktgr-antar');
						} ,3000); 
					</script>";
			}
			
		}else {  
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
						window.location.replace('index.php?page=ktgr-antar');
						} ,3000); 
					</script>";
		}
	break;
	
	default:
		echo '<meta http-equiv="refresh" content="0;url=index.php?page=ktgr-antar">';
	break;
}
?>
<?php } } ?>