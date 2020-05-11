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
<canvas id="death_chart_province" class="chartjs" width="undefined" height="250"></canvas>
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
                yAxisID: 'left-axis',
                "borderColor": "rgba(255, 159, 64, 0.2)",
                "backgroundColor": "rgb(255, 159, 64)"
            },
            {
                "label": "Kumulatif",
                "data": cumulativeDeath,
                "type": "line",
                "fill": true,
                pointRadius: 2,
                yAxisID: 'right-axis',
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
                    type:'linear',
                    id:'left-axis',
                    display: true,
                    position: 'left',
                    scaleLabel: {display: true, labelString: "Kasus Baru"}
                },
                {
                    type:'linear',
                    id:'right-axis',
                    display: true,
                    position: 'right',
                    stacked:false,
                    scaleLabel: {display: true, labelString: "Kumulatif"},
                    gridLines: {drawOnChartArea:false}
                }],
                xAxes: [{display: true, stacked:true, scaleLabel: {display: false, labelString: 'time'}}],
            },
            maintainAspectRatio:false,
            responsive: true,
            tooltips: {mode: 'index', intersect: false},
            hover: {mode: 'nearest', intersect: true},
            legend: {position:'bottom', usePointStyle:true},
        }
    });
</script>
@overwrite
