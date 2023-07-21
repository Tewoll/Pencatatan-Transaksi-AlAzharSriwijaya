<?php
$baca = 'index.php?page=';
$bgp = isset($_GET['page']) ? $_GET['page'] : '';
if (empty($bgp)) {
  header("Location:../../login.php");
} elseif ($bgp == 'index.php?page=') {
  header("Location:../../login.php");
} else {


?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0"><b>Laporan Pembayaran Seragam</b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-tk-tab" data-toggle="pill" href="#custom-tabs-three-tk" role="tab" aria-controls="custom-tabs-three-tk" aria-selected="true">TK</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-sd-tab" data-toggle="pill" href="#custom-tabs-three-sd" role="tab" aria-controls="custom-tabs-three-sd" aria-selected="false">SD</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-smp-tab" data-toggle="pill" href="#custom-tabs-three-smp" role="tab" aria-controls="custom-tabs-three-smp" aria-selected="false">SMP</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-three-tk" role="tabpanel" aria-labelledby="custom-tabs-three-tk-tab">
                  <div class="row">
                    <div class="col-12">

                      <div class="card">
                        <div class="card-header">
                          <div class="text-center"><b>Rekap Pembayaran Seragam TK Tahun Ajaran
                              <?php echo "$tahun_ajaran"; ?></b></div>
                        </div>
                        <div class="card-body">
                          <table id="laporantk" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Siswa</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>No Invoice</th>
                                <th>Metode Pembayaran</th>
                                <th>Tahun Ajaran</th>
                                <th>Ket</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_pembayaran_baju.id_siswa, tbl_pembayaran_baju.metode_bayar, jumlah_byr, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                                                          tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat
                                                          FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                                                          WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                                                          AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                                                          AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                                                          AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                                          AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                                          AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                                          AND tbl_pembayaran_baju.id_tahun = '$id_sem' 
                                                          AND lib_tingkat.id_tingkat = '1' 
                                                          ORDER BY tgl_bayar DESC";
                              $result = mysqli_query($connection, $query);
                              $data = mysqli_num_rows($result);
                              if ($data > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_siswa']; ?></td>
                                    <td>Rp. <?php echo $row['jumlah_byr']; ?></td>
                                    <td><?php $tgl_a = tanggal_indo($row['tgl_bayar']);
                                        echo $tgl_a; ?></td>
                                    <td><?php echo $row['invoice']; ?></td>
                                    <td><?= $row['metode_bayar']?></td>
                                    <td><?php echo $row['tahun_ajaran']; ?></td>
                                    <td><?php echo $row['ket']; ?></td>
                                  </tr>
                              <?php $no++;
                                }
                              } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-sd" role="tabpanel" aria-labelledby="custom-tabs-three-sd-tab">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <div class="text-center"><b>Rekap Pembayaran Seragam SD Tahun Ajaran
                              <?php echo "$tahun_ajaran"; ?></b></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="laporansd" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Siswa</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>No Invoice</th>
                                <th>Metode Pembayaran</th>
                                <th>Tahun Ajaran</th>
                                <th>Ket</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_pembayaran_baju.metode_bayar, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                                    tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat
                                    FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                                    WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                                    AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                                    AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                    AND tbl_pembayaran_baju.id_tahun = '$id_sem' 
                                    AND lib_tingkat.id_tingkat = '2' 
                                    ORDER BY tgl_bayar DESC";
                              $result = mysqli_query($connection, $query);
                              $data = mysqli_num_rows($result);
                              if ($data > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_siswa']; ?></td>
                                    <td>Rp. <?php echo $row['jumlah_byr']; ?></td>
                                    <td><?php
                                        $tgl_a = tanggal_indo($row['tgl_bayar']);
                                        echo $tgl_a; ?></td>
                                    <td><?php echo $row['invoice']; ?></td>
                                    <td><?= $row['metode_bayar']?></td>
                                    <td><?php echo $row['tahun_ajaran']; ?></td>
                                    <td><?php echo $row['ket']; ?>
                                    </td>
                                  </tr>
                              <?php
                                  $no++;
                                }
                              } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-smp" role="tabpanel" aria-labelledby="custom-tabs-three-smp-tab">
                  <div class="row">
                    <div class="col-12">

                      <div class="card">
                        <div class="card-header">
                          <div class="text-center"><b>Rekap Pembayaran Seragam SMP Tahun Ajaran
                              <?php echo "$tahun_ajaran"; ?></b></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="laporansmp" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Siswa</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>No Invoice</th>
                                <th>Metode Pembayaran</th>
                                <th>Tahun Ajaran</th>
                                <th>Ket</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $query = "SELECT id_bayar_baju, kd_bayar_baju, tbl_siswa.nama_siswa, tbl_pembayaran_baju.metode_bayar, tbl_pembayaran_baju.id_siswa, jumlah_byr, tgl_bayar, ket, lib_tajaran.tahun_ajaran, tbl_invoice.invoice,
                                    tbl_siswa.id_rombel, tbl_rombel.id_kelas, tbl_kelas.id_tingkat, lib_tingkat.id_tingkat
                                    FROM tbl_pembayaran_baju, tbl_siswa, lib_tajaran, tbl_invoice, tbl_rombel, tbl_kelas, lib_tingkat
                                    WHERE tbl_pembayaran_baju.id_siswa = tbl_siswa.id_siswa 
                                    AND tbl_pembayaran_baju.id_tahun = lib_tajaran.id_tajaran 
                                    AND tbl_pembayaran_baju.kd_bayar_baju = tbl_invoice.kd_bayar
                                    AND tbl_siswa.id_rombel = tbl_rombel.id_rombel
                                    AND tbl_rombel.id_kelas = tbl_kelas.id_kelas
                                    AND tbl_kelas.id_tingkat = lib_tingkat.id_tingkat
                                    AND tbl_pembayaran_baju.id_tahun = '$id_sem' 
                                    AND lib_tingkat.id_tingkat = '3' 
                                    ORDER BY tgl_bayar DESC";
                              $result = mysqli_query($connection, $query);
                              $data = mysqli_num_rows($result);
                              if ($data > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama_siswa']; ?></td>
                                    <td>Rp. <?php echo $row['jumlah_byr']; ?></td>
                                    <td><?php
                                        $tgl_a = tanggal_indo($row['tgl_bayar']);
                                        echo $tgl_a; ?></td>
                                    <td><?php echo $row['invoice']; ?></td>
                                    <td><?= $row['metode_bayar']?></td>
                                    <td><?php echo $row['tahun_ajaran']; ?></td>
                                    <td><?php echo $row['ket']; ?>
                                    </td>
                                  </tr>
                              <?php
                                  $no++;
                                }
                              } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
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
<?php } ?>