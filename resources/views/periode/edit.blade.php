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
                        <form id="addPeriode" method="post"
                              action="{{ action('PeriodeController@update', $periode->id_periode) }}">
                            <div class="box-header">
                                <h4 class="box-title">Edit Periode </h4>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <!-- ./col -->
                                    <div class="col-md-12">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group">
                                            <label>Pilih Periode :</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="tanggal" class="form-control pull-right"
                                                       value="{{ date("Y/m/d", strtotime($periode->tanggal_awal)).' - '.date("Y/m/d", strtotime($periode->tanggal_akhir)) }}"
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
                                            <table id="tableAkunPeriode" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Nama Akun</th>
                                                    <th>Saldo Awal</th>
                                                    <th>Saldo Akhir</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(sizeof($akun_periode) != 0)
                                                    @foreach($akun_periode as $key=>$value)
                                                        <tr row="{{$key}}">
                                                            <td>
                                                                <input type="hidden" class="id_akun_periode"
                                                                       name="akun_periode[{{$key}}][id]"
                                                                       value="{{$value->id}}">
                                                                <select name="akun_periode[{{$key}}][id_akun]"
                                                                        class="form-control checkDuplicate"
                                                                        style="width: 100%;">
                                                                    <option disabled> -- Pilih Operator --</option>
                                                                    @foreach($akuns as $akun)
                                                                        <option value="{{ $akun->id_akun}}"
                                                                                @if(isset($value->id_akun))
                                                                                @if ($akun->id_akun == old('akun_periode['.$key.'][id_akun]', $value->id_akun))
                                                                                selected="selected"
                                                                            @endif
                                                                            @endif>
                                                                            {{ $akun->nama_akun}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input type="number" step="any" class="form-control"
                                                                       value="{{$value->saldo_awal}}"
                                                                       name="akun_periode[{{$key}}][saldo_awal]"></td>
                                                            <td><input type="number" step="any" class="form-control"
                                                                       value="{{$value->saldo_akhir}}"
                                                                       name="akun_periode[{{$key}}][saldo_akhir]"></td>
                                                            <td>
                                                                <a class="delete btn btn-danger" style="color: white"
                                                                   title="Delete" data-toggle="tooltip">-</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr row="0">
                                                        <td>
                                                            <input type="hidden" class="id_akun_periode"
                                                                   name="akun_periode[0][id]" value="">
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
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
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
            $('#reservation').daterangepicker(
                {
                    locale: {
                        format: 'YYYY/MM/DD'
                    }
                }
            );
            $('.select2').select2();
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("#tableAkunPeriode td:last-child").html();
            console.log('actions', actions);
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                var index = $("table tbody tr:last-child").index();
                console.log(index);
                var row = '<tr row="' + (index + 1) + '">' +
                    '<input type="hidden" class="id_akun_periode" name="akun_periode[' + (index + 1) + '][id]" value="">' +
                    '<td>' +
                    '<select name="akun_periode[' + (index + 1) + '][id_akun]" class="form-control select2 checkDuplicate" style="width: 100%;">' +
                    '<option selected="selected" disabled> -- Pilih Akun -- </option>' +
                    @foreach($akuns as $akun)
                        '<option value="{{$akun->id_akun}}">{{$akun->nama_akun}}</option>' +
                    @endforeach
                        '</select>' +
                    '</td>' +
                    '<td><input type="number" step="any" class="form-control" name="akun_periode[' + (index + 1) + '][saldo_awal]"></td>' +
                    '<td><input type="number" step="any"  class="form-control" name="akun_periode[' + (index + 1) + '][saldo_akhir]"></td>' +
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
                var id_akun_periode = $(this).parents("tr").find(".id_akun_periode").val();
                var row = $(this).parents("tr").attr('row');
                console.log(id_akun_periode);
                if (id_akun_periode != "" && id_akun_periode != null) {
                    var result = confirm("Are you sure want to delete this?");
                    if (result) {
                        var CSRF_TOKEN = $('input[name="_token"]').attr('value');
                        $.ajax({
                            url: '/deleteAkunPeriode',
                            type: 'POST',
                            data: {_token: CSRF_TOKEN, id: id_akun_periode},
                            dataType: 'JSON',
                            success: function (data) {
                                console.log(data);
                                $('tr[row="' + row + '"]').remove();
                                $(".add-new").removeAttr("disabled");
                            }
                        });
                    }
                } else {
                    $(this).parents("tr").remove();
                    $(".add-new").removeAttr("disabled");
                }
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
