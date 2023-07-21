<div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi logout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apa anda yakin akan keluar dari sistem?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <form method="POST" action="logout.php">
                    <input type="submit" class="btn btn-primary" name="logout_btn" value="Keluar" />
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirm_edit_modal(edit_url) {
        $('#modal_edit').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('edit_link').setAttribute('href', edit_url);
    }
</script>

<script type="text/javascript">
    function confirm_hapus_modal(hapus_url) {
        $('#modal_hapus').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('hapus_link').setAttribute('href', hapus_url);
    }
</script>

<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>

<script>
    $(document).ready(function() {
        $('.view_data').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "proses.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user").html(data)
                    $("#dataModal").modal('show')
                }
            })
        })
    })
</script>

<script src="plugins/jquery/jquery.min.js"></script><script src="plugins/jquery-ui/jquery-ui.min.js"></script><script src="plugins/select2/js/select2.full.min.js"></script><script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script><script src="plugins/sparklines/sparkline.js"></script><script src="plugins/jqvmap/jquery.vmap.min.js"></script><script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script><script src="plugins/jquery-knob/jquery.knob.min.js"></script><script src="plugins/moment/moment.min.js"></script><script src="plugins/daterangepicker/daterangepicker.js"></script><script src="plugins/inputmask/jquery.inputmask.min.js"></script><script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script><script src="plugins/summernote/summernote-bs4.min.js"></script><script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script><script src="dist/js/adminlte.js"></script><script src="dist/js/demo.js"></script><script src="dist/js/pages/dashboard.js"></script><script src="plugins/datatables/jquery.dataTables.min.js"></script><script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script><script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script><script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script><script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script><script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script><script src="plugins/jszip/jszip.min.js"></script><script src="plugins/pdfmake/pdfmake.min.js"></script><script src="plugins/pdfmake/vfs_fonts.js"></script><script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script><script src="plugins/datatables-buttons/js/buttons.print.min.js"></script><script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script><script src="plugins/swal/sweetalert2.min.js"></script><script src="plugins/jsgrid/demos/db.js"></script><script src="plugins/jsgrid/jsgrid.min.js"></script><script src="plugins/chart.js/Chart.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });
        $("#laporantk").DataTable({
            "responsive": true,
            "lengthChange": false,
            "ordering": false,
            "autoWidth": true,
            "buttons": [{
                    extend: "excel",
                },
                {
                    extend: "pdf",
                    footer: true
                },
                {
                    extend: "print",
                    className: "buttonsToHide", footer: true 
                }
            ],
        }).buttons().container().appendTo('#laporantk_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(function() {

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-YYYY',
            autoclose: true,
            todayHighlight: true,
            language: 'id'
        });
        //Date picker
        $('#reservationdatetahun').datetimepicker({
            format: 'YYYY',
            autoclose: true,
            todayHighlight: true
        });

    })
</script>

<script>
    $(document).ready(function() {
        $("#tingkat").change(function() {
            var postForm = {
                'id': document.getElementById("tingkat").value,
                'op': 1
            };
            $.ajax({
                type: "post",
                url: "config/fungsi_combo.php",
                data: postForm,
                success: function(data) {
                    $("#kelas").html(data);
                }
            });
        });
        $("#kelas").change(function() {
            var postForm = {
                'id': document.getElementById("kelas").value,
                'op': 2
            };
            $.ajax({
                type: "post",
                url: "config/fungsi_combo.php",
                data: postForm,
                success: function(data) {
                    $("#rombel").html(data);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#seragam").change(function() {
            var postForm = {
                'id': document.getElementById("seragam").value
            };
            $.ajax({
                type: "post",
                url: "config/jenis-seragam.php",
                data: postForm,
                success: function(data) {
                    $("#detail").html(data);
                }
            });
        });
    });
</script>

<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script type="text/javascript">
    $('#postName').select2({

        theme: 'bootstrap4',
        placeholder: 'Masukkan nama siswa',
        allowClear: true,
        width: '100%',

        ajax: {

            url: 'config/get-siswa.php',

            dataType: 'json',

            delay: 150,

            data: function(data) {

                return {

                    searchTerm: data.term // search term

                };

            },

            processResults: function(response) {

                return {

                    results: response

                };

            },

            cache: true

        }

    });
</script>

<script>
    $(document).ready(function() {

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.mainan-form').remove();
        });

        $(document).on('click', '.add-more-form', function() {
            $('.paste-new-forms').append(
                '<div class="mainan-form">\
                    <div class="after-add-more">\
                        <div class="modal-header">\
                            <h4 class="modal-title float-md-left"></h4>\
                            <a class="remove-btn btn btn-danger btn-xs float-md-right">\
                                <i class="fas fa-trash"></i> Hapus\
                            </a>\
                        </div>\
                        <br>\
                        <div class="form-group">\
                            <label>Jenis Seragam</label>\
                            <select class="custom-select form-control-border" name="seragam[]" >\
                                "<?php
                                    $query = "SELECT id_ktgr_baju, nm_baju, lib_tingkat.tingkat, jk, uk_baju, jenis_seragam,harga FROM tbl_ktgr_baju, lib_tingkat WHERE tbl_ktgr_baju.id_tingkat = lib_tingkat.id_tingkat AND stok  !=0 ORDER BY lib_tingkat.id_tingkat";
                                    $result = $connection->query($query);
                                    if (!$result) {
                                        printf("Errormessage: %s\n", $konek->error);
                                    }
                                    while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                    ?>"\
                                    <option value="<?= $data['id_ktgr_baju'] ?>"><?= $data['nm_baju'] ?> ( <?= $data['jenis_seragam'] ?> ) - Untuk <?= $data['jk'] ?>, Tingkat <?= $data['tingkat'] ?>, Ukuran <?= $data['uk_baju'] ?> (Rp. <?= $data['harga'] ?>)</option>\
                                "<?php
                                    }
                                    ?>"\
                            </select>\
                        </div>\
                        </div>\
                    </div>\
                </div>'
            );
        });
    });
</script>

<script>
    $(function() {
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Tunai',
                'Transfer',
            ],
            datasets: [{
                data: [
                    <?php
                    $queri_bt = mysqli_query($connection, "SELECT COUNT(id_bayar_baju) as tot_bt FROM tbl_pembayaran_baju WHERE metode_bayar = 'Tunai' AND id_tahun = '$id_sem'");
                    $hasilbt = mysqli_fetch_array($queri_bt);
                    $queri_at = mysqli_query($connection, "SELECT COUNT(id_bayar_antar) as tot_at FROM tbl_pembayaran_antar WHERE metode_bayar = 'Tunai' AND id_tahun = '$id_sem'");
                    $hasilat = mysqli_fetch_array($queri_at);

                    $hasilnya_t = $hasilbt['tot_bt'] + $hasilat['tot_at'];

                    $queri_btf = mysqli_query($connection, "SELECT COUNT(id_bayar_baju) as tot_btf FROM tbl_pembayaran_baju WHERE metode_bayar = 'Transfer' AND id_tahun = '$id_sem'");
                    $hasilbtf = mysqli_fetch_array($queri_btf);
                    $queri_atf = mysqli_query($connection, "SELECT COUNT(id_bayar_antar) as tot_atf FROM tbl_pembayaran_antar WHERE metode_bayar = 'Transfer' AND id_tahun = '$id_sem'");
                    $hasilatf = mysqli_fetch_array($queri_atf);

                    $hasilnya_tf = $hasilbtf['tot_btf'] + $hasilatf['tot_atf'];


                    echo $hasilnya_t;  ?>, <?php echo $hasilnya_tf; ?>
                ],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
</script>

<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>

<script>

    $(function() {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true 
        <?php $query = mysqli_query($connection, "SELECT * FROM lib_tingkat");
        $result = array(); 
        while ($data = mysqli_fetch_array($query)) {
        $result[] = $data; }  ?>
        var $salesChart = $('#sales-chart')
        
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: 
            {
                labels: [
                    <?php
                    foreach ($result as $key=>$value){ ?>'<?= $value["tingkat"]; ?>', <?php } ?>  ],   
                           
                datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [1000, 2000, 3000]
                    },
                    {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: [700, 1700, 2700]
                    }
                ]
            }, 
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,

                            callback: function(value) {
                                if (value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }

                                return '$' + value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    })
</script>