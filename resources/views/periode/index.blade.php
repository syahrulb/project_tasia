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
                MASTER PERIODE
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
                            <h3 class="box-title">Periode</h3>
                            <div class="box-tools pull-right">
                                <a href="/periode/create" style="color: white"
                                   class="btn btn-lg btn-success btn-box-tool"><i class="fa fa-plus"></i> ADD</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th class="col-xs-2">Tanggal Awal</th>
                                    <th class="col-xs-2">Tanggal Akhir</th>
                                    <th class="col-xs-7">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($periodes as $periode)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$periode->tanggal_awal}}</td>
                                        <td>{{$periode->tanggal_akhir}}</td>
                                        <td>
                                            <span style="display: inline">
                                                <a href="{{ action('PeriodeController@edit',$periode->id_periode)}}"
                                                   class="btn btn-primary">Edit</a>
                                                <form style="display: inline"
                                                      action="{{ action('PeriodeController@destroy', $periode->id_periode)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
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
@section('custom_script')
    <script>
        $(function () {
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection
