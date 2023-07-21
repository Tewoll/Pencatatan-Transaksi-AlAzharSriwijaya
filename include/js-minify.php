<div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi logout</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Apa anda yakin akan keluar dari sistem?</p>
            </div>
            <div class="modal-footer justify-content-between"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <form method="POST" action="logout.php"><input type="submit" class="btn btn-primary" name="logout_btn" value="Keluar"></form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function confirm_edit_modal(t) {
        $("#modal_edit").modal("show", {
            backdrop: "static"
        }), document.getElementById("edit_link").setAttribute("href", t)
    }
</script>
<script type="text/javascript">
    function confirm_hapus_modal(t) {
        $("#modal_hapus").modal("show", {
            backdrop: "static"
        }), document.getElementById("hapus_link").setAttribute("href", t)
    }
</script>
<script type="text/javascript">
    function confirm_modal(e) {
        $("#modal_delete").modal("show", {
            backdrop: "static"
        }), document.getElementById("delete_link").setAttribute("href", e)
    }
</script>
<script>
    $(document).ready(function() {
        $(".view_data").click(function() {
            var a = $(this).data("id");
            $.ajax({
                url: "proses.php",
                method: "POST",
                data: {
                    data_id: a
                },
                success: function(a) {
                    $("#detail_user").html(a), $("#dataModal").modal("show")
                }
            })
        })
    })
</script>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script> -->

<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<!-- <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script> -->
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/swal/sweetalert2.min.js"></script>
<script src="plugins/jsgrid/demos/db.js"></script>
<script src="plugins/jsgrid/jsgrid.min.js"></script>
<script src="plugins/chart.js/Chart.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Page specific script -->

<!-- Page specific script -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
<script>
    $.widget.bridge("uibutton", $.ui.button)
</script>
<script>
    $(function() {
                $("#example1").DataTable({
                        responsive: !0,
                        lengthChange: !0,
                        autoWidth: !0
                    }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)"),

                    $("#example2").DataTable({
                        responsive: !0,
                        lengthChange: !0,
                        autoWidth: !0
                    }).buttons().container().appendTo("#example2_wrapper .col-md-6:eq(0)"),

                    $("#tabelLunas").DataTable({
                        paging: !0,
                        lengthChange: !0,
                        searching: !0,
                        ordering: !0,
                        info: !1,
                        autoWidth: !1,
                        responsive: !0
                    }),
                    $("#tabelBelumLunas").DataTable({
                        paging: !0,
                        lengthChange: !0,
                        searching: !0,
                        ordering: !0,
                        info: !1,
                        autoWidth: !1,
                        responsive: !0
                    }),
                    $("#laporan").DataTable({
                            responsive: true,
                            lengthChange: true,
                            ordering: false,
                            paging: false,
                            buttons: [{
                                    extend: 'excel',
                                className: "buttonsToHide",
                                    title: 'Laporan Pembayaran Rombel : <?= $rombel; ?>, Kelas : <?= $nm_kelas; ?>, Tingkat : <?= $tingkat; ?>, Tahun Ajaran : <?= $tahun_ajaran; ?>',
                                    text: '<i class="fa fa-table fainfo" aria-hidden="true" ></i>',
                                    titleAttr: 'Laporan Pembayaran Rombel : <?= $rombel; ?>, Kelas : <?= $nm_kelas; ?>, Tingkat : <?= $tingkat; ?>, Tahun Ajaran : <?= $tahun_ajaran; ?>',
                                    "oSelectorOpts": {
                                        filter: 'applied',
                                        order: 'current'
                                    }
                                }]
                            }).buttons().container().appendTo("#laporan_wrapper .col-md-6:eq(0)"),

                        $("#laporantk").DataTable({
                            responsive: true,
                            lengthChange: true,
                            ordering: false,
                            paging: false,
                            search: true,
                            buttons: [{
                                extend: "excel",
                                className: "buttonsToHide"
                            }, {
                                extend: "pdf",
                                className: "buttonsToHide"
                            }, {
                                extend: 'print',
                                className: "buttonsToHide",
                                autoPrint: true,
                                title: function() {
                                    return foo.title
                                }
                            }]
                        }).buttons().container().appendTo("#laporantk_wrapper .col-md-6:eq(0)")
                    })
</script>
<script>
    $(function() {
        $("#reservationdate").datetimepicker({
            format: "DD-MM-YYYY",
            autoclose: !0,
            todayHighlight: !0,
            language: "id"
        }), $("#reservationdatetahun").datetimepicker({
            format: "YYYY",
            autoclose: !0,
            todayHighlight: !0
        })
    })
</script>
<script>
    $(document).ready(function() {
        $("#tingkat").change(function() {
            var t = {
                id: document.getElementById("tingkat").value,
                op: 1
            };
            $.ajax({
                type: "post",
                url: "config/fungsi_combo.php",
                data: t,
                success: function(t) {
                    $("#kelas").html(t)
                }
            })
        }), $("#kelas").change(function() {
            var t = {
                id: document.getElementById("kelas").value,
                op: 2
            };
            $.ajax({
                type: "post",
                url: "config/fungsi_combo.php",
                data: t,
                success: function(t) {
                    $("#rombel").html(t)
                }
            })
        })
    })
</script>
<script>
    $(document).ready(function() {
        $("#seragam").change(function() {
            var a = {
                id: document.getElementById("seragam").value
            };
            $.ajax({
                type: "post",
                url: "config/jenis-seragam.php",
                data: a,
                success: function(a) {
                    $("#detail").html(a)
                }
            })
        })
    })
</script>
<script>
    function hanyaAngka(h) {
        var n = h.which ? h.which : h.keyCode;
        return !(46 != n && 31 < n && (n < 48 || 57 < n))
    }
