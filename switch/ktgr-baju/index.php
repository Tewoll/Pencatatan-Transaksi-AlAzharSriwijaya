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
            <h1 class="m-0">Kategori Seragam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Kategori Seragam</li>
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
                  <a data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-block btn-outline-primary">Tambah Data</a>
                </div>
                <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Kategori Seragam</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" class="form-horizontal" action="index.php?page=ktgr-baju&act=proses&data=tambah" id="form1" name="tambah">
                        <div class="modal-body">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Tipe Seragam</label>
                                  <input type="text" name="seragam" class="form-control form-control-border" placeholder="Masukkan nama seragam" required>
                                </div>
                              </div>
                              <div class="col-lg-8">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Jenis Seragam</label>
                                  <input type="text" name="jenis_seragam" class="form-control form-control-border" placeholder="Masukkan nama seragam" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">JK Seragam</label>
                                  <div class="input-group">
                                    <select class="form-control form-control-border" name="jk" tabindex="-1">
                                      <option disabled selected> Pilih Jenis Kelamin
                                      </option>
                                      <option value="L">Laki-Laki</option>
                                      <option value="P">Perempuan</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Tingkatan Sekolah</label>
                                  <div class="input-group">
                                    <select class="form-control form-control-border" name="tingkat" tabindex="-1">
                                      <option disabled selected> Pilih tingkatan sekolah
                                      </option>
                                      <?php
                                      $qs = mysqli_query($connection, "SELECT * from lib_tingkat");
                                      $sar = mysqli_num_rows($qs);
                                      if ($sar > 0) {
                                        while ($s = mysqli_fetch_assoc($qs)) {
                                      ?>
                                          <option value="<?php echo $s['id_tingkat']; ?>">
                                            <?php echo $s['tingkat']; ?> </option>
                                      <?php }
                                      } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Tipe Kategori
                                    Pembayaran</label>
                                  <div class="input-group">
                                    <select class="form-control form-control-border" name="type" tabindex="-1">
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
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Harga</label>
                                  <input type="text" id="rupiah" name="harga" class="form-control form-control-border" placeholder="Masukkan harga seragam" required />
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Ukuran Baju</label>
                                  <input type="text" name="ukuran" class="form-control form-control-border" placeholder="Masukkan ukuran seragam" required />
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="exampleInputBorder">Stok</label>
                                  <input type="number" onkeypress="return hanyaAngka(event)" name="stok" class="form-control form-control-border" placeholder="Masukkan stok seragam" required>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Tipe Seragam</th>
                        <th>Jenis Seragam</th>
                        <th>Tingkat</th>
                        <th>JK</th>
                        <th>UK</th>
                        <th>Tipe Pembayaran</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="text-sm">
                      <?php
                      $no = 1;
                      $query = "SELECT id_ktgr_baju, nm_baju, jenis_seragam,lib_tingkat.tingkat, jk, uk_baju, tbl_type_pembayaran.type, harga, stok FROM tbl_ktgr_baju, lib_tingkat, tbl_type_pembayaran 
                      WHERE tbl_ktgr_baju.id_tingkat=lib_tingkat.id_tingkat AND tbl_ktgr_baju.id_type_pemb=tbl_type_pembayaran.id_type_pemb";
                      $result = mysqli_query($connection, $query);
                      $data = mysqli_num_rows($result);
                      if ($data > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                      ?>
                          <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td><?php echo $row['nm_baju']; ?></td>
                            <td><?php echo $row['jenis_seragam']; ?></td>
                            <td><?php echo $row['tingkat']; ?></td>
                            <td><?php echo $row['jk']; ?></td>
                            <td><?php echo $row['uk_baju']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td>Rp. <?php echo $row['harga']; ?></td>
                            <td><?php echo $row['stok']; ?> Buah</td>
                            <td>
                              <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit-<?php echo $row['id_ktgr_baju']; ?>">
                                <i class="fas fa-edit"></i></a>
                              <a class="btn btn-xs bg-danger" href="#" onClick="confirm_modal('index.php?page=ktgr-baju&act=proses&data=hapus&id=<?php echo $row['id_ktgr_baju']; ?>');"><i class='fas fa-trash' title="Hapus"></i></i></a>
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
                          <div class="modal fade" id="modal-edit-<?php echo $row['id_ktgr_baju']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Kategori Seragam</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form method="POST" class="form-horizontal" action="index.php?page=ktgr-baju&act=proses&data=ubah" id="form1" method="post" name="ubah">
                                  <input type="hidden" class="form-control form-control-border" name="id_baju" value="<?php echo $row['id_ktgr_baju']; ?>" required>
                                  <div class="modal-body">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label for="exampleInputBorder">Nama
                                              Seragam</label>
                                            <input type="text" name="seragam" value="<?php echo $row['nm_baju']; ?>" class=" form-control form-control-border" placeholder="Masukkan nama seragam" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputBorder">JK
                                              Seragam</label>
                                            <div class="input-group">
                                              <select name="jk" class="form-control form-control-border" tabindex="-1">
                                                <?php
                                                if ($row['jk'] == "L") {
                                                  echo "<option value='L' size='20' selected>Laki-Laki</option>
                                                  <option value='P'>Perempuan</option>";
                                                } else {
                                                  echo "<option value='L' size='20' >Laki-Laki</option>
                                                  <option value='P' selected>Perempuan</option>";
                                                }
                                                echo "</select>"; ?>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label for="exampleInputBorder">Tingkatan
                                              Sekolah</label>
                                            <div class="input-group">
                                              <select class="form-control form-control-border" name="tingkat" tabindex="-1">
                                                <option disabled> Pilih tingkatan
                                                  sekolah</option>
                                                <?php
                                                $id_t = $row['id_tingkat'];
                                                $qs = mysqli_query($connection, "SELECT * from lib_tingkat");
                                                $sar = mysqli_num_rows($qs);
                                                if ($sar > 0) {
                                                  while ($s = mysqli_fetch_assoc($qs)) {
                                                    if ($id_t == $s['id_tingkat']) { ?>

                                                      <option value="<?php echo $s['id_tingkat']; ?>" selected>
                                                        <?php echo $s['tingkat']; ?>
                                                      </option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $s['id_tingkat']; ?>">
                                                        <?php echo $s['tingkat']; ?>
                                                      </option>
                                                <?php }
                                                  }
                                                } ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputBorder">Tipe Kategori
                                              Pembayaran</label>
                                            <div class="input-group">
                                              <select class="form-control form-control-border" name="type" tabindex="-1">
                                                <option disabled>Pilih tipe kategori
                                                  pembayaran</option>
                                                <?php
                                                $id_typ = $row['id_type_pemb'];
                                                $qs = mysqli_query($connection, "SELECT * from tbl_type_pembayaran");
                                                $sar = mysqli_num_rows($qs);
                                                if ($sar > 0) {
                                                  while ($typ = mysqli_fetch_assoc($qs)) {
                                                    if ($id_typ == $typ['id_type_pemb']) { ?>

                                                      <option value="<?php echo $typ['id_type_pemb']; ?>" selected><?php echo $typ['type']; ?>
                                                      </option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $typ['id_type_pemb']; ?>">
                                                        <?php echo $typ['type']; ?>
                                                      </option>
                                                <?php }
                                                  }
                                                } ?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="exampleInputBorder">Harga</label>
                                            <input type="text" onkeypress="return hanyaAngka(event)" name="harga" value="<?php echo $row['harga']; ?>" class="form-control form-control-border" placeholder="Masukkan harga seragam" required />
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="exampleInputBorder">Ukuran
                                              Baju</label>
                                            <input type="text" name="ukuran" value="<?php echo $row['uk_baju']; ?>" class="form-control form-control-border" placeholder="Masukkan ukuran seragam" required />
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="exampleInputBorder">Stok</label>
                                            <input type="number" onkeypress="return hanyaAngka(event)" value="<?php echo $row['stok']; ?>" name="stok" class="form-control form-control-border" placeholder="Masukkan stok seragam" required>
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