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
        PENGATURAN VISUALISASI RASIO
        <br>
      </h1>
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
              <h4 class="box-title">Pilih visualisasi yang anda inginkan pada laporan anda:</h4>
            </div>
            <form action="{{url('/pengaturan-diagram')}}" method="POST">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="box" style="color: black;">
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                        <!-- <input type="hidden" class="" name="id_rasio" value="1"> -->
                          <table class="table table-striped">
                            <tr>
                              <th style="width: 10px"></th>
                              <th>Rasio Solvabilitas</th>
                            </tr>
                            @foreach($diagram1 as $diagram1)
                            <tr>
                              <td>
                                <label>
                                  <input type="radio" name="1" id="optionsRadios1" value="{{$diagram1['id_master_diagram']}}">
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
                                  <input type="radio" name="2" id="optionsRadios1" value="{{$diagram2['id_master_diagram']}}">
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
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection