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
                <h1 class="m-0">Ketegori Antar Jemput</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Kategori Antar Jemput</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-2">
                            <a data-toggle="modal" data-target="#modal-tambah" type="button"
                                class="btn btn-block btn-outline-primary">Tambah Data</a>
                        </div>
                        <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Kategori Antar Jemput</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" class="form-horizontal"
                                        action="index.php?page=ktgr-antar&act=proses&data=tambah" id="form1"
                                        name="tambah">
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputBorder">Jenis Kategori Antar Jemput</label>
                                                            <select class="form-control form-control-border"
                                                                name="jenis" tabindex="-1">
                                                                <option disabled selected> Pilih jenis kategori antar jemput
                                                                </option>
                                                                <option value="pe">Pergi</option>
                                                                <option value="pl">Pulang</option>
                                                                <option value="PP">PP (Pulang Pergi)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputBorder">Jarak Maksimal (KM)</label>
                                                            <input type="text" name="jarak"
                                                                class="form-control form-control-border"
                                                                placeholder="Masukkan jarak maksimal antar jemput" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputBorder">Tipe Kategori
                                                                Pembayaran</label>
                                                            <div class="input-group">
                                                                <select class="form-control form-control-border"
                                                                    name="type" tabindex="-1">
                                                                    <option disabled selected> Pilih tipe kategori
                                                                        pembayaran</option>
                                                                    <?php
                                                                            $qs = mysqli_query($connection, "SELECT * FROM `tbl_type_pembayaran`");
                                                                            $sar = mysqli_num_rows($qs);
                                                                            if ($sar > 0) {
                                                                                while ($s = mysqli_fetch_assoc($qs)) {
                                                                            ?>
                                                                    <option value="<?php echo $s['id_type_pemb']; ?>">
                                                                        <?php echo $s['type']; ?> </option>
                                                                    <?php }
                                                                            } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputBorder">Biaya</label>
                                                            <input type="text" id="rupiah" name="biaya"
                                                                class="form-control form-control-border"
                                                                placeholder="Masukkan biaya antar jemput" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-sm float-md-right"
                                                name="simpan" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Jenis Kategori Antar Jemput</th>
                                        <th>Jarak Maksimal (KM)</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $no = 1;
                                            $query = "SELECT id_ktgr_antar, jenis, jarak, tbl_type_pembayaran.type, biaya FROM tbl_ktgr_antar, tbl_type_pembayaran 
                                            WHERE tbl_ktgr_antar.id_type_pemb=tbl_type_pembayaran.id_type_pemb";
                                            $result = mysqli_query($connection, $query);
                                            $data = mysqli_num_rows($result);
                                            if ($data > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <?php
                                        if ($row['jenis'] == "Pergi") {?>
                                        <td><?php echo 'Pergi'; ?></td>
                                        <?php
                                        } elseif ($row['jenis'] == "Pulang") {?>
                                        <td><?php echo 'Pulang'; ?></td>
                                        <?php
                                        } else {?>
                                            <td><?php echo 'Pulang Pergi'; ?></td>
                                            <?php
                                            } ?>
                                        <td><?php echo $row['jarak']; ?> KM</td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td>Rp. <?php echo $row['biaya']; ?></td>
                                        <td>
                                            <a class="btn btn-xs btn-warning" data-toggle="modal"
                                                data-target="#modal-edit-<?php echo $row['id_ktgr_antar']; ?>">
                                                <i class="fas fa-edit"></i></a>
                                            <a class="btn btn-xs bg-danger" href="#"
                                                onClick="confirm_modal('index.php?page=ktgr-antar&act=proses&data=hapus&id=<?php echo $row['id_ktgr_antar']; ?>');"><i
                                                    class='fas fa-trash' title="Hapus"></i></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal_delete">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="margin-top:100px;">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi hapus data</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apa anda akan menghapus data ini ?</p>
                                                </div>

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        data-dismiss="modal">Cancel</button>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        id="delete_link">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-edit-<?php echo $row['id_ktgr_antar']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Kategori Seragam</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" class="form-horizontal"
                                                    action="index.php?page=ktgr-antar&act=proses&data=ubah"
                                                    id="form1" method="post" name="ubah">
                                                    <input type="hidden" class="form-control form-control-border"
                                                        name="id_antar" value="<?php echo $row['id_ktgr_antar']; ?>" required>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputBorder">Jenis Kategori Antar Jemput</label>
                                                                            <select name="jenis" class="form-control form-control-border" tabindex="-1">
                                                                                <?php
                                                                                if ($row['jenis'] == "Pergi") {
                                                                                echo "<option value='Pergi' size='20' selected>Pergi</option>
                                                                                <option value='Pulang' size='20' >Pulang</option>
                                                                                <option value='Pulang Pergi' size='20' >Pulang Pergi (PP)</option>";
                                                                                } elseif ($row['jenis'] == "Pulang"){
                                                                                echo "<option value='Pergi' size='20'Pergi</option>
                                                                                <option value='Pulang' size='20' selected>Pulang</option>
                                                                                <option value='Pulang Pergi'  size='20' >Pulang Pergi (PP)</option>";
                                                                                } else{
                                                                                    echo "<option value='Pergi' size='20'>Pergi</option>
                                                                                <option value='Pulang' size='20'>Pulang</option>
                                                                                <option value='Pulang Pergi'  size='20' selected>Pulang Pergi (PP)</option>";
                                                                                }
                                                                                echo "</select>"; ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputBorder">Jarak Maksimal (KM)</label>
                                                                            <input type="text" name="jarak" value="<?php echo $row['jarak']; ?>"
                                                                                class="form-control form-control-border"
                                                                                placeholder="Masukkan jarak maksimal antar jemput" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                        <label for="exampleInputBorder">Tipe Kategori Pembayaran</label>
                                                                        <div class="input-group">
                                                                            <select class="form-control form-control-border" name="type" tabindex="-1">
                                                                                <option disabled>Pilih tipe kategori pembayaran</option>
                                                                                <?php
                                                                                $id_typ = $row['id_type_pemb'];
                                                                                $qs = mysqli_query($connection, "SELECT * from tbl_type_pembayaran");
                                                                                $sar = mysqli_num_rows($qs);
                                                                                if ($sar > 0) {
                                                                                while ($typ = mysqli_fetch_assoc($qs)) {
                                                                                    if ($id_typ == $typ['id_type_pemb']) { ?>

                                                                                    <option value="<?php echo $typ['id_type_pemb']; ?>" selected><?php echo $typ['type']; ?> </option>
                                                                                    <?php } else { ?>
                                                                                    <option value="<?php echo $typ['id_type_pemb']; ?>"><?php echo $typ['type']; ?> </option>
                                                                                <?php }
                                                                                }
                                                                                } ?>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputBorder">Biaya</label>
                                                                            <input type="text" name="biaya" onkeypress="return hanyaAngka(event)" name="harga" value="<?php echo $row['biaya']; ?>"
                                                                                class="form-control form-control-border"
                                                                                placeholder="Masukkan biaya antar jemput" required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <input type="submit"
                                                            class="btn btn-primary btn-sm float-md-right"
                                                            name="simpan" value="Simpan">
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
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php }
} ?>
