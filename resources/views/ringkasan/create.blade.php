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
        PENGATURAN STANDAR DAN VISUALISASI RASIO
        <br>
      </h1>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Periode</label>
                  <select class="form-control">
                  @foreach ($periode as $periode)
                    <option>{{$periode->tanggal_awal}} - {{$periode->tanggal_akhir}}</option>
                  @endforeach
                  </select>
                </div>
            </div>
          </div>
          <!-- radio -->
          <div class="form-group">
            <label>
              <input type="checkbox" class="flat-red">
              Sama dengan periode sebelumnya
            </label>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- iCheck -->
          <div class="box box-success">
            <div class="col-md-12">
              <h4 class="box-title">Pilih rasio yang akan anda gunakan pada perusahaan anda:</h4>
            </div>
            <div class="box-body">
              <div class="row">
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="box" style="color: black;">
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-striped">
                          <tr>
                            <th style="width: 10px"></th>
                            <th>Rasio Solvabilitas</th>
                            <th>Standar</th>
                            <th style="width: 80px"></th>
                          </tr>
                          @foreach ($rasio1 as $rasio1)
                          <tr>
                            <td>
                              <!-- <div class="form-group"> -->
                                <label>
                                  <input type="checkbox" class="flat-red" disabled>
                                </label>
                              <!-- </div> -->
                            </td>
                            <td>{{$rasio1->nama_rasio}}</td>
                            <td>
                              <div>
                                <select class="form-control">
                                  <option><</option>
                                  <option>></option>
                                  <option>=</option>
                                  <option><=</option>
                                  <option>>=</option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="col-xs-12">
                                <input type="text" class="form-control" placeholder="x">
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="box" style="color: black;">
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-striped">
                          <tr>
                            <th style="width: 10px"></th>
                            <th>Rasio Profitabilitas</th>
                            <th>Standar</th>
                            <th style="width: 80px"></th>
                          </tr>
                          @foreach ($rasio2 as $rasio2)
                          <tr>
                            <td>
                              <!-- <div class="form-group"> -->
                                <label>
                                  <input type="checkbox" class="flat-red" disabled>
                                </label>
                              <!-- </div> -->
                            </td>
                            <td>{{$rasio2->nama_rasio}}</td>
                            <td>
                              <div>
                                <select class="form-control">
                                  <option><</option>
                                  <option>></option>
                                  <option>=</option>
                                  <option><=</option>
                                  <option>>=</option>
                                </select>
                              </div>
                            </td>
                            <td>
                              <div class="col-xs-12">
                                <input type="text" class="form-control" placeholder="x">
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>
                <!-- ./col -->
              </div>
            </div>
            <div class="box-footer">
              <div class="col-md-10">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </div>
          </div>

          <!-- iCheck -->
          <div class="box box-success">
            <div class="col-md-12">
              <h4 class="box-title">Pilih visualisasi yang anda inginkan pada laporan anda:</h4>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="box" style="color: black;">
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-striped">
                          <tr>
                            <th style="width: 10px"></th>
                            <th>Rasio Solvabilitas</th>
                          </tr>
                          @foreach($diagram1 as $diagram1)
                          <tr>
                            <td>
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                              </label>
                            </td>
                            <td>{{$diagram1['bentuk_diagram']}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="box" style="color: black;">
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-striped">
                          <tr>
                            <th style="width: 10px"></th>
                            <th>Rasio Profitabilitas</th>
                          </tr>
                          @foreach($diagram2 as $diagram2)
                          <tr>
                            <td>
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                              </label>
                            </td>
                            <td>{{$diagram2['bentuk_diagram']}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="col-md-10">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection