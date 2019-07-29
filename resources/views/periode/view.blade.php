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
                PENGATURAN STANDAR RASIO
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
                            <h4 class="box-title">Add Periode:</h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-md-4">
                                    <div class="box" style="color: black;">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <form method="post" action="{{ route('periode') }}">
                                                <div class="form-group">
                                                    @csrf
                                                    <label for="tanggal_awal">Tanggal Awal :</label>
                                                    <input type="text" class="form-control" name="tanggal_awal"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_akhir">Tanggal Akhir :</label>
                                                    <input type="text" class="form-control" name="tanggal_akhir"/>
                                                </div>
                                                <button type="submit" class="btn btn-primary pull-right">Add</button>
                                            </form>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>

                                <!-- ./col -->
                            </div>
                        </div>
                        {{-- <div class="box-footer">
                             <div class="col-md-10">
                                 <button type="submit" class="btn btn-primary pull-right">Submit</button>
                             </div>
                         </div>--}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection