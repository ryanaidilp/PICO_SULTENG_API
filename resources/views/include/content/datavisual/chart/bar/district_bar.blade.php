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
    var barChartDistrict = new Chart(document.getElementById("positive_chart_district"), {
        "type": "horizontalBar",
        "data": {
            "labels":[],
            "datasets": [{
                "data": [],
                "label": "Positif",
                "borderColor": "rgba(255, 99, 132, 0.2)",
                "backgroundColor": "rgb(255, 99, 132)"
            },{
                "data": [],
                "label": "Sembuh",
                "borderColor": "rgba(75, 192, 192, 0.2)",
                "backgroundColor": "rgb(75, 192, 192)"
            },
            {
                "data": [],
                "label": "Meninggal",
                "borderColor": "rgba(255, 159, 64, 0.2)",
                "backgroundColor": "rgb(255, 159, 64)"
            },
            {
                "data": [],
                "label": "ODP Aktif",
                "borderColor": "rgba(54, 162, 235, 0.2)",
                "backgroundColor": "rgb(54, 162, 235)"
            },
            {
                "data": [],
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
    var updateBarChartDistrict = function() {
        $.ajax({
            type: "GET",
            url: "{{ route('district.index') }}",
            dataType: "json",
            success: function (response) {
                districtList = []
                districtPositive =[]
                districtRecovered =[]
                districtDeath =[]
                districtODP =[]
                districtPDP =[]
                for (let i = 0; i < response.data.length; i++) {
                    districtList.push(response.data[i].kabupaten)
                    districtPositive.push(response.data[i].positif)
                    districtRecovered.push(response.data[i].sembuh)
                    districtDeath.push(response.data[i].meninggal)
                    districtODP.push(response.data[i].dalam_pemantauan)
                    districtPDP.push(response.data[i].dalam_pengawasan)
                }
                barChartDistrict.data.labels = districtList
                barChartDistrict.data.datasets[0].data = districtPositive
                barChartDistrict.data.datasets[1].data = districtRecovered
                barChartDistrict.data.datasets[2].data = districtDeath
                barChartDistrict.data.datasets[3].data = districtODP
                barChartDistrict.data.datasets[4].data = districtPDP
                barChartDistrict.update()
            }
        });
    }
    updateBarChartDistrict()
    setInterval((() => {
        updateBarChartDistrict()
    }),  5 * 60 * 1000)
</script>
@overwrite

