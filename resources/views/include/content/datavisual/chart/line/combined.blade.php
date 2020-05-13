@extends('layouts.chart')
@section('chart_width')
1/2
@overwrite
@section('chart_title')
Trend Kasus COVID-19 Sulawesi Tengah
@overwrite
@section('chart_content')
<canvas id="combine_chart" class="chartjs" width="undefined" height="200"></canvas>
<script>
    var chartCombined = new Chart(document.getElementById("combine_chart"), {
                "type": "bar",
                "data": {
                    "labels": [],
                    "datasets": [
                    {
                        "label": "Positif",
                        "data": [],
                        "type": "line",
                        "fill": false,
                        "backgroundColor" :"rgba(255, 99, 132, 0.2)",
                        "borderColor": "rgba(255, 99, 132, 0.6)"
                    },{
                        "label": "Sembuh",
                        "data": [],
                        "type": "line",
                        "fill": false,
                        "backgroundColor": "rgba(75, 192, 192, 0.2)",
                        "borderColor": "rgba(75, 192, 192, 0.6)"
                    },
                    {
                        "label": "Meninggal",
                        "data": [],
                        "type": "line",
                        "fill": false,
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
                        }],
                        xAxes: [{display: true, stacked:true, scaleLabel: {display: false, labelString: 'time'}}],
                    },
                    maintainAspectRatio:true,
                    responsive: true,
                    tooltips: {mode: 'index', intersect: false},
                    hover: {mode: 'nearest', intersect: true},
                    legend: {position:'bottom', usePointStyle:true},
                }
            });
</script>
@overwrite
