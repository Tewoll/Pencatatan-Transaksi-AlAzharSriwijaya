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
                <h1 class="m-0">Master Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Rombel</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="col-md-2">
                            <a data-toggle="modal" data-target="#modal-tambah" type="button"
                                class="btn btn-block btn-outline-primary">Tambah Data</a>
                        </div>
                        <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Rombel</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" class="form-horizontal"
                                        action="index.php?page=rombel&act=proses&data=tambah" id="form1"
                                        name="tambah">
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="helperText">Kelas<span
                                                            class="text-danger">&nbsp;*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-control form-control-border" name="id_kelas"
                                                            tabindex="-1">
                                                            <option disabled selected> Pilih </option>
                                                            <?php
                                                            $qs = mysqli_query($connection, "SELECT * from tbl_kelas");
                                                            $sar = mysqli_num_rows($qs);
                                                            if ($sar > 0) {
                                                              while ($s = mysqli_fetch_assoc($qs)) {
                                                            ?>
                                                            <option value="<?php echo $s['id_kelas']; ?>"><?php echo $s['nm_kelas']; ?>
                                                            </option>
                                                            <?php }} ?>
                                                        </select>
                                                    </div>
                                                    <p><small class="text-muted"><i>Pilih kelas yang akan
                                                                ditambahkan.</i></small></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputBorder">Nama Rombel</label>
                                                    <input type="text" name="nm_rombel"
                                                        class="form-control form-control-border" required>
                                                    <p><small class="text-muted"><i>Masukkan nama rombel yang akan
                                                                ditambahkan.</i></small></p>
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
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Rombel</th>
                                    <th>Kelas</th>
                                    <!-- <th>Tingkatan</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $no = 1;
                            $query = "SELECT id_rombel, tbl_kelas.id_kelas, tbl_kelas.nm_kelas, nm_rombel FROM tbl_rombel, tbl_kelas WHERE tbl_rombel.id_kelas=tbl_kelas.id_kelas";
                            $result = mysqli_query($connection, $query);
                            $data = mysqli_num_rows($result);
                            if ($data > 0) {
                              while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nm_rombel']; ?></td>
                                    <td><?php echo $row['nm_kelas']; ?></td>
                                    <!-- <td><?php echo $row['id_tingkat']; ?></td> -->
                                    <td>
                                        <a class="btn btn-xs btn-warning" data-toggle="modal"
                                            data-target="#modal-edit-<?php echo $row['id_rombel']; ?>">
                                            <i class="fas fa-edit"></i></a>
                                        <a class="btn btn-xs bg-danger" href="#"
                                            onClick="confirm_modal('index.php?page=rombel&act=proses&data=hapus&id=<?php echo $row['id_rombel']; ?>');"><i
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
                                <div class="modal fade" id="modal-edit-<?php echo $row['id_rombel']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Kelas</h4>
                                            </div>
                                            <form method="POST" class="form-horizontal"
                                                action="index.php?page=rombel&act=proses&data=ubah" id="form1"
                                                method="post" name="ubah">
                                                <input type="hidden" class="form-control" name="id_rombel"
                                                    value="<?php echo $row['id_rombel']; ?>" required>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputBorder">Kelas</label>
                                                            <select class="form-control form-control-border"
                                                                name="id_kelas" tabindex="-1">
                                                                <option disabled> Pilih </option>
                                                                <?php
                                                                    $kd_kls = $row['id_kelas'];
                                                                    $qkl = mysqli_query($connection, "SELECT * from tbl_kelas");
                                                                    $pkl = mysqli_num_rows($qkl);
                                                                    if ($pkl > 0) {
                                                                      while ($klt = mysqli_fetch_assoc($qkl)) {
        
                                                                        if ($kd_kls == $klt['id_kelas']) { ?>
                                                                <option value="<?php echo $klt['id_kelas']; ?>" selected>
                                                                    <?php echo $klt['nm_kelas']; ?> </option>
                                                                <?php } else { ?>
                                                                <option value="<?php echo $klt['id_kelas']; ?>">
                                                                    <?php echo $klt['nm_kelas']; ?>
                                                                </option>
                                                                <?php }}} ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputBorder">Nama Rombel</label>
                                                            <input type="text"
                                                                class="form-control form-control-border"
                                                                name="nm_rombel" value="<?php echo $row['nm_rombel']; ?>"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit"
                                                        class="btn btn-primary btn-sm float-md-right" name="simpan"
                                                        value="Simpan">
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
</section>
<?php }
} ?>
