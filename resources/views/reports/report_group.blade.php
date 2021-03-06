@extends('layouts.report')

@section('title')
    Report
@endsection

@section('header')
    จำนวนเล่มโครงงานแบ่งตามหมวดหมู่
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center form-inline">
            <label>ปีการศึกษา</label>
            <input type="text" id="date" class="form-control ml-2" value="{{ $year ?? date('Y') }}" autocomplete="off">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading my-2">รายงานจำนวนเล่มโครงงานในแต่ละหมวดหมู่</div>
                    <div class="col-lg-12">
                        <canvas id="report" class="rounded shadow"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @foreach ($chart->labels as $key => $item)
            <div class="row justify-content-center">
                <div class="col-md-1 text-right">
                    <span class="dot" style="background-color: {{ $chart->colours[$key] }}"></span>
                </div>
                <div class="col-md-1 text-left">{{ $item }}</div>
                <div class="col-md-8 text-left">{{ $chart->name[$key] }}</div>
            </div>
        @endforeach
    </div>
    <form action="#" id="form-search" method="get"></form>
@endsection


@push('scripts')
    <style>
        .dot {
            height: 15px;
            width: 15px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

    </style>
    <script>
        var config = JSON.parse('<?php echo $chart; ?>');
        var barChartData = {
            labels: config.labels,
            datasets: [{
                label: 'จำนวนโครงงานต่อหมวดหมู่ ',
                backgroundColor: config.colours,
                data: config.dataset
            }]
        };

        $(document).ready(function() {

            $('#date').datepicker({
                autoclose: true,
                format: 'yyyy',
                startView: 'years',
                minViewMode: 'years'
            })

            $('#date').change(function() {
                var year = $(this).val()
                $('#form-search').attr('action', '/showGroupReport/' + year)
                $('#form-search').submit()
            })

            var ctx = document.getElementById('report').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: barChartData,
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {
                                    if (value % 1 === 0) {
                                        return value
                                    }
                                }
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'จำนวนโครงงาน (เล่ม)'
                            }
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'หมวดหมู่'
                            }
                        }]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            //fontColor: '#122C4B',
                            // fontFamily: "'DB'",
                            position: 'bottom',
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,

                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 10
                        }
                    }
                }
            });
        })

    </script>
@endpush
