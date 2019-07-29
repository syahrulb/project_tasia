@extends('layouts.layout')

@section('Title')
    Laporan
@endsection

@section('Content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Laporan
                <small>Create</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Laporan</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Buat Laporan</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('create-laporan') }}">
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-horizontal">
                                                    <div class="form-group margin-bottom-5">
                                                        <label class="col-sm-3 control-label">Setting </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control">
                                                                <option>Rasio 1</option>
                                                                <option>Rasio 2</option>
                                                                <option>Rasio 3</option>
                                                                <option>Rasio 4</option>
                                                                <option>Rasio 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Sama dengan periode sebelumnya.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rasio Lancar</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Standar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rasio Solvabilitas</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Standar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rasio Profitabilitas</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Standar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-small">
                                            <div class="col-md-4">
                                                <div class="form-group margin-bottom-5">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Checkboxs
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group margin-bottom-5">
                                                            <select class="form-control">
                                                                <option>option 1</option>
                                                                <option>option 2</option>
                                                                <option>option 3</option>
                                                                <option>option 4</option>
                                                                <option>option 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pilih Visualisasi Yang Anda Ingikan Pada Laporan Anda :</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1"
                                                           value="option1" checked="">
                                                    Diagram
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                           value="option2">
                                                    Diagram
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                           value="option2">
                                                    Diagram
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Terapkan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
            </div>
        </section>

    </div>
@endsection
