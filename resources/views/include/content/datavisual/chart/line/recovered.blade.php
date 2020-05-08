@extends('layouts.chart')
@section('chart_width')
1/3
@overwrite
@section('chart_title')
Sembuh
@overwrite
@section('chart_content')
<canvas id="recovered_chart_province" class="chartjs" width="undefined" height="200"></canvas>
<script>
    var recoveredDay = [];
    var recoveredCase = [];
    var cumulativeRecovered = [];
    @foreach($stats as $stat)
        recoveredDay.push("{{ $stat->date }}");
        recoveredCase.push("{{ $stat->recovered }}");
        cumulativeRecovered.push("{{ $stat->cumulative_recovered }}")
    @endforeach
    new Chart(document.getElementById("recovered_chart_province"), {
        "type": "bar",
        "data": {
            "labels": recoveredDay,
            "datasets": [{
                "label": "Kasus Baru",
                "data": recoveredCase,
                "borderColor": "rgba(75, 192, 192, 0.2)",
                "backgroundColor": "rgb(75, 192, 192)"
            },
            {
                "label": "Kumulatif",
                "data": cumulativeRecovered,
                "type": "line",
                "fill": true,
                "backgroundColor": "rgba(75, 192, 192, 0.2)",
                "borderColor": "rgba(75, 192, 192, 0.6)"
            }]
        },
        "options": {
            "plugins" :
                {
                    "datalabels" : {
                        "display" : false
                    }
                },
            "scales": {
                "yAxes": [{
                    "ticks": {
                        "beginAtZero": true
                    }
                }]
            }
        }
    });
</script>
@overwrite
