<script>
    var districtMap = anychart.map()
    var districtData = [
        @foreach($districts as $district) {
            "id": "{{ $district->kabupaten }}"
            , "positif": {
                {
                    $district - > positif
                }
            }
            , "sembuh": {
                {
                    $district - > sembuh
                }
            }
            , "meninggal": {
                {
                    $district - > meninggal
                }
            }
            , "ODP": {
                {
                    $district - > dalam_pemantauan
                }
            }
            , "PDP": {
                {
                    $district - > dalam_pengawasan
                }
            }
        }
        , @endforeach
    ]
    var fileDistrict = "Data COVID-19 Sulawesi Tengah_{{ $count_data['last_update'] }}"
    districtMap.exports().filename(fileDistrict)
    var createChoroplethLocal = function(name, data, color) {
        districtMap.removeAllSeries()
        var districtSeries = districtMap.choropleth(data)
        districtSeries.labels(true)
        districtSeries.labels().format("{%value}")
        districtSeries.labels().fontWeight(600)
        districtSeries.labels().fontColor("Black")
        districtSeries.colorScale(anychart.scales.ordinalColor([{
                less: 0
                , color: color[0]
            }
            , {
                from: 0
                , to: 10
                , color: color[1]
            }
            , {
                from: 10
                , to: 20
                , color: color[2]
            }
            , {
                from: 20
                , to: 30
                , color: color[3]
            }
            , {
                from: 30
                , to: 40
                , color: color[4]
            }
            , {
                from: 40
                , to: 50
                , color: color[5]
            }
            , {
                greater: 50
                , color: color[6]
            }
        ]));
        districtSeries.tooltip().titleFormat(function(e) {
            return e.getData('id')
        })
        districtSeries.tooltip().hideDelay(5000)
        districtSeries.tooltip().format(function(e) {
            var underTreatment = e.getData("positif") - (e.getData('sembuh') + e.getData('meninggal'))
            return 'Positif: ' + e.getData("positif") + "\n" +
                'Dirawat: ' + underTreatment + "\n" +
                'Sembuh: ' + e.getData('sembuh') + '\n' +
                'Meninggal: ' + e.getData('meninggal') + "\n" +
                'ODP Aktif: ' + e.getData('ODP') + "\n" +
                'PDP Aktif: ' + e.getData('PDP')
        })
        districtSeries.name(name + "(Choropleth)")
        districtSeries.hovered().fill(color[7])
        districtMap.colorRange(true)
        districtMap.colorRange().length(1000)
        districtSeries.selectionMode('none')
        var districtTitle = districtMap.title()
        districtTitle.enabled(true)
        districtTitle.text("Choropleth Map kasus " + name + " COVID-19 di Sulawesi Tengah")

    }
    var createClusterLocal = function(name, data, color) {
        districtMap.colorRange().enabled(false)
        districtMap.removeAllSeries()
        var districtSeries = districtMap.bubble(data)
        districtSeries.name(name + "(Cluster)")
        districtSeries.selectionMode('none')
        districtSeries.labels(true)
        districtSeries.labels().format("{%value}")
        districtSeries.labels().fontWeight(600)
        districtSeries.labels().fontColor("Black")
        districtSeries.fill(color[3], 0.35);
        districtSeries.hovered().fill(color[5], 0.7);
        // chae the stroke and hoverStroke colors of series_1
        districtSeries.stroke(color[3]);
        districtSeries.tooltip().titleFormat(function(e) {
            return e.getData('id')
        })
        districtSeries.tooltip().hideDelay(5000)
        districtSeries.tooltip().format(name + " : {%value}")
        districtSeries.hovered().stroke(color[5]);
        var districtTitle = districtMap.title()
        districtTitle.enabled(true)
        districtTitle.text("Bubble Map kasus " + name + " COVID-19 di Sulawesi Tengah")

    }
    anychart.onDocumentReady(function() {
        $.ajax({
            type: "GET"
            , url: "https://raw.githubusercontent.com/ryanaidilp/PICO_SULTENG_Android/master/app/src/main/assets/map.json"
            , success: function(data) {
                var arrs = data;
                arrs = arrs.split("name").join("id")
                arrs = arrs.split("Palu").join("Kota Palu")
                var geojson = JSON.parse(arrs)
                districtMap.geoData(geojson);
            }
        })
    })
    var districtPositiveDataset = anychart.data.set(districtData).mapAs({
        value: 'positif'
        , size: 'positif'
    })
    var districtPositiveColor = ['#F9CACD', '#F4A8AC', '#EE868B', '#E76569', '#DF4346', '#820029', '#6E002C', "#CD0000"]
    var districtRecoveredDataset = anychart.data.set(districtData).mapAs({
        value: 'sembuh'
        , size: 'sembuh'
    })
    var districtRecoveredColor = ['#DEEDCF', '#BFE1B0', '#99D492', '#74C67A', '#56B870', '#0E4D64', '#0A2F51', '#1D9A6C']
    var districtDeathDataset = anychart.data.set(districtData).mapAs({
        value: 'meninggal'
        , size: 'meninggal'
    })
    var districtDeathColor = ['#FFF3BA', '#FFEB9B', '#FFE07C', '#FFD45D', '#FFC63E', '#E1851E', '#DA7F25', '#FFA500']
    var districtODPDataset = anychart.data.set(districtData).mapAs({
        value: 'ODP'
        , size: 'ODP'
    })
    var districtODPColor = ['#DFE4F8', '#BECCF1', '#9FB5E8', '#80A2DF', '#6190D5', '#174689', '#0E2C63', '#2773BF']
    var districtPDPDataset = anychart.data.set(districtData).mapAs({
        value: 'PDP'
        , size: 'PDP'
    })
    var districtPDPColor = ['#DEADD0', '#D291C3', '#C574B6', '#B757AB', '#A93AA1', '#720060', '#65004C', '#88008B']
    map.maxBubbleSize(35)
    map.minBubbleSize(9)
    var districtZoom = anychart.ui.zoom()
    districtZoom.target(districtMap)
    districtZoom.render()
    districtMap.container("map_kabupaten_case")
    districtMap.draw(true)

    function checkMapDistrict(btn_id) {
        var radValue = $("input[name='data_covid']:checked").val()
        if (btn_id == "btn-choropleth") {
            if (radValue == "Positif") {
                createChoroplethLocal("Positif", districtPositiveDataset, districtPositiveColor)
            } else if (radValue == "Sembuh") {
                createChoroplethLocal("Sembuh", districtRecoveredDataset, districtRecoveredColor)
            } else if (radValue == "Meninggal") {
                createChoroplethLocal("Meninggal", districtDeathDataset, districtDeathColor)
            } else if (radValue == "ODP") {
                createChoroplethLocal("ODP", districtODPDataset, districtODPColor)
            } else if (radValue == "PDP") {
                createChoroplethLocal("PDP", districtPDPDataset, districtPDPColor)
            } else {
                alert("Pilih data terlebih dahulu!")
            }
        } else if (btn_id == "btn-bubble") {
            if (radValue == "Positif") {
                createClusterLocal("Positif", districtPositiveDataset, districtPositiveColor)
            } else if (radValue == "Sembuh") {
                createClusterLocal("Sembuh", districtRecoveredDataset, districtRecoveredColor)
            } else if (radValue == "Meninggal") {
                createClusterLocal("Meninggal", districtDeathDataset, districtDeathColor)
            } else if (radValue == "ODP") {
                createClusterLocal("ODP", districtODPDataset, districtODPColor)
            } else if (radValue == "PDP") {
                createClusterLocal("PDP", districtPDPDataset, districtPDPColor)
            } else {
                alert("Pilih data terlebih dahulu!")
            }
        }
    }

</script>
