<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('Title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components\chart.js\dist\Chart.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('bower_components\chart.js\dist\Chart.css') }}">
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class=" bg-light" style="height: auto; min-height: 100%;">
  <section class="content" id="print_pdf">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Laporan</h3>
        <div class="box-tools">
          <!-- <button type="button" class="btn btn-primary" onclick="printPDF()">Print to PDF</button> -->
        </div>
      </div>
      <div class="box-body">
        @yield('Content')
      </div>
    </div>
  </section>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{asset('bower_components/printThis/printThis.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('js/demo.js') }}"></script> -->
@yield('custom_script')
</body>
</html>
