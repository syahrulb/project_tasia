@extends('layouts.layoutpdf')
@section('Title')
    Pdf
@endsection
@section('css')
<style media="screen">
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
</style>
@endsection
@section('Content')
<div class="row">
  <div class="col-lg-12">
    <div class="canvas_container" style="position: relative;">
        <canvas id="laporanchart"style="max-width: 100% !important; height: auto !important;"width="400" height="150"></canvas>
    </div>
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
              <table style="width:100% !important;" class="table table-striped">
                <thead>
                  <tr>
                    <th style="vertical-align: middle; text-align: center; width:50%" rowspan="2">Jenis Rasio</th>
                    <th style="vertical-align: middle; text-align: center; width:50%" colspan="{{count($datas)}}">Periode</th>
                  </tr>
                  <tr>
                    @foreach($datas as $item)
                      <td>  {{  $item['label'] }}  </td>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$jenis_rasio->jenis_rasio}}</td>
                      @foreach($datas as $item)
                      <td>{{  $item['data'][1] }}</td>
                      @endforeach
                  <tr>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection
@section('custom_script')
<script type="text/javascript">
  var ctx = document.getElementById('laporanchart').getContext('2d');
  var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                      @foreach($datas as $item)
                        "{{  $item['label'] }}",
                      @endforeach
                    ],
                    datasets: [{
                        label: 'Nilai rasio dari',
                        data: [
                          @foreach($datas as $item)
                            {{  $item['data'][0] }},
                          @endforeach
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
</script>
<script type="text/javascript">
function printPDF() {
  $('#print_pdf').printThis({
      canvas: true
  });
}
$('#print_pdf').printThis({
    canvas: true
});
</script>
@endsection
