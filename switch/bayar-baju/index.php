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

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pembayaran Seragam</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Pembayaran Seragam</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-2">
                                    <a href="index.php?page=bayar-baju&act=tambah" type="button" class="btn btn-block btn-outline-primary">Tambah Pembayaran</a>
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
                                                            <th>Total Bayar</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>Metode Bayar</th>
                                                            <th>Detail Pelunasan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, metode_bayar, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, b_bayar, ket, jml_dibyarkan, lib_tajaran.tahun_ajaran FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran AND  ket = 'Lunas' AND tbl_pembayaran_baju.id_tahun = '$id_sem' ORDER BY tgl_bayar ASC";
                                                        $result = mysqli_query($connection, $query);
                                                        $data = mysqli_num_rows($result);
                                                        if ($data > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $no; ?></td>
                                                                    <td class="text-center"><?php echo $row['kd_bayar_baju']; ?></td>
                                                                    <td><?php echo $row['nama_siswa']; ?></td>
                                                                    <td class="text-center">Rp.<?php echo $row['jumlah_byr']; ?></td>
                                                                    <td class="text-center"><?php $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                                                            echo $tgl_a; ?></td>
                                                                    <td class="text-center"><?php echo $row['metode_bayar'];
                                                                                            if ($row['metode_bayar'] == "Transfer") { ?>
                                                                            <a class="btn btn-sm btn-info" href="dist/img/bukti_bayar/<?php echo $row['b_bayar']; ?>" data-toggle="lightbox" data-title="Bukti Transfer"><i class="fas fa-eye" title="Bukti Transfer"></i></a>
                                                                        <?php } ?>
                                                                        <!-- <a href="javascript:void()" data-toggle="modal" data-target="#modal-edit-<?php echo $row['id_bayar_baju']; ?>">&nbsp;<i class="fas fa-edit"></i></a> -->
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php 
                                                                        $cktd = mysqli_query($connection, "SELECT * FROM tbl_pelunasan WHERE id_bayar = '$row[id_bayar_baju]' and kd_bayar = '$row[kd_bayar_baju]'");
                                                                        $cekdata = mysqli_num_rows($cktd);
                                                                        if ($cekdata == true) { 
                                                                        $datase = mysqli_fetch_assoc($cktd);    
                                                                        ?>
                                                                        
                                                                        <div class="modal fade" id="modal-pelunasan-<?php echo $row['id_bayar_baju']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                            <?php $tgl_sa = tanggal_indo($datase['tgl_bayar']); echo $tgl_sa; ?>
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
                                                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-pelunasan-<?php echo $row['id_bayar_baju']; ?>"><i class="fas fa-eye"></i></button>
                                                                        
                                                                        <?php }else{ ?>
                                                                            -
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <small>
                                                                            <?php
                                                                            if ($row['ket'] == "Lunas") {
                                                                            ?>
                                                                                <a class="btn btn-sm btn-info" href="index.php?page=bayar-baju&act=lihat&id=<?php echo $row['kd_bayar_baju']; ?>">
                                                                                    <i class="fas fa-file-invoice" title="Invoice"></i></a>
                                                                            <?php } ?>
                                                                            <!-- <a class="btn btn-sm btn-warning" href="index.php?page=bayar-baju&act=edit&id=<?php echo $row['id_bayar_baju']; ?>">
                                                                                <i class="fas fa-edit"></i></a> -->
                                                                            <a class="btn btn-sm bg-danger" href="#" onClick="confirm_modal('index.php?page=bayar-baju&act=proses&data=hapus&id=<?php echo $row['kd_bayar_baju']; ?>');"><i class='fas fa-trash' title="Hapus"></i></i></a>
                                                                        </small>
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
                            <!-- Belum Lunas -->
                            <div class="card-header text-sm">
                                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="belumLunasTab-tab" data-toggle="pill" href="#belumLunasTab" role="tab" aria-controls="belumLunasTab" aria-selected="true">Belum Lunas</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="custom-content-below-tabContent">
                                    <div class="tab-pane fade show active" id="belumLunasTab" role="tabpanel" aria-labelledby="belumLunasTab-tab">
                                        <div class="card-body text-sm">
                                            <div class="table-responsive">
                                                <table id="tabelBelumLunas" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th style="width: 10px">No</th>
                                                            <th>Kode Bayar</th>
                                                            <th>Nama Siswa</th>
                                                            <th>Total Bayar</th>
                                                            <th>Tanggal Bayar</th>
                                                            <th>Metode Bayar</th>
                                                            <th>Sisa Bayar</th>
                                                            <th class="text-center">Tindakan</th>
                                                            <th ></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, metode_bayar, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, b_bayar, ket, jml_dibyarkan, lib_tajaran.tahun_ajaran FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran AND  ket = 'Belum Lunas' AND tbl_pembayaran_baju.id_tahun = '$id_sem' ORDER BY tgl_bayar ASC";
                                                        $result = mysqli_query($connection, $query);
                                                        $data = mysqli_num_rows($result);
                                                        if ($data > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <?php echo $no; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php echo $row['kd_bayar_baju']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row['nama_siswa']; ?>
                                                                    </td>
                                                                    <td class="text-center">Rp.
                                                                        <?php echo $row['jumlah_byr']; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        $tgl_a = tanggal_indo($row['tgl_bayar']);
                                                                        echo $tgl_a; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php echo $row['metode_bayar'];
                                                                        if ($row['metode_bayar'] == "Transfer") {
                                                                        ?>
                                                                            <a class="btn btn-sm btn-info" href="dist/img/bukti_bayar/<?php echo $row['b_bayar']; ?>" data-toggle="lightbox" data-title="Bukti Transfer">
                                                                                <i class="fas fa-eye" title="Bukti Transfer"></i></a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php $sisa = $row['jumlah_byr'] - $row['jml_dibyarkan']; echo 'Rp. ' . $sisa; ?>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-lunas-<?php echo $row['id_bayar_baju']; ?>">
                                                                            Pelunasan</button>
                                                                    </td>
                                                                    <td class="text-center"><small>
                                                                            <a class="btn btn-sm btn-info" href="index.php?page=bayar-baju&act=lihat&id=<?php echo $row['kd_bayar_baju']; ?>">
                                                                                <i class="fas fa-file-invoice" title="Invoice"></i></a>
                                                                            <a class="btn btn-sm bg-danger" href="#" onClick="confirm_modal('index.php?page=bayar-baju&act=proses&data=hapus&id=<?php echo $row['kd_bayar_baju']; ?>');"><i class='fas fa-trash' title="Hapus"></i></i></a>
                                                                        </small>
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
                                                                <div class="modal fade" id="modal-lunas-<?php echo $row['id_bayar_baju']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-xl">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Tambah Pelunasan</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form method="POST" class="form-horizontal" action="index.php?page=bayar-baju&act=proses&data=lunas" id="form1" method="post" name="lunas" enctype="multipart/form-data">
                                                                                <input type="hidden" class="form-control form-control-border" name="id_baju" value="<?php echo $row['id_bayar_baju']; ?>">
                                                                                <input type="hidden" class="form-control form-control-border" name="ket" value="Lunas">
                                                                                <input type="hidden" name="dibayar" value="<?php echo $row['jumlah_byr']; ?>">
                                                                                <div class="modal-body">
                                                                                    <div class="card-body">
                                                                                        <div class="row text-xs">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputBorder">Nama Siswa</label>
                                                                                                    <input type="text" name="nama_siswa" value="<?php echo $row['nama_siswa']; ?>" class=" form-control form-control-border" disabled>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputBorder">Kode Bayar</label>
                                                                                                    <input type="text" name="kode_bayar" value="<?php echo $row['kd_bayar_baju']; ?>" class=" form-control form-control-border" disabled>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputBorder">Harga</label>
                                                                                                    <input type="text" name="harga" onkeypress="return hanyaAngka(event)" value="Rp. <?php echo $row['jumlah_byr']; ?>" class="form-control form-control-border" disabled />
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputBorder">Yang Sudah Dibayarkan </label>
                                                                                                    <input type="text" name="sisa" onkeypress="return hanyaAngka(event)" value="Rp. <?php echo $sisa; ?>" class="form-control form-control-border" disabled />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label>Tanggal Bayar<span class="text-danger">&nbsp;*</span></label>
                                                                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                                                        <input type="text" name="tgl_bayar" class="form-control datetimepicker-input" data-target="#reservationdate" data-toggle="datetimepicker" required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label for="exampleInputBorder">Jumlah Pelunasan</label>
                                                                                                    <input type="text" onkeypress="return hanyaAngka(event)" name="jml_bayar_lunas" value="Rp. <?php echo $sisa; ?>" class="form-control form-control-border"/>
                                                                                                </div>
                                                                                                
                                                                                                <div class="form-group">
                                                                                                    <label for="helperText">Metode Pembayaran<span class="text-danger">&nbsp;*</span></label>
                                                                                                    <select class="form-control select2" id="example" name="metode" tabindex="-1">
                                                                                                        <option disabled> Pilih Metode Pembayaran</option>
                                                                                                            <option value="Tunai">Tunai</option>
                                                                                                            <option value="Transfer">Transfer</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div id="textbox" style="display:none;">
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleInputFile">Bukti Transfer<span class="text-danger">&nbsp;*</span></label>
                                                                                                        <div class="input-group">
                                                                                                            <div class="custom-file">
                                                                                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="b_bayar">
                                                                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="submit" class="btn btn-primary btn-sm float-md-right" name="simpan" value="Simpan">
                                                                                </div>
                                                                            </form>
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