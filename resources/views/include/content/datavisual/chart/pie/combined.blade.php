@extends('layouts.chart')
@section('chart_width')
1/2
@overwrite
@section('chart_title')
Perbandingan
@overwrite
@section('chart_content')
<canvas id="pie_chart" class="chartjs" width="undefined" height="200"></canvas>
<script>
        var pos = {{ $stats[sizeof($stats) - 1]->cumulative_positive }}
        var dead = {{ $stats[sizeof($stats) - 1]->cumulative_death }}
        var rec = {{ $stats[sizeof($stats) - 1]->cumulative_recovered }}
        pos = pos - (dead + rec)
        var data =
            [{
                data:
                    [
                        pos,
                        dead,
                        rec
                    ],
                backgroundColor: ["rgb(54, 162, 235)", "rgb(255, 159, 64)", "rgb(75, 192, 192)"]
            }]
        var options = {
            tooltips: {
                enabled: true,
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        let sum = 0;
                        let dataArr = ctx.chart.data.datasets[0].data;
                        dataArr.map(data => {
                            sum += data;
                        });
                        let percentage = (value*100 / sum).toFixed(2)+"%";
                        return percentage;
                    },
                    color: '#fff',
                }
            }
        };
        new Chart(document.getElementById("pie_chart"), {
                    "type": "pie",
                    "data": {
                        "labels": ["Sedang Dirawat", "Meninggal", "Sembuh"],
                        "datasets" : data
                    },
                    "options" : options
                });
</script>
@overwrite

