@extends('layouts.chart')
@section('chart_width')
1/3
@overwrite
@section('chart_title')
Positif
@overwrite
@section('chart_content')
<canvas id="positive_cart_province" class="chartjs" width="undefined" height="250"></canvas>
<script>
    var positiveDay = [];
    var positiveCase = [];
    var cumulativePositive = [];
    @foreach($stats as $stat)
        positiveDay.push("{{ $stat->date }}");
        positiveCase.push({{ $stat->positive }});
        cumulativePositive.push({{ $stat->cumulative_positive }});
    @endforeach
    new Chart(document.getElementById("positive_cart_province"), {
        "type": "bar",
        "data": {
            "labels": positiveDay,
            "datasets": [{
                "label": "Kasus Baru",
                "data": positiveCase,
                yAxisID: 'left-axis',
                "borderColor": "rgba(255, 99, 132, 0.2)",
                "backgroundColor": "rgb(255, 99, 132)",

            },
            {
                "label": "Kumulatif",
                "data": cumulativePositive,
                "type": "line",
                pointRadius: 2,
                "fill": true,
                yAxisID: 'right-axis',
                "backgroundColor" :"rgba(255, 99, 132, 0.2)",
                "borderColor": "rgba(255, 99, 132, 0.6)",
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
                "yAxes": [
                {
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
                xAxes: [{display: true, stacked:true, scaleLabel: {display: false}}],
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
