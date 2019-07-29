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
                MASTER AKUN
                <br>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-4">
                    <!-- iCheck -->
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title"> Create Akun </h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-md-12">
                                    <form method="post" action="{{ action('PengaturanAkunController@storeakun') }}">
                                        <div class="form-group">
                                            @csrf
                                            <label> Kode Akun :</label>
                                            <div class="input-group">
                                                <input type="text" name="id_akun" class="form-control pull-right"
                                                       id="id_akun">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Nama Akun :</label>
                                            <div class="input-group">
                                                <input type="text" name="nama_akun" class="form-control pull-right"
                                                       id="nama_akun">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Saldo Akun :</label>
                                            <div class="input-group">
                                                <select name="saldo_akun" class="form-control">
                                                    <option> -- Pilih Jenis Rasio --</option>
                                                    <?php $jenis_saldo = array('1' => 'Debit', '-1' => 'Kredit')?>
                                                    @foreach ($jenis_saldo as $idx => $val)
                                                        <option value="{{ $idx }}">
                                                            {{ $val}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{--                                                <input type="text" name="saldo_akun" class="form-control pull-right" id="saldo_akun">--}}
                                            </div>
                                        </div>
                                </div>

                                <!-- ./col -->
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('custom_script')
    <script>
        $(function () {
            //Initialize Select2 Elements
            //Date range picker
            $('#reservation').daterangepicker()

        })
    </script>
@endsection
