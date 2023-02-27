<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stangolden</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url(); ?>/img/logo.png" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/theme/admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->

    <script src="<?= base_url(); ?>/theme/admin/assets/barcode/jquery-barcode.js"></script>
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.3.2.min.js"></script> -->
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>

</head>
<?php $uri = current_url(true); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-light" style="background:#182C61">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color:#ffffff"></i></a>
                </li>
                <a class="nav-link" data-toggle="dropdown" href="#" style="color:#ffffff">
                    <b>Stangolden</b> &nbsp;&nbsp;&nbsp;
                    <!-- <i class="fas fa-power-off"></i> -->

                </a>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="color:#ffffff">
                        <b><?= session('username'); ?></b> &nbsp;&nbsp;&nbsp;<i class="fas fa-power-off"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="color:#ffffff">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('/auth/logout'); ?>" class="dropdown-item dropdown-footer">Log Out</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" style="color:#ffffff">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>/admin" class="brand-link">
                <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/logo.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> Stangolden</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url(); ?>/img/<?php if (session('img') == '') {
                                                                echo "default.jpg";
                                                            } else {
                                                                echo session('img');
                                                            } ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url(); ?>/admin/pengaturan" class="d-block">
                            <b style="color: white"> <?= session('user_name'); ?> </b>
                        </a>
                    </div>
                </div> -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item <?php if ($uri->getSegment(4) == 'admin') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Laporan</li>
                        <li class="nav-item <?php if ($uri->getSegment(4) == 'permohonan') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/base/user" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($uri->getSegment(4) == 'permohonan') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/base/hasil_tes" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Hasil Tes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($uri->getSegment(4) == 'permohonan') {
                                                echo "has-treeview menu-open";
                                            } ?>">
                            <a href="<?= base_url(); ?>/auth/logout" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>