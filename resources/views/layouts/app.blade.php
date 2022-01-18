<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>HELL-O</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.css')}}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('AdminLTE-3.1.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ url('AdminLTE-3.1.0/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- datatables ku -->
  {{-- <link rel="stylesheet" type="text/css') }}" href="{{url('DataTables/datatables.min.css')}}"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/date-1.1.1/fc-3.3.3/fh-3.1.9/kt-2.6.4/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.5/sb-1.2.1/sp-1.4.0/sl-1.3.3/datatables.min.js') }}"></script> --}}
  <!-- sweet allert2 ku -->
  {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

  <!-- jQuery -->
  <script src="{{  url('AdminLTE-3.1.0/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{  url('AdminLTE-3.1.0/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ url('AdminLTE-3.1.0/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Sidebar -->
      @include('layouts.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('AdminLTE-3.1.0/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('AdminLTE-3.1.0/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
{{-- <script src="{{url('AdminLTE-3.1.0/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('AdminLTE-3.1.0/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{url('AdminLTE-3.1.0/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('AdminLTE-3.1.0/plugins/moment/moment.min.js')}}"></script>
<script src="{{('AdminLTE-3.1.0/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('AdminLTE-3.1.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('AdminLTE-3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('AdminLTE-3.1.0/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('AdminLTE-3.1.0/dist/js/demo.js')}}"></script>
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('AdminLTE-3.1.0/dist/js/pages/dashboard.js')}}"></script> --}}

<!-- datatables ku -->
{{-- <script type="text/javascript" src="{{url('DataTables/datatables.min.js')}}"></script> --}}
<!-- Select2 -->
<script src="{{url('AdminLTE-3.1.0/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{url('my-asset/enakin.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ url('AdminLTE-3.1.0/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
</body>
</html>