</script>
<script>
    var rupiah = document.getElementById("rupiah");

    function formatRupiah(t, a) {
        var r = t.replace(/[^,\d]/g, "").toString().split(","),
            u = r[0].length % 3,
            e = r[0].substr(0, u),
            i = r[0].substr(u).match(/\d{3}/gi);
        return i && (separator = u ? "." : "", e += separator + i.join(".")), e = null != r[1] ? e + "," + r[1] : e, null == a ? e : e ? "Rp. " + e : ""
    }
    rupiah.addEventListener("keyup", function(t) {
        rupiah.value = formatRupiah(this.value, "Rp. ")
    })
</script>
<script>
    $("#postName").select2({
        theme: "bootstrap4",
        placeholder: "Masukkan nama siswa",
        allowClear: !0,
        width: "100%",
        ajax: {
            url: "config/get-siswa.php",
            dataType: "json",
            delay: 150,
            data: function(a) {
                return {
                    searchTerm: a.term
                }
            },
            processResults: function(a) {
                return {
                    results: a
                }
            },
            cache: !0
        }
    })
</script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".remove-btn", function() {
                $(this).closest(".mainan-form").remove()
            }),
            $(document).on("click", ".add-more-form", function() {
                $(".paste-new-forms").append('<div class="mainan-form"><div class="after-add-more"><div class="modal-header"><h4 class="modal-title float-md-left"></h4><a class="remove-btn btn btn-danger btn-xs float-md-right"><i class="fas fa-trash"></i> Hapus</a></div><br><div class="form-group"><label>Jenis Seragam</label><select class="custom-select form-control-border" name="seragam[]">"<?php $query  = "SELECT id_ktgr_baju, nm_baju, lib_tingkat.tingkat, jk, uk_baju, jenis_seragam,harga FROM tbl_ktgr_baju, lib_tingkat WHERE tbl_ktgr_baju.id_tingkat = lib_tingkat.id_tingkat AND stok  !=0 ORDER BY lib_tingkat.id_tingkat"; $result = $connection->query($query); if (!$result) { printf("Errormessage: %s\n", $konek->error); }while ($data = $result->fetch_array(MYSQLI_ASSOC)) { ?>"<option value="<?= $data["id_ktgr_baju"] ?> "><?= $data["nm_baju"] ?> ( <?= $data["jenis_seragam"] ?> ) - Untuk <?= $data["jk"] ?>, Tingkat <?= $data["tingkat"] ?>, Ukuran <?= $data["uk_baju"] ?> (Rp. <?= $data["harga"] ?>)</option>"<?php } ?> "</select></div></div></div></div>')
            })
    })
</script>
<script>
    $(function() {
        var a = $("#donutChart").get(0).getContext("2d"),
            t = {
                labels: ["Tunai", "Transfer"],
                datasets: [{
                    data: [<?php
                            $queri_bt    = mysqli_query($connection, "SELECT COUNT(id_bayar_baju) as tot_bt FROM tbl_pembayaran_baju WHERE metode_bayar = 'Tunai' AND id_tahun = '$id_sem'");
                            $hasilbt     = mysqli_fetch_array($queri_bt);
                            $queri_at    = mysqli_query($connection, "SELECT COUNT(id_bayar_antar) as tot_at FROM tbl_pembayaran_antar WHERE metode_bayar = 'Tunai' AND id_tahun = '$id_sem'");
                            $hasilat     = mysqli_fetch_array($queri_at);
                            $hasilnya_t  = $hasilbt["tot_bt"] + $hasilat["tot_at"];
                            $queri_btf   = mysqli_query($connection, "SELECT COUNT(id_bayar_baju) as tot_btf FROM tbl_pembayaran_baju WHERE metode_bayar = 'Transfer' AND id_tahun = '$id_sem'");
                            $hasilbtf    = mysqli_fetch_array($queri_btf);
                            $queri_atf   = mysqli_query($connection, "SELECT COUNT(id_bayar_antar) as tot_atf FROM tbl_pembayaran_antar WHERE metode_bayar = 'Transfer' AND id_tahun = '$id_sem'");
                            $hasilatf    = mysqli_fetch_array($queri_atf);
                            $hasilnya_tf = $hasilbtf["tot_btf"] + $hasilatf["tot_atf"];
                            echo $hasilnya_t;
                            ?>, <?php echo $hasilnya_tf; ?>],
                    backgroundColor: ["#f56954", "#00a65a"]
                }]
            };
        new Chart(a, {
            type: "doughnut",
            data: t,
            options: {
                maintainAspectRatio: !1,
                responsive: !0
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove()
            })
        }, 4e3)
    })
</script>

<script>
    $('.hiden').hide();

    var tombolLunass = 0;
    $('[name=tombolLunas]').on('change', function() {
        if ($('#lunasYa').is(':checked') == true) {
            $('.hiden').show();
            tombolLunass = 1;

        } else if ($('#lunasTidak').is(':checked') == true) {
            $('.hiden').hide();
            tombolLunass = 0;

        } else {
            $('.hiden').hide();
            tombolLunass = 0;
        }
        console.log(tombolLunass);
    });

    function fn(event) {
        document.getElementById('txtpurpose').value = event.value;
    }
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
        <?php
        $query = mysqli_query($connection, "SELECT * FROM lib_tingkat");
        $result = [];
        while ($data = mysqli_fetch_array($query)) {
            $result[] = $data;
        }
        ?>
        var $salesChart = $('#sales-chart')

        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: [
                    <?php foreach ($result as $key => $value) { ?> '<?= $value["tingkat"] ?>', <?php } ?>
                ],

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