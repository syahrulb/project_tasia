@extends('layouts.layout')
@section('Title')
  CES Jasa Persewaan | Setting Perusahaan
@endsection
@section('Content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configurable Enterprise System Jasa Persewaan
        <br>
        <small>Setting Perusahaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting Perusahaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Perusahan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form role="form" method="POST" action="{{ route('setting-perusahaan.store') }}">
                  {{ csrf_field() }}
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Data nama perusahaan">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Data alamat perusahaan" id="alamat" name="alamat"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Telefon</label>
                        <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Data telefon">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fax</label>
                        <input type="text" class="form-control" id="fax" name="fax" placeholder="Data fax">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Data email">
                      </div>
                  </div>
                  <div class="col-md-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai_data" name="tanggal_mulai_data" placeholder="Data Tangal Mulai">
                      </div>
                  </div>
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
@endsection