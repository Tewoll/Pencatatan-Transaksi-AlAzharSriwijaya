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

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pembayaran Antar Jemput</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran Antar Jemput</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-2">
                                    <a href="index.php?page=bayar-antar&act=tambah" type="button" class="btn btn-block btn-outline-primary">Tambah Pembayaran</a>
                                </div>
                            </div>
                            <!-- Lunas -->
                            <div class="card-header text-sm">
                                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="lunasTab-tab" data-toggle="pill" href="#lunasTab" role="tab" aria-controls="lunasTab" aria-selected="true">Lunas</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="custom-content-below-tabContent">
                                    <div class="tab-pane fade show active" id="lunasTab" role="tabpanel" aria-labelledby="lunasTab-tab">
                                        <div class="card-body text-sm">
                                            <div class="table-responsive">
                                                <table id="tabelLunas" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th style="width: 10px">No</th>
                                                            <th>Kode Bayar</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Masa Periode</th>
                                                            <th>Jumlah Bayar</th>
                                                            <th>Tanggal</th>
                                                            <th>Metode Bayar</th>
                                                            <th>Detail Pelunasan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $query = "SELECT id_bayar_antar, kd_bayar_antar, tbl_siswa.nama_siswa, tbl_pembayaran_antar.id_siswa, masa_bulan, masa_tahun, jml_bayar, tgl_bayar, metode_bayar, b_bayar, ket, jml_dibyarkan FROM tbl_pembayaran_antar, tbl_siswa WHERE tbl_pembayaran_antar.id_siswa = tbl_siswa.id_siswa AND tbl_pembayaran_antar.id_tahun = '$id_sem' AND ket = 'Lunas' ORDER BY tgl_bayar asc";
                                                        $result = mysqli_query($connection, $query);
                                                        $data = mysqli_num_rows($result);
                                                        if ($data > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <?php echo $no; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php echo $row['kd_bayar_antar']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row['nama_siswa']; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php echo $row['masa_bulan'] . ' ' . $row['masa_tahun']; ?>
                                                                    </td>
                                                                    <td class="text-center">Rp.
                                                                        <?php echo $row['jml_bayar']; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                                        echo $tgl_a; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row['metode_bayar'];
                                                                        if ($row['metode_bayar'] == "Transfer") { ?>
                                                                            <a class="btn btn-sm btn-info" href="dist/img/bukti_bayar/<?php echo $row['b_bayar']; ?>" data-toggle="lightbox" data-title="Bukti Transfer"><i class="fas fa-eye" title="Bukti Transfer"></i></a>
                                                                        <?php } ?>
                                                                    </td>

                                                                    <td class="text-center">
                                                                        <?php
                                                                        $cktd = mysqli_query($connection, "SELECT * FROM tbl_pelunasan WHERE id_bayar = '$row[id_bayar_antar]' and kd_bayar = '$row[kd_bayar_antar]'");
                                                                        $cekdata = mysqli_num_rows($cktd);
                                                                        if ($cekdata == true) {
                                                                            $datase = mysqli_fetch_assoc($cktd);
                                                                        ?>

                                                                            <div class="modal fade" id="modal-pelunasan-<?php echo $row['id_bayar_antar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-xl">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">Data Pelunasan</h4>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="card-body text-sm">
                                                                                            <div class="table-responsive">
                                                                                                <table class="table">
                                                                                                    <thead>
                                                                                                        <tr class="text-center">
                                                                                                            <th>Tanggal Bayar</th>
                                                                                                            <th>Jumlah Bayar</th>
                                                                                                            <th>Metode</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php $tgl_sa = tanggal_indo($datase['tgl_bayar']);
                                                                                                                echo $tgl_sa; ?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                Rp.<?php echo $datase['jml_bayar_lunas']; ?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $datase['metode']; ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-pelunasan-<?php echo $row['id_bayar_antar']; ?>"><i class="fas fa-eye"></i></button>

                                                                        <?php } else { ?>
                                                                            -
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a class="btn btn-sm btn-primary" href="index.php?page=bayar-antar&act=lihat&id=<?php echo $row['kd_bayar_antar']; ?>">
                                                                            <i class="fas fa-file-invoice" title="Invoice"></i></a>
                                                                        <a class="btn btn-sm bg-danger" href="#" onClick="confirm_modal('index.php?page=bayar-antar&act=proses&data=hapus&id=<?php echo $row['kd_bayar_antar']; ?>');"><i class='fas fa-trash' title="Hapus"></i></i></a>
                                                                    </td>
                                                                </tr>
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
                                                                                <p>Apa anda akan menghapus data ini ?</p>
                                                                            </div>

                                                                            <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                                                                <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                        <?php
                                                                $no++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php }
} ?>