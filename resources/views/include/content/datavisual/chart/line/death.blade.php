@extends('layouts.chart')
@section('chart_width')
1/3
@overwrite
@section('chart_title')
Meninggal
@overwrite
@section('chart_title')
Meninggal
@overwrite
@section('chart_content')
<canvas id="death_chart_province" class="chartjs" width="undefined" height="200"></canvas>
<script>
    var deathDay = [];
    var deathCase = [];
    var cumulativeDeath = [];
    @foreach($stats as $stat)
        deathDay.push("{{ $stat->date }}");
        deathCase.push("{{ $stat->death }}");
        cumulativeDeath.push("{{ $stat->cumulative_death }}")
    @endforeach
    new Chart(document.getElementById("death_chart_province"), {
        "type": "bar",
        "data": {
            "labels": deathDay,
            "datasets": [{
                "label": "Kasus Baru",
                "data": deathCase,
                "borderColor": "rgba(255, 159, 64, 0.2)",
                "backgroundColor": "rgb(255, 159, 64)"
            },
            {
                "label": "Kumulatif",
                "data": cumulativeDeath,
                "type": "line",
                "fill": true,
                "backgroundColor": "rgba(255, 159, 64, 0.2)",
                "borderColor": "rgba(255, 159, 64, 0.6)"
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
