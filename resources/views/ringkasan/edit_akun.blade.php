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
                <div class="col-md-8">
                    <!-- iCheck -->
                    <div class="box">
                        <form id="addPeriode" method="post"
                              action="{{ action('PengaturanAkunController@update', $akun->id_akun) }}">
                            <div class="box-header">
                                <h4 class="box-title">Edit Akun</h4>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <!-- ./col -->
                                    <div class="col-md-12">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group">
                                            @csrf
                                            <label> Kode Akun :</label>
                                            <div class="input-group">
                                                <input type="text" name="id_akun" readonly="readonly"
                                                       value="{{$akun->id_akun}}" class="form-control pull-right"
                                                       id="id_akun">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Nama Akun :</label>
                                            <div class="input-group">
                                                <input type="text" name="nama_akun" class="form-control pull-right"
                                                       id="nama_akun" value="{{$akun->nama_akun}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Saldo Normal :</label>
                                            <div class="input-group">
                                                <select name="saldo_akun" class="form-control" style="width: 100%;">
                                                    <option> -- Pilih Jenis --</option>
                                                    <?php $jenis_saldo = array('1' => 'Debit', '-1' => 'Kredit')?>
                                                    @foreach ($jenis_saldo as $idx => $val)
                                                        <option value="{{ $idx }}"
                                                                @if ($idx == $akun->saldo_akun)
                                                                selected="selected"
                                                            @endif>
                                                            {{ $val}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{--                                                <input type="text" name="saldo_akun" class="form-control pull-right" id="saldo_akun" value="{{$akun->saldo_akun}}">--}}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ./col -->
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
