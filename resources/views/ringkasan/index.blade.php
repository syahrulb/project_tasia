@extends('layouts.layout')
@section('Title')
  CES Jasa Persewaan
@endsection
@section('Content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        PENGATURAN JENIS AKUN
        <br>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <!-- /.box -->
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Jenis Akun</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
            </div>
          </div>
          <!-- iCheck -->
          <div class="box box-success">
            <div class="col-md-12">
              <h3 class="box-title">Nama Akun</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->

              <!-- Minimal red style -->

              <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="flat-red" disabled>
                  Flat green skin checkbox
                </label>
              </div>

              <!-- radio -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="flat-red" disabled>
                  Flat green skin checkbox
                </label>
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="box-footer">
              Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
            </div>
          
      </div>
    </section>
  </div>
@endsection