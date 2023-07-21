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
			
			$seragam = inject_checker($connection,$_POST['seragam']);
			$nama = ucwords($seragam);
			$id_tingkat = inject_checker($connection,$_POST['tingkat']);
			$id_tipe = inject_checker($connection,$_POST['type']);
			$jk = inject_checker($connection,$_POST['jk']);
			$uku = inject_checker($connection,$_POST['ukuran']);
			$ukuran = ucwords($uku);
			$jen = inject_checker($connection,$_POST['jenis_seragam']);
			$jenis_seragam = ucwords($jen);
			$rego = inject_checker($connection,$_POST['harga']);
			$harga=preg_replace("/[^0-9]/","",$rego);
			$stok = inject_checker($connection,$_POST['stok']);
			$nama = ucwords($seragam);
			// $nama = $nm.' ('.$jk.' Ukuran '.$ukuran.')';


			if($seragam == NULL){
				// include_once 'switch/pesan-gagal.php';
				echo '<meta http-equiv="refresh" content="2;url=index.php?page=ktgr-baju">';
			}else{
				$qbaju = mysqli_query($connection, "INSERT INTO  tbl_ktgr_baju (nm_baju, id_tingkat,jenis_seragam, jk, uk_baju, id_type_pemb, harga, stok)  
				VALUES('{$nama}','{$id_tingkat}','{$jenis_seragam}','{$jk}','{$ukuran}','{$id_tipe}','{$harga}','{$stok}')")OR die('Ada kesalahan pada query '.mysqli_error($connection));
				if ($qbaju == true) {
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
							window.location.replace('index.php?page=ktgr-baju');
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
							window.location.replace('index.php?page=ktgr-baju);
							} ,3000); 
							</script>";
				}
			}
				
	break;
	
	case 'ubah':
		if (isset($_POST['simpan'])) {

			$id = inject_checker($connection,$_POST['id_baju']);
			$seragam = inject_checker($connection,$_POST['seragam']);
			$id_tingkat = inject_checker($connection,$_POST['tingkat']);
			$id_tipe = inject_checker($connection,$_POST['type']);
			$jk = inject_checker($connection,$_POST['jk']);
			$uku = inject_checker($connection,$_POST['ukuran']);
			$ukuran = ucwords($uku);
			$rego = inject_checker($connection,$_POST['harga']);
			$harga=preg_replace("/[^0-9]/","",$rego);
			$stok = inject_checker($connection,$_POST['stok']);
			$nama = ucwords($seragam);
			// $nama = $nm.' ('.$jk.' Ukuran '.$ukuran.')';
			
			
			$qktgrbaj = mysqli_query($connection,"UPDATE tbl_ktgr_baju SET nm_baju = '{$nama}', id_tingkat = '{$id_tingkat}', jk = '{$jk}', uk_baju = '{$ukuran}', id_type_pemb = '{$id_tipe}', harga = '{$harga}', stok = '{$stok}'
			WHERE id_ktgr_baju = '{$id}'") OR die('Ada kesalahan pada query '.mysqli_error($connection));
			if ($qktgrbaj == true) {
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
						window.location.replace('index.php?page=ktgr-baju');
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
						window.location.replace('index.php?page=ktgr-baju&act=edit&id=$id');
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
						window.location.replace('index.php?page=ktgr-baju&act=edit&id=$id');
						} ,3000); 
					</script>";
		}
	break;

	case 'hapus':
		if (isset($_GET['id'])) {
			$ids = $_GET['id'];

			$query = mysqli_query($connection, "DELETE FROM tbl_ktgr_baju WHERE id_ktgr_baju='$ids'") or die('Ada kesalahan pada query delete : '.mysqli_error($connection));

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
						window.location.replace('index.php?page=ktgr-baju');
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
						window.location.replace('index.php?page=ktgr-baju');
						} ,3000); 
					</script>";
		}
	break;
	
	default:
		echo '<meta http-equiv="refresh" content="0;url=index.php?page=ktgr-baju">';
	break;
}
?>
<?php } } ?>