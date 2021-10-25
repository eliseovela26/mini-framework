<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>unheval</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/css/dashboard/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/css/dashboard/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/dashboard/adminlte.min.css">
    <link rel="stylesheet" href="/css/dashboard/select2.min.css">
    <link rel="stylesheet" href="/css/dashboard/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/css/dashboard/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/css/dashboard/toastr.min.css">

    <link rel="stylesheet" href="/css/dashboard/app.css">
</head>
<body class="hold-transition red-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="/img/dashboard/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php
        include_once('partials/nav.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <?php
        include_once('partials/aside.php') ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?= $content ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0-rc
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="/js/dashboard/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/js/dashboard/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/js/dashboard/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/dashboard/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="/js/dashboard/jquery.mousewheel.js"></script>
    <script src="/js/dashboard/raphael.min.js"></script>
    <script src="/js/dashboard/jquery.mapael.min.js"></script>
    <script src="/js/dashboard/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/js/dashboard/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="/js/dashboard/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/js/dashboard/dashboard2.js"></script>
    <script src="/js/dashboard/select2.full.min.js"></script>
    <script src="/js/dashboard/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="/js/dashboard/toastr.min.js"></script>
</body>
</html>