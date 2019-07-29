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
      @if (Session::has('success'))
          <div class="alert alert-success alert-dismissable">
              {!! Session::get('success') !!}
          </div>
      @endif
      @if (Session::has('failed'))
          <div class="alert alert-danger alert-dismissable">
              {!! Session::get('failed') !!}
          </div>
  @endif

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
        <form class="" method="POST" action="{{ action('PengaturanAkunController@store') }}">
            <div class="row">
                <!-- Left col -->
                {{csrf_field()}}
                <input type=hidden value="{{ csrf_token() }}">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Akun</label>
                                <select id="data_kelompok" name="id_kelompok" class="form-control"
                                        onchange="changeSelectedAkun()">
                                    <option>-- Pilih Pengelompokan --</option>
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
                        <div id="data_akun" class="box-body">
                            <!-- Minimal style -->
                            <br><br>
                            <h5>Data Kosong . . .</h5>
                            <!-- checkbox -->
                            {{--              @foreach($akuns as $akun)
                                            <div class="form-group">
                                              <label>
                                                <input type="checkbox"  name="id_akun[]" class="flat-red" value="{{ $akun->id_akun }}">
                                                {{ $akun->nama_akun }}
                                              </label>
                                            </div>
                                          @endforeach--}}
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
  </div>

  <script type="text/javascript">
      function changeSelectedAkun() {
          var isi = $("#data_kelompok").val();
          $('#data_akun').load('/pengaturan-akun/getAkunHasPengelompokan/' + isi);
      }
  </script>
@endsection
