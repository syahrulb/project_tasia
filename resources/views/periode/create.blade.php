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

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- iCheck -->
                    <div class="box">
                        <form id="addPeriode" method="post" action="{{ route('periode.store') }}">
                            <div class="box-header">
                                <h4 class="box-title">Add Periode </h4>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <!-- ./col -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @csrf
                                            <label>Pilih Periode :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="tanggal" class="form-control pull-right"
                                                       id="reservation">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ./col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                <div class="row">
                                                    <div class="col-sm-8"><h2>Add <b>Saldo Akun</b></h2></div>
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-info add-new"><i
                                                                class="fa fa-plus"></i> Add New
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="tableAkun" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Nama Akun</th>
                                                    <th>Saldo Awal</th>
                                                    <th>Saldo Akhir</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <select name="akun_periode[0][id_akun]"
                                                                class="form-control select2 checkDuplicate"
                                                                style="width: 100%;">
                                                            <option selected="selected" disabled> -- Pilih Akun --
                                                            </option>
                                                            @foreach($akuns as $akun)
                                                                <option
                                                                    value="{{$akun->id_akun}}">{{$akun->nama_akun}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="number" step="any" class="form-control"
                                                               name="akun_periode[0][saldo_awal]"></td>
                                                    <td><input type="number" step="any" class="form-control"
                                                               name="akun_periode[0][saldo_akhir]"></td>
                                                    <td>
                                                        <a class="delete btn btn-danger" style="color: white"
                                                           title="Delete" data-toggle="tooltip">-</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('custom_script')
    <script>

        $(document).ready(function () {
            $('#reservation').daterangepicker();
            $('.select2').select2();
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("#tableAkun td:last-child").html();
            console.log('actions', actions);
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                var index = $("table tbody tr:last-child").index();
                console.log(index);
                var row = '<tr>' +
                    '<td>' +
                    '<select  name="akun_periode[' + (index + 1) + '][id_akun]" class="form-control select2 checkDuplicate" style="width: 100%;"> ' +
                    '<option selected="selected" disabled> -- Pilih Akun -- </option>' +
                    @foreach($akuns as $akun)
                        '<option value="{{$akun->id_akun}}">{{$akun->nama_akun}}</option>' +
                    @endforeach
                        '</select>' +
                    '</td>' +
                    '<td><input type="number" step="any" class="form-control" name="akun_periode[' + (index + 1) + '][saldo_awal]"></td>' +
                    '<td><input type="number" step="any" class="form-control" name="akun_periode[' + (index + 1) + '][saldo_akhir]"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
                $('.select2').select2();
            });
            // Add row on add button click
            // Delete row on delete button click
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });

            $(document).on("submit", "#addPeriode", function (e) {
                var array = [];
                $(".checkDuplicate").each(function (index) {
                    var check = $(this).children("option:selected").text();
                    array.push({id: $(this).val(), name: check});
                });

                var temp = [];
                $.each(array, function (key, value) {
                    if ($.inArray(value.id, temp) === -1) {
                        temp.push(value.id);
                    } else {
                        alert("Akun " + value.name + " sudah ditambahkan, harap pilih salah satu. (Duplicated)");
                        e.preventDefault();
                    }
                });
            });

        });

    </script>
@endsection
