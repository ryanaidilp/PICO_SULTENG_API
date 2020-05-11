@extends('layouts.chart')
@section('chart_width')
1/3
@overwrite
@section('chart_title')
Sembuh
@overwrite
@section('chart_content')
<canvas id="recovered_chart_province" class="chartjs" width="undefined" height="250"></canvas>
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
                yAxisID: 'left-axis',
                "borderColor": "rgba(75, 192, 192, 0.2)",
                "backgroundColor": "rgb(75, 192, 192)"
            },
            {
                "label": "Kumulatif",
                "data": cumulativeRecovered,
                "type": "line",
                pointRadius: 2,
                "fill": true,
                yAxisID: 'right-axis',
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
