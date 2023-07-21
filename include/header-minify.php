<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SILAYAR Al-Azhar | Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-6.2/css/fontawesome.css">
    <link href="plugins/fontawesome-6.2/css/brands.css" rel="stylesheet">
    <link href="plugins/fontawesome-6.2/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/swal/sweetalert2.min.css">
    <link rel="stylesheet" href="plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="plugins/jsgrid/jsgrid-theme.min.css">
    <script src="plugins/swal/sweetalert2.min.js"></script>
    
    <script>
        window.onload = function(){
            var dropdown = document.getElementById("example");
            var textbox = document.getElementById("textbox");
            dropdown.addEventListener("change", function() {
                if(dropdown.value == "Transfer"){
                    textbox.style.display = "block";
                }else{
                    textbox.style.display = "none";
                }
            });
        }
    </script>
    <style type="text/css">
        .tm {
            position: relative;
            display: block;
            width: 100%;
            height: 2.4rem;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            align-content: center
        }

        .tm:before {
            position: absolute;
            top: 10px;
            left: 3px;
            content: attr(data-date);
            display: block;
            color: #495057
        }

        .tm::-webkit-clear-button,
        .tm::-webkit-datetime-edit,
        .tm::-webkit-inner-spin-button {
            display: none
        }

        .tm::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 10px;
            right: 0;
            color: #495057
        }
    </style>
</head>