@extends('layouts.chart')
@section('chart_width')
full
@overwrite
@section('chart_title')
Kasus COVID-19 berdasarkan Kabupaten
@overwrite
@section('chart_content')
<canvas id="positive_chart_district" class="chartjs" width="undefined" height="200"></canvas>
<script>
    new Chart(document.getElementById("positive_chart_district"), {
        "type": "horizontalBar",
        "data": {
            "labels":[@foreach($districts as $district) "{{ $district->kabupaten }}" , @endforeach],
            "datasets": [{
                "data": [@foreach($districts as $district) "{{ $district->positif }}" ,  @endforeach],
                "label": "Positif",
                "borderColor": "rgba(255, 99, 132, 0.2)",
                "backgroundColor": "rgb(255, 99, 132)"
            },{
                "data": [@foreach($districts as $district) "{{ $district->sembuh }}" ,  @endforeach],
                "label": "Sembuh",
                "borderColor": "rgba(75, 192, 192, 0.2)",
                "backgroundColor": "rgb(75, 192, 192)"
            },
            {
                "data": [@foreach($districts as $district) "{{ $district->meninggal }}" ,  @endforeach],
                "label": "Meninggal",
                "borderColor": "rgba(255, 159, 64, 0.2)",
                "backgroundColor": "rgb(255, 159, 64)"
            },
            {
                "data": [@foreach($districts as $district) "{{ $district->dalam_pemantauan }}" ,  @endforeach],
                "label": "ODP Aktif",
                "borderColor": "rgba(54, 162, 235, 0.2)",
                "backgroundColor": "rgb(54, 162, 235)"
            },
            {
                "data": [@foreach($districts as $district) "{{ $district->dalam_pengawasan }}" ,  @endforeach],
                "label": "PDP Aktif",
                "borderColor": "rgba(185, 19, 114, 0.2)",
                "backgroundColor": "rgb(185, 19, 114)"
            },
        ]},
        "options": {
            "plugins" :
                {
                    "datalabels" : {
                        "display" : false
                    }
                },
            "scales": {
                "yAxes": [{
                    "stacked": true,
                    "gridLines": {
                        "display":false,
                        "color": "#fff",
                        "zeroLineColor": "#fff",
                        "zeroLineWidth": 0
                    }
                }],
                "xAxes": [{
                    "stacked" : true,
                    "ticks": {
                        "beginAtZero": true
                    },
                    "scaleLabel":{
                        "display":false
                    },
                    "gridLines": {
                    },
                }]
            }
        }
    });
</script>
@overwrite

