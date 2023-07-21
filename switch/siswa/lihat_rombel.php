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

		$sid = isset($_GET['id']) ? $_GET['id'] : '';
		$cid = inject_checker($connection, $sid);
        
        $qdata = "SELECT * FROM tbl_kelas WHERE id_kelas = '{$cid}'";
		$red = mysqli_query($connection, $qdata);
			$e = mysqli_fetch_assoc($red);
			$kelas = $e['nm_kelas'];
            $id_tingkat = $e['id_tingkat'];

        $qdatak = "SELECT * FROM tbl_rombel WHERE id_kelas = '{$cid}'";
		$redk = mysqli_query($connection, $qdatak);
			$ek = mysqli_fetch_assoc($redk);
			$rombel = $ek['nm_rombel'];

        // var_dump($cid);
        // die();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Siswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=index.php">Home</a></li>
                    <li class="breadcrumb-item">Data Siswa</a></li>
                    <li class="breadcrumb-item">Kelas <?=$kelas;?></li>
                    <li class="breadcrumb-item active">Rombel <?=$rombel;?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-footer justify-content-between">
                <a href="index.php?page=siswa&act=lihat_kelas&id=<?=$id_tingkat;?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                
                <a href="index.php?page=siswa" class="btn btn-warning"><i
                                class="fa fa-home"></i> Tingkat</a>
                <a href="index.php?page=siswa&act=tambah" type="button" class="btn btn-primary float-md-right">Tambah Data</a>
            </div>
        </div>
        <div class="row">
            <?php

            $query = mysqli_query($connection, "SELECT * FROM tbl_rombel Where id_kelas={$cid}");
            // var_dump($query);
            // die();
            $result = array(); 
            while ($data = mysqli_fetch_array($query)) {
            $result[] = $data; //result dijadikan array 
            }
            foreach ($result as $key=>$value){                              
                
                $jml = mysqli_query($connection, "SELECT COUNT(id_siswa) as jumlah FROM tbl_siswa, tbl_rombel, tbl_kelas, lib_tingkat 
                WHERE tbl_siswa.id_rombel=tbl_rombel.id_rombel AND tbl_rombel.id_kelas=tbl_kelas.id_kelas AND tbl_kelas.id_tingkat=lib_tingkat.id_tingkat 
                AND id_tajaran='{$id_sem}' AND tbl_rombel.id_rombel='$value[id_rombel]'");
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
                        <h3>Rombel <?=$value['nm_rombel'];?></h3>

                        <p>Jumlah Seluruh Siswa adalah <?=$kunci['jumlah'];?> orang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="index.php?page=siswa&act=lihat_data&id=<?=$value['id_rombel'];?>" class="small-box-footer">Lihat Data Siswa Per-Kelas <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <?php } }?>
        </div>
    </div>
</section>

<?php } ?>
<?php } ?>