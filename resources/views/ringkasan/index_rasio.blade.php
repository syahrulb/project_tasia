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
                MASTER RASIO
                <br>
            </h1>

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
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">RASIO</h3>
                            <div class="box-tools pull-right">
                                {{--                                <a href="/pengaturan-rasio/create" style="color: white" class="btn btn-lg btn-success btn-box-tool"><i class="fa fa-plus"></i> ADD</a>--}}
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example2"
                                           class="table table-bordered table-hover table-responsive datatable">
                                        <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th class="col-xs-4">Nama Rasio</th>
                                            <th class="col-xs-1">Jenis Rasio</th>
                                            <th class="col-xs-7">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($rasios as $rasio)
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$rasio->nama_rasio}}</td>
                                                <td>{{$rasio->jenis_rasio}}</td>
                                                <td>
                                            <span style="display: inline">
                                                <a href="{{ action('PengaturanRasioController@edit',$rasio->id_rasio)}}"
                                                   class="btn btn-primary">Edit</a>
{{--                                                <form style="display: inline" action="{{ action('PengaturanRasioController@destroy', $rasio->id_rasio)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>--}}
                                            </span>

                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->


    </div>
@endsection
