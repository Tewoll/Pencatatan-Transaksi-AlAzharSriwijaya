<?php
$baca = "index.php?page=";
$bgp = isset($_GET["page"]) ? $_GET["page"] : "";
if (empty($bgp)) {
    header("Location:../../login.php");
} elseif ($bgp == "index.php?page=") {
    header("Location:../../login.php");
} else {
    if ($level != "admin") {
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
        $dct = isset($_GET["data"]) ? $_GET["data"] : "";
        $dct = inject_checker($connection, $dct);
        switch ($dct) {
            case "tambah":
                $id_siswa = inject_checker($connection, $_POST["siswa"]);
                $tgl = inject_checker($connection, $_POST["tgl_bayar"]);
                $tgl_bayar = date("Y-m-d", strtotime($tgl));
                $ket = inject_checker($connection, $_POST["tombolLunas"]);
                $metode = inject_checker($connection, $_POST["metode"]);
                $tahun = $id_sem;
                $jml_dib = inject_checker($connection, $_POST["jml_dibyarkan"]);
                $jml_dibyarkan = preg_replace("/[^0-9]/", "", $jml_dib); // Bukti Bayar
                // var_dump($jml_dibyarkan);
                // die();
                $lokasi_file = $_FILES["b_bayar"]["tmp_name"];
                $ekstensi = ["png", "jpg", "jpeg", "gif"];
                $nama_file = $_FILES["b_bayar"]["name"];
                $acak = rand(1, 99);
                $ukuran = $_FILES["b_bayar"]["size"];
                $n_gambar = $acak . $nama_file;
                $nm_gambar = md5($n_gambar);
                $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
                
                $nama_gambar = $nm_gambar . ".$ext";

                $query = mysqli_query($connection, "SELECT MAX(kd_bayar_baju) as kode FROM tbl_pembayaran_baju");
                $kdbay = mysqli_fetch_array($query);
                $kode_bayar = $kdbay["kode"]; //ambil data terbesar
                $char = "BYRBJ";
                $query = mysqli_query(
                    $connection,
                    "SELECT MAX(kd_bayar_baju) as kode FROM tbl_pembayaran_baju
				WHERE kd_bayar_baju LIKE '{$char}%' ORDER BY kd_bayar_baju DESC LIMIT 1"
                );
                $data = mysqli_fetch_array($query);

                $kodebayar = $data["kode"];
                $no = substr($kodebayar, -4, 4);
                $no = (int) $no;
                $no += 1;
                $kd_bayar = $char . sprintf("%04s", $no);
                $kosong = "0";
                $seragam = $_POST["seragam"];
                if ($id_siswa == null) {
                    // include_once 'switch/pesan-gagal.php';
                    echo '<meta http-equiv="refresh" content="2;url=index.php?page=bayar-baju">';
                } else {
                    ($qbayar = mysqli_query(
                        $connection,
                        "INSERT INTO tbl_pembayaran_baju (kd_bayar_baju, id_siswa, jumlah_byr, tgl_bayar, metode_bayar, ket, id_tahun) 
					VALUES ('{$kd_bayar}','{$id_siswa}', '{$kosong}', '{$tgl_bayar}', '{$metode}', '{$ket}', '{$tahun}')"
                    )) or die("Ada kesalahan pada query " . mysqli_error($connection));
                    if ($qbayar == true) {
                        foreach ($seragam as $index => $items) {
                            $items = $items;
                            $query = "INSERT INTO detail_pembayaran_baju (kd_bayar_baju,id_ktgr_baju,harga_item) 
							VALUES ('$kd_bayar','$items','$kosong')";
                            $query_run = mysqli_query($connection, $query);
                            $query = "UPDATE tbl_ktgr_baju SET stok=(stok-1) WHERE id_ktgr_baju = '{$items}'";
                            $query_run = mysqli_query($connection, $query);
                            $qse = mysqli_query(
                                $connection,
                                "SELECT harga FROM tbl_ktgr_baju WHERE id_ktgr_baju = '{$items}'"
                            );
                            while ($e = mysqli_fetch_assoc($qse)) {
                                $hrg = $e["harga"];
                                mysqli_query(
                                    $connection,
                                    "UPDATE detail_pembayaran_baju SET harga_item = '{$hrg}' WHERE kd_bayar_baju = '{$kd_bayar}' AND id_ktgr_baju = '{$items}'"
                                );
                            }
                        }
                        $qsel = "SELECT SUM(tbl_ktgr_baju.harga) as jumlah FROM detail_pembayaran_baju, tbl_ktgr_baju WHERE detail_pembayaran_baju.id_ktgr_baju=tbl_ktgr_baju.id_ktgr_baju AND kd_bayar_baju = '{$kd_bayar}'";
                        $run_qsel = mysqli_query($connection, $qsel);
                        $row = mysqli_fetch_assoc($run_qsel);

                        $jumlah = $row["jumlah"];
                        if (!empty($lokasi_file)) {
                            $folder = "dist/img/bukti_bayar/"; // folder untuk foto
                            $qb_bayar = mysqli_query(
                                $connection,
                                "UPDATE tbl_pembayaran_baju SET b_bayar = '{$nama_gambar}' WHERE kd_bayar_baju = '{$kd_bayar}'"
                            );
                            if ($qb_bayar == true) {
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
                                "UPDATE tbl_pembayaran_baju SET jml_dibyarkan = '{$jml_dibyarkan}' WHERE kd_bayar_baju = '{$kd_bayar}'"
                            );
                        }
                        //Ubah Jumlah Pembayaran
                        mysqli_query(
                            $connection,
                            "UPDATE tbl_pembayaran_baju SET jumlah_byr = '{$jumlah}' WHERE kd_bayar_baju = '{$kd_bayar}'"
                        ); 
                        // Buat Invoice
                        $cari_invoice = mysqli_query(
                            $connection,
                            "SELECT MAX(invoice) as invoice FROM tbl_invoice"
                        );
                        $tah = mysqli_fetch_array($cari_invoice);
                        $noinvo = $tah["invoice"];
                        $no = substr($noinvo, -5, 5);
                        $no = (int) $no;
                        $no += 1;
                        $tahun = date("Y");
                        $aw = "AZH-SRW";
                        $slash = "/";
                        $no_invoice =
                            $aw . $slash . $tahun . $slash . sprintf("%05s", $no);
                        $buat_invoice = mysqli_query(
                            $connection,
                            "INSERT INTO tbl_invoice (invoice,kd_bayar) VALUES ('$no_invoice','$kd_bayar')"
                        );
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
                                window.location.replace('index.php?page=bayar-baju&act=lihat&id=$kd_bayar');
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
							window.location.replace('index.php?page=bayar-baju&act=tambah');
							} ,3000); 
							</script>";
                    }
                }
                break;
            case 'lunas':
                $id = inject_checker($connection, $_POST["id_baju"]);
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

                $qdata = mysqli_query($connection, "SELECT * FROM tbl_pembayaran_baju WHERE id_bayar_baju = '{$id}' AND ket != '{$ket}'");
                $cekdata = mysqli_num_rows($qdata);
                if ($cekdata > 0) {
                    $data = mysqli_fetch_array($qdata);
                    $kd = $data['kd_bayar_baju'];
                    
                    if (!empty($lokasi_file)) {
                        $folder = "dist/img/bukti_bayar/"; // folder untuk foto
                        $tambah_lunas = mysqli_query($connection, "INSERT INTO tbl_pelunasan (id_bayar, kd_bayar, jml_bayar_lunas, metode, tgl_bayar, b_bayar) 
                        VALUES ('{$id}','{$kd}','{$jml}','{$metode}', '{$tgl_bayar}','{$nama_gambar}')");
                        
                        if ($tambah_lunas == true) {
                            move_uploaded_file($lokasi_file, $folder . $nama_gambar);
                        }
                    }else{
                        mysqli_query($connection, "INSERT INTO tbl_pelunasan (id_bayar, kd_bayar, jml_bayar_lunas, metode, tgl_bayar) 
                        VALUES ('{$id}','{$kd}', '{$jml}','{$metode}', '{$tgl_bayar}')");
                    }
                }
                
                if (!empty($lokasi_file)) {
                    mysqli_query($connection, "UPDATE tbl_pembayaran_baju SET metode_bayar = '{$metode}', tgl_bayar ='{$tgl_bayar}', ket = '{$ket}', b_bayar = '{$nama_gambar}', jml_dibyarkan = '{$dibayar}' WHERE id_bayar_baju = '{$id}'");
                }else{
                    mysqli_query($connection, "UPDATE tbl_pembayaran_baju SET metode_bayar = '{$metode}', tgl_bayar ='{$tgl_bayar}', ket = '{$ket}', jml_dibyarkan = '{$dibayar}' WHERE id_bayar_baju = '{$id}'");
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
                        window.location.replace('index.php?page=bayar-baju');
                        } ,3000); 
                        </script>";
                break;
            case 'ubah_metode':
                if (isset($_POST['simpan'])) {
                    $id             = inject_checker($connection, $_POST['id_bayar']);
                    $metode         = inject_checker($connection, $_POST['metode']);

                    $lokasi_file = $_FILES["b_bayar"]["tmp_name"];
                    $ekstensi = ["png", "jpg", "jpeg", "gif"];
                    $nama_file = $_FILES["b_bayar"]["name"];
                    $acak = rand(1, 99);
                    $ukuran = $_FILES["b_bayar"]["size"];
                    $n_gambar = $acak . $nama_file;
                    $nm_gambar = md5($n_gambar);
                    $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
                    
                    $nama_gambar = $nm_gambar . ".$ext";
                    // var_dump($nama_gambar);
                    // die();

                    $qdata = mysqli_query($connection, "SELECT id_bayar_baju, b_bayar FROM tbl_pembayaran_baju WHERE id_bayar_baju = '{$id}'");
                    $cekdata = mysqli_num_rows($qdata);

                    if ($cekdata > 0) {
                        if ($metode == 'Tunai') {
                            mysqli_query($connection, "UPDATE tbl_pembayaran_baju SET metode_bayar = '{$metode}', b_bayar = null WHERE id_bayar_baju = '{$id}'");
                            $foto_lama = inject_checker($connection, $_POST['foto_lama']);
                            if ($foto_lama != null) {
                                unlink("dist/img/bukti_bayar/$foto_lama");
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
                                    window.location.replace('index.php?page=bayar-baju');
                                    } ,3000); 
                                    </script>";
                        } else{
                            $foto_lama = inject_checker($connection, $_POST['foto_lama']);
                            $qmetode = mysqli_query($connection, "UPDATE tbl_pembayaran_baju SET metode_bayar = '{$metode}', b_bayar = '{$nama_gambar}' WHERE id_bayar_baju = '{$id}'");
                            if ($qmetode == true) {
                                $folder = "dist/img/bukti_bayar/"; // folder untuk foto
                                if ($foto_lama != null) {
                                    unlink("dist/img/bukti_bayar/$foto_lama");
                                }
                                move_uploaded_file($lokasi_file, $folder . $nama_gambar);

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
                                            window.location.replace('index.php?page=bayar-baju');
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
                                            window.location.replace('index.php?page=sarana&act=edit&id=$id');
                                            } ,3000); 
                                            </script>";
                            }
                        }
                    }
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
                                window.location.replace('index.php?page=sarana&act=edit&id=$id');
                                } ,3000); 
                                </script>";
                }

                break;
            case "hapus":
                if (isset($_GET["id"])) {
                    $ids = $_GET["id"];
                    $qlokasi = mysqli_query(
                        $connection,
                        "SELECT b_bayar FROM tbl_pembayaran_baju WHERE kd_bayar_baju='$ids'"
                    );
                    $lok = mysqli_fetch_assoc($qlokasi);
                    $foto_lama = $lok["b_bayar"];
                    $query = mysqli_query(
                        $connection,
                        "DELETE FROM tbl_pembayaran_baju WHERE kd_bayar_baju='$ids'"
                    ); // cek hasil query
                    if ($query == true) {
                        mysqli_query(
                            $connection,
                            "DELETE FROM detail_pembayaran_baju WHERE kd_bayar_baju='$ids'"
                        );
                        mysqli_query(
                            $connection,
                            "DELETE FROM tbl_invoice WHERE kd_bayar='$ids'"
                        );
                        if ($foto_lama == true) {
                            unlink("dist/img/bukti_bayar/$foto_lama");
                        }
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
                                window.location.replace('index.php?page=bayar-baju');
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
						window.location.replace('index.php?page=bayar-baju');
						} ,3000); 
					</script>";
                }
                break;
            default:
                echo '<meta http-equiv="refresh" content="0;url=index.php?page=bayar-baju">';
                break;
        }
?>
<?php
    }
} ?>
