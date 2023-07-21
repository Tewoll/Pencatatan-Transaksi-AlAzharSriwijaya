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
                $id_siswa = inject_checker($connection, $_POST['siswa']);
				$tgl = inject_checker($connection, $_POST['tgl_bayar']);
				$tgl_bayar = date('Y-m-d', strtotime($tgl));
				$masa_bulan = inject_checker($connection, $_POST['masa_bulan']);
				$masa_tahun = inject_checker($connection, $_POST['masa_tahun']);
                $ket = inject_checker($connection, $_POST["tombolLunas"]);
				$detail = inject_checker($connection, $_POST['detail']);
				$metode = inject_checker($connection, $_POST['metode']);
				$tahun = $id_sem;
                $jml_dib = inject_checker($connection, $_POST["jml_dibyarkan"]);
                $jml_dibyarkan = preg_replace("/[^0-9]/", "", $jml_dib); // Bukti Bayar
				
                $lokasi_file = $_FILES["b_bayar"]["tmp_name"];
				$ekstensi = ["png", "jpg", "jpeg", "gif"];
				$nama_file = $_FILES["b_bayar"]["name"];
				$acak = rand(1, 99);
				$ukuran = $_FILES["b_bayar"]["size"];
				$n_gambar = $acak . $nama_file;
				$nm_gambar = md5($n_gambar);
				$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
				
				$nama_gambar = $nm_gambar . ".$ext";


				$query = mysqli_query($connection, "SELECT MAX(kd_bayar_antar) as kode FROM tbl_pembayaran_antar");
				$kdbay = mysqli_fetch_array($query);
				$kode_bayar = $kdbay['kode'];
				
				//ambil data terbesar 
				$char = 'BYRANTR';
				$query=mysqli_query($connection,"SELECT MAX(kd_bayar_antar) as kode FROM tbl_pembayaran_antar
				WHERE kd_bayar_antar LIKE '{$char}%' ORDER BY kd_bayar_antar DESC LIMIT 1");
				$data = mysqli_fetch_array($query);
				$kodebayar = $data['kode'];

				$no = substr($kodebayar, -4, 4);
				$no = (int) $no;
				$no += 1;

				$kd_bayar = $char . sprintf("%04s", $no);

				$kosong = '0';
				$antar = $_POST['antar'];

				if ($id_siswa == null) {
					// include_once 'switch/pesan-gagal.php';
					echo '<meta http-equiv="refresh" content="2;url=index.php?page=bayar-antar">';
				} else {
					($qbayar = mysqli_query($connection, "INSERT INTO tbl_pembayaran_antar (kd_bayar_antar, id_siswa, masa_bulan, masa_tahun, jml_bayar, tgl_bayar, detail, metode_bayar, ket, id_tahun) 
					VALUES ('{$kd_bayar}','{$id_siswa}', '{$masa_bulan}', '{$masa_tahun}', '{$kosong}', '{$tgl_bayar}', '{$detail}', '{$metode}', '{$ket}', '{$tahun}')")) or die('Ada kesalahan pada query ' . mysqli_error($connection)); 
                    
					if ($qbayar == true) {
                        $query = "INSERT INTO detail_pembayaran_antar (kd_bayar_antar,id_ktgr_antar, harga_item) VALUES ('$kd_bayar','$antar','$kosong')";
                        $query_run = mysqli_query($connection, $query);
                            
						$qsel = "SELECT SUM(tbl_ktgr_antar.biaya) as jumlah FROM detail_pembayaran_antar, tbl_ktgr_antar WHERE detail_pembayaran_antar.id_ktgr_antar=tbl_ktgr_antar.id_ktgr_antar AND kd_bayar_antar = '{$kd_bayar}'";
						$run_qsel = mysqli_query($connection, $qsel);
						$row = mysqli_fetch_assoc($run_qsel);
						$jumlah = $row['jumlah'];
						if (!empty($lokasi_file)) {
                            $folder = "dist/img/bukti_bayar/"; // folder untuk foto
                            $qb_bay = mysqli_query(
                                $connection,
                                "UPDATE tbl_pembayaran_antar SET b_bayar = '{$nama_gambar}' WHERE kd_bayar_antar = '{$kd_bayar}'"
                            );
                            if ($qb_bay == true) {
                                move_uploaded_file(
                                    $lokasi_file,
                                    $folder . $nama_gambar
                                );
                            }
                        } 
                        //Jika Belum Lunas
                        if ($ket != "Lunas") {
                            mysqli_query(
                                $connection,
                                "UPDATE tbl_pembayaran_antar SET jml_dibyarkan = '{$jml_dibyarkan}' WHERE kd_bayar_antar = '{$kd_bayar}'"
                            );
                        }
						mysqli_query($connection, "UPDATE tbl_pembayaran_antar SET jml_bayar = '{$jumlah}' WHERE kd_bayar_antar = '{$kd_bayar}'");
						mysqli_query($connection, "UPDATE detail_pembayaran_antar SET harga_item = '{$jumlah}' WHERE kd_bayar_antar = '{$kd_bayar}' AND id_ktgr_antar = '{$antar}'");
						
						// Buat Invoice
						$cari_invoice = mysqli_query($connection,"SELECT MAX(invoice) as invoice FROM tbl_invoice");

						$tah = mysqli_fetch_array($cari_invoice);
						$noinvo = $tah['invoice'];

						$no = substr($noinvo, -5, 5);
						$no = (int) $no;
						$no += 1;
						$tahun = date('Y');
						$aw = 'AZH-SRW';
						$slash = '/';

						$no_invoice = $aw.$slash.$tahun.$slash. sprintf("%05s", $no);

						$buat_invoice = mysqli_query($connection,"INSERT INTO tbl_invoice (invoice,kd_bayar) VALUES ('$no_invoice','$kd_bayar')");

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
								window.location.replace('index.php?page=bayar-antar&act=lihat&id=$kd_bayar');
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
								window.location.replace('index.php?page=bayar-antar&act=tambah');
								} ,3000); 
								</script>";
					}
				}

				break;

			case 'lunas':
				$id = inject_checker($connection, $_POST["id_antar"]);
				$ket = inject_checker($connection, $_POST["ket"]);
				$jmla = inject_checker($connection, $_POST["jml_bayar_lunas"]);
				$jml = preg_replace("/[^0-9]/", "", $jmla);
				$metode = inject_checker($connection, $_POST["metode"]);
				$tgl = inject_checker($connection, $_POST["tgl_bayar"]);
				$tgl_bayar = date("Y-m-d", strtotime($tgl));
				
				$dibayar = inject_checker($connection, $_POST["dibayar"]);
				// var_dump($dibayar);
				// die();

				// foto
				
				$lokasi_file = $_FILES["b_bayar"]["tmp_name"];
				$ekstensi = ["png", "jpg", "jpeg", "gif"];
				$nama_file = $_FILES["b_bayar"]["name"];
				$acak = rand(1, 99);
				$ukuran = $_FILES["b_bayar"]["size"];
				$n_gambar = $acak . $nama_file;
				$nm_gambar = md5($n_gambar);
				$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
				$nama_gambar = $nm_gambar . ".$ext";

				$qdata = mysqli_query($connection, "SELECT * FROM tbl_pembayaran_antar WHERE id_bayar_antar = '{$id}' AND ket != '{$ket}'");
				$cekdata = mysqli_num_rows($qdata);
				if ($cekdata > 0) {
					$data = mysqli_fetch_array($qdata);
					$kd = $data['kd_bayar_antar'];
					
					if (!empty($lokasi_file)) {
						$folder = "dist/img/bukti_bayar/"; // folder untuk foto
						$tambah_lunas = mysqli_query($connection, "INSERT INTO tbl_pelunasan (id_bayar, kd_bayar, jml_bayar_lunas, metode, tgl_bayar, b_bayar) 
						VALUES ('{$id}','{$kd}','{$jml}','{$metode}', '{$tgl_bayar}','{$nama_gambar}')");
						
						if ($tambah_lunas == true) {
							move_uploaded_file($lokasi_file, $folder . $nama_gambar);
						}
					}else{
						mysqli_query($connection, "INSERT INTO tbl_pelunasan (id_bayar, kd_bayar, jml_bayar_lunas, metode, tgl_bayar) 
						VALUES ('{$id}','{$kd}', '{$jml}','{$metode}','{$tgl_bayar}')");
					}
				}
				
				if (!empty($lokasi_file)) {
					mysqli_query($connection, "UPDATE tbl_pembayaran_antar SET metode_bayar = '{$metode}', tgl_bayar ='{$tgl_bayar}', ket = '{$ket}', b_bayar = '{$nama_gambar}', jml_dibyarkan = '{$dibayar}' WHERE id_bayar_antar = '{$id}'");
				}else{
					mysqli_query($connection, "UPDATE tbl_pembayaran_antar SET metode_bayar = '{$metode}', tgl_bayar ='{$tgl_bayar}', ket = '{$ket}', jml_dibyarkan = '{$dibayar}' WHERE id_bayar_antar = '{$id}'");
				}
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
						window.location.replace('index.php?page=bayar-antar');
						} ,3000); 
						</script>";
				break;
			case 'hapus':
				if (isset($_GET['id'])) {
					$ids = $_GET['id'];

					($query = mysqli_query($connection, "DELETE FROM tbl_pembayaran_antar WHERE kd_bayar_antar='$ids'")) or die('Ada kesalahan pada query delete : ' . mysqli_error($connection));

					// cek hasil query
					if ($query == true) {
						($qx = mysqli_query($connection, "DELETE FROM detail_pembayaran_antar WHERE kd_bayar_antar='$ids'")) or die('Ada kesalahan pada query delete : ' . mysqli_error($connection));
						($qz = mysqli_query($connection, "DELETE FROM tbl_invoice WHERE kd_bayar='$ids'")) or die('Ada kesalahan pada query delete : ' . mysqli_error($connection));
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
						window.location.replace('index.php?page=bayar-antar');
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
						window.location.replace('index.php?page=bayar-antar');
						} ,3000); 
					</script>";
				}
				break;

			default:
				echo '<meta http-equiv="refresh" content="0;url=index.php?page=bayar-antar">';
				break;
		}
?>
<?php }
} ?>