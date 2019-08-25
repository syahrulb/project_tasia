@extends('layouts.layout')

@section('Title')
    Laporan
@endsection

@section('Content')

    <style type="text/css">
        @media print {
            .canvas_container {
                max-width: 100%;
                padding-bottom: 50%;
                position: relative;
            }

            canvas {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                width: 100%;
            }
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Laporan
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Laporan</a></li>
                <li class="active">View</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Laporan</h3>
                            <div class="box-tools">
                                <button onclick="printToPDF()" class="btn btn-primary">Print to PDF</button>
                            </div>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pilih periode yang anda inginkan</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" name="tanggal"
                                                                   class="form-control pull-right" id="reservation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Pilih Jenis Grafik</label>
                                                <select id="jenis" class="form-control">
                                                    <option value="bar">Bar</option>
                                                    <option value="line">Line</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rasio yang ingin di tampilkan</label>
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <select id="rasios" name="rasios[]" class="select2"
                                                                multiple="multiple" class="form-control">
                                                            @if(isset($rasios))
                                                                @foreach($rasios as $rasio)
                                                                    <option
                                                                        value="{{$rasio->id_rasio}}"> {{$rasio->nama_rasio }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button id="generateChart" class="btn btn-primary">Terapkan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr>
                                </div>
                            </div>
                            <div id="print_pdf">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="canvas_container" style="position: relative;">
                                            <canvas id="laporanchart"
                                                    style="max-width: 100% !important; height: auto !important;"
                                                    width="400" height="150"></canvas>
                                        </div>
                                        <script>

                                            $(document).ready(function () {
                                                var chart = null;
                                                $('#reservation').daterangepicker(
                                                    {
                                                        locale: {
                                                            format: 'YYYY/MM/DD'
                                                        }
                                                    }
                                                );

                                                $('.select2').select2({width: '100%'});
                                                $(document).on("click", "#generateChart", function () {
                                                    var CSRF_TOKEN = $('input[name="_token"]').attr('value');
                                                    $.ajax({
                                                        url: '/generateChartRasio',
                                                        type: 'GET',
                                                        data: {
                                                            _token: CSRF_TOKEN,
                                                            tanggal: $("#reservation").val(),
                                                            rasio: $("#rasios").val()
                                                        },
                                                        dataType: 'JSON',
                                                        success: function (datas) {
                                                            console.log(datas);
                                                            if (datas.error == true) {
                                                                Swal.fire({
                                                                    type: 'error',
                                                                    title: 'Error!',
                                                                    html: 'Harap Lengkapi Data Akun pada Rasio <b>' + datas.ketError.rasio + '</b> di Periode <b>' + datas.ketError.periode + '</b>',
                                                                    confirmButtonText:
                                                                        '<a style="color: white" href="/periode/' + datas.ketError.id_periode + '/edit"> Edit Periode </a>'
                                                                })
                                                            } else {

                                                                var table = '<table style="width:auto !important;" class="table table-striped"><thead><tr><th style="vertical-align: middle; text-align: center" rowspan="2">Jenis Rasio</th>';
                                                                if (chart != null) {
                                                                    chart.destroy();
                                                                }

                                                                var ctx = document.getElementById('laporanchart').getContext('2d');
                                                                var datasets = [];
                                                                var index = 0;
                                                                $.each(datas.data, function (periodes, periode) {
                                                                    datasets.push({});
                                                                    datasets[index].data = [];
                                                                    datasets[index].kriteria = [];
                                                                    if ($("#jenis").val() == 'bar') {
                                                                        datasets[index].backgroundColor = getRandomColor();
                                                                    } else if ($("#jenis").val() == 'line') {
                                                                        datasets[index].backgroundColor = getRandomColor();
                                                                        datasets[index].borderColor = datasets[index].backgroundColor;
                                                                        datasets[index].fill = false;
                                                                    }
                                                                    $.each(periode, function (key, value) {
                                                                        datasets[index].kriteria.push(value.kriteria);
                                                                        datasets[index].data.push(value.rasio);
                                                                        datasets[index].label = value.nama_rasio;
                                                                    });
                                                                    index++;
                                                                });

                                                                var dataChart = {
                                                                    labels: datas.labels,
                                                                    datasets: datasets
                                                                };

                                                                table = table + '<th style="vertical-align: middle; text-align: center" colspan="' + dataChart.labels.length + '">Periode</th></tr><tr>';

                                                                $.each(dataChart.labels, function (key, val) {
                                                                    table = table + '<td>' + val + '</td>';
                                                                });

                                                                table = table + '</tr></thead><tbody>';

                                                                $.each(dataChart.datasets, function (key, val) {
                                                                    table = table + '<tr>';
                                                                    table = table + '<td>' + val.label + '</td>';
                                                                    $.each(val.kriteria, function (k, v) {
                                                                        table = table + '<td>' + v + '</td>';
                                                                    });
                                                                    table = table + '</tr>';
                                                                });

                                                                table = table + '</tbody>';

                                                                console.log(datasets, 'datasets');
                                                                console.log(dataChart, 'datachart');

                                                                var options = {
                                                                    responsive: true,
                                                                    scales: {
                                                                        xAxes: [{
                                                                            ticks: {
                                                                                beginAtZero: true,
                                                                                min: 0
                                                                            }
                                                                        }]
                                                                    }
                                                                };

                                                                // Chart declaration:

                                                                if ($("#jenis").val() == 'bar') {
                                                                    chart = new Chart(ctx, {
                                                                        type: 'horizontalBar',
                                                                        data: dataChart,
                                                                        options: options
                                                                    });
                                                                } else if ($("#jenis").val() == 'line') {
                                                                    chart = new Chart(ctx, {
                                                                        type: 'line',
                                                                        data: dataChart,
                                                                        options: options
                                                                    });
                                                                }

                                                                $("#table-kriteria").html(table);

                                                            }

                                                        }
                                                    });
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

                                            function getRandomColor() {
                                                var letters = 'BCDEF'.split('');
                                                var color = '#';
                                                for (var i = 0; i < 6; i++) {
                                                    color += letters[Math.floor(Math.random() * letters.length)];
                                                }
                                                return color;
                                            }

                                            function printToPDF() {
                                                $('#print_pdf').printThis({
                                                    canvas: true
                                                });
                                            }

                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Keterangan Grafik</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body no-padding" id="table-kriteria">
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
