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
        <form class="" method="POST" action="{{ action('PengaturanAkunController@store') }}">
          {{csrf_field()}}
          <input type=hidden value="{{ csrf_token() }}">
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <!-- /.box -->
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Jenis Akun</label>
                  <select name="id_kelompok" class="form-control">
                  @foreach ($pengelompokans as $pengelompokan)
                    <option value="{{$pengelompokan->id_kelompok}}">{{ $pengelompokan->kegunaan_akun }}</option>
                    @endforeach
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

              <!-- checkbox -->
              @foreach($akuns as $akun)
              <div class="form-group">
                <label>
                  <input type="checkbox"  name="id_akun[]" class="flat-red" value="{{ $akun->id_akun }}">
                  {{ $akun->nama_akun }}
                </label>
              </div>
              @endforeach

              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="box-footer">
              Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
            </div>
      </div>
    </section>
  </div>
@endsection