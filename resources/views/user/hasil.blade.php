@extends('user.app')

@section('userbody')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Hasil Penilaian</h1>
    <div class="row">
    <div class="container">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-light table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tanggal Penilaian</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Grade</th>
                                <th class="text-center">Saran</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $index => $row)
                            <tr align="center">
                                <th>{{ $loop->iteration }}</th>
                                <td align="center">{{ $row->tgl_nilai }}</td>
                                <td align="center">{{ $row->nilai }}</td>
                                <td align="center">{{ $row->grade }}</td>
                                <td align="left">{{ $row->saran }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Chart Penilaian Anda</h3>
        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChartUser"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        <p>Nilai Rata Rata = {{ $data->sum('nilai') / $data->count() }}</p>
                        @if ($data->sum('nilai') / $data->count() == 10)
                            <p>Grade = Sangat Baik</p>
                        @elseif ($data->sum('nilai') / $data->count() <= 9.9)
                            <p>Grade = Baik</p>
                        @elseif ($data->sum('nilai') / $data->count() <= 8.9)
                            <p>Grade = Cukup</p>
                        @elseif ($data->sum('nilai') / $data->count() <= 7.9)
                            <p>Grade = Kurang Baik</p>
                        @elseif ($data->sum('nilai') / $data->count() <= 6.9)
                            <p>Grade = Sangat Kurang Baik</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        var donutChartCanvas = $('#donutChartUser').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Sangat Kurang Baik', 'Kurang Baik', 'Cukup', 'Baik', 'Sangat Baik',
            ],
            datasets: [{
                data: [
                    {{ $dataSkb }}, {{ $dataKb }}, {{ $dataC }}, {{ $dataB }},
                    {{ $dataSb }}
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    </script>
@stop
