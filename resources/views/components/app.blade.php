<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('public/admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/admin') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ asset('public/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('public/admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('public/admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('public/data-tables') }}/datatables.min.css">
  <link rel="stylesheet" href="public/data-tables/datatables.css">

  @stack('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('public/admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div> --}}

  <!-- Navbar -->
<x-layout.header />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <x-layout.sidebar />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        {{ $slot }}
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
<x-layout.footer />
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('public/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin') }}/dist/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script src="{{ asset('public/data-tables/dataTables.js') }}"></script>
<script src="{{ asset('public/data-tables/datatables.min.js') }}"></script>

<!-- AdminLTE App -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="sweetalert2.all.min.js"></scrip> --}}

@stack('script')
</body>
</html>
