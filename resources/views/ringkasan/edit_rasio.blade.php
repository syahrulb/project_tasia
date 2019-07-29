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

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-6">
                    <!-- iCheck -->
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Edit Rasio </h4>
                        </div>
                        <form method="post" action="{{ action('PengaturanRasioController@update', $rasio->id_rasio) }}">
                            <div class="box-body">
                                <div class="row">
                                    <!-- ./col -->
                                    <div class="col-md-12">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group">
                                            <label> Jenis Rasio :</label>
                                            <div class="input-group">
                                                <select disabled name="jenis_rasio" class="form-control"
                                                        style="width: 100%;">
                                                    <option> -- Pilih Jenis Rasio --</option>
                                                    @foreach ($jenis_rasios as $jenis)
                                                        <option value="{{ $jenis->id_jenis_rasio }}"
                                                                @if ($jenis->id_jenis_rasio == old('jenis_rasio', $rasio->jenis_rasio))
                                                                selected="selected"
                                                            @endif>
                                                            {{ $jenis->jenis_rasio}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Nama Rasio :</label>
                                            <div class="input-group">
                                                <input type="text" style="width: 100% " name="nama_rasio"
                                                       value="<?php if (isset($rasio->nama_rasio)) echo $rasio->nama_rasio?>"
                                                       class="form-control pull-right" id="id_akun">
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
                                                    <div class="col-sm-8"><h2>Add <b>Kriteria</b></h2></div>
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-info add-new"><i
                                                                class="fa fa-plus"></i> Add New
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="tableKriteria" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Operator</th>
                                                    <th>Nilai Batas</th>
                                                    <th>Kriteria</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(sizeof($kriteria_rasio) != 0)
                                                    @foreach($kriteria_rasio as $key=>$value)
                                                        <tr row="{{$key}}">
                                                            <td>
                                                                <input type="hidden" class="id_kriteria"
                                                                       name="kriteria_rasio[{{$key}}][id]"
                                                                       value="{{$value->id}}">
                                                                <select name="kriteria_rasio[{{$key}}][operator]"
                                                                        class="form-control" style="width: 100%;">
                                                                    <option selected="selected" disabled> -- Pilih
                                                                        Operator --
                                                                    </option>
                                                                    <option value="<"
                                                                            @if($value->operator == "<") selected="selected" @endif>
                                                                        <
                                                                    </option>
                                                                    <option value=">"
                                                                            @if($value->operator == ">") selected="selected" @endif>
                                                                        >
                                                                    </option>
                                                                    <option value="<="
                                                                            @if($value->operator == "<=") selected="selected" @endif>
                                                                        <=
                                                                    </option>
                                                                    <option value=">="
                                                                            @if($value->operator == ">=") selected="selected" @endif>
                                                                        >=
                                                                    </option>
                                                                    <option value="="
                                                                            @if($value->operator == "=") selected="selected" @endif>
                                                                        =
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td><input type="number" step="any" class="form-control"
                                                                       value="{{$value->nilai_batas}}"
                                                                       name="kriteria_rasio[{{$key}}][nilai_batas]">
                                                            </td>
                                                            <td><input type="text" class="form-control"
                                                                       value="{{$value->kriteria}}"
                                                                       name="kriteria_rasio[{{$key}}][kriteria]"></td>
                                                            <td>
                                                                <a class="delete btn btn-danger" style="color: white"
                                                                   title="Delete" data-toggle="tooltip">-</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr row="0">
                                                        <td>
                                                            <input type="hidden" class="id_kriteria"
                                                                   name="kriteria_rasio[0][id]" value="">
                                                            <select name="kriteria_rasio[0][operator]"
                                                                    class="form-control" style="width: 100%;">
                                                                <option selected="selected" disabled> -- Pilih Operator
                                                                    --
                                                                </option>
                                                                <option value="<"><</option>
                                                                <option value=">">></option>
                                                                <option value="<="><=</option>
                                                                <option value=">=">>=</option>
                                                                <option value="=">=</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="number" step="any" class="form-control"
                                                                   value="" name="kriteria_rasio[0][nilai_batas]"></td>
                                                        <td><input type="text" class="form-control" value=""
                                                                   name="kriteria_rasio[0][kriteria]"></td>
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
            $('.select2').select2();
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("#tableKriteria td:last-child").html();
            console.log('actions', actions);
            // Append table with add row form on add new button click
            $(".add-new").click(function () {
                var index = $("table tbody tr:last-child").index();
                console.log(index);
                var row = '<tr row="' + (index + 1) + '">' +
                    '<input type="hidden" class="id_kriteria" name="kriteria_rasio[' + (index + 1) + '][id]" value="">' +
                    '<td><select name="kriteria_rasio[' + (index + 1) + '][operator]" class="form-control" style="width: 100%;"> <option selected="selected" disabled> -- Pilih Operator -- </option><option value="<"><</option><option value=">">></option><option value="<="><=</option><option value=">=">>=</option><option value="=">=</option></select></td>' +
                    '<td><input type="number" step="any" class="form-control" name="kriteria_rasio[' + (index + 1) + '][nilai_batas]"></td>' +
                    '<td><input type="text" class="form-control" name="kriteria_rasio[' + (index + 1) + '][kriteria]"></td>' +
                    '<td>' + actions + '</td>' +
                    '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            // Delete row on delete button click
            $(document).on("click", ".delete", function () {
                var id_kriteria = $(this).parents("tr").find(".id_kriteria").val();
                var row = $(this).parents("tr").attr('row');
                console.log(id_kriteria);
                if (id_kriteria != "" && id_kriteria != null) {
                    var result = confirm("Are you sure want to delete this?");
                    if (result) {
                        var CSRF_TOKEN = $('input[name="_token"]').attr('value');
                        $.ajax({
                            url: '/deleteKriteria',
                            type: 'POST',
                            data: {_token: CSRF_TOKEN, id: id_kriteria},
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

        });
    </script>
@endsection
