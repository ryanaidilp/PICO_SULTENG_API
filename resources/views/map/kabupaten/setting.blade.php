<script>
    anychart.onDocumentReady(function() {
        var districtData = [
        @foreach($districts as $district)
            {"id":"{{ $district->kabupaten }}", "value":{{ $district->positif }}, "sembuh" : {{ $district->sembuh }}, "meninggal": {{ $district->meninggal }},
            "ODP" : {{ $district->dalam_pemantauan }}, "PDP" : {{ $district->dalam_pengawasan }}},
        @endforeach
        ]
        var districtMap = anychart.map()
        var districtTitle = districtMap.title()
        districtTitle.enabled(true)
        districtTitle.text("Heat Map kasus Positif COVID-19 di Sulawesi Tengah")
        var strMap = "{{ $geojson }}"
        //Cleaning my JSON
        strMap = strMap.split("&quot;").join("\"")
        strMap = strMap.split("name").join("id")
        strMap = strMap.split("Palu").join("Kota Palu")
        strMap = strMap.replace(/[\u0000-\u0019]+/g,"");
        var geojson = JSON.parse(strMap)
        districtMap.geoData(geojson);
        var districtSeries = districtMap.choropleth(districtData)
        districtSeries.colorScale(anychart.scales.ordinalColor([{less:10,color:'rgba(255, 99, 132, 0.4)'},{from:10, to:50, color:'rgb(250, 90, 132)'},{greater:50, color:'rgb(160, 50, 123)'}]));
        districtMap.colorRange(true)
        districtMap.colorRange().length(1000)
        districtSeries.tooltip().titleFormat("{%name}")
        districtSeries.tooltip().separator(false)
        districtSeries.tooltip().format(function(e) {
            return 'Positif: ' + e.getData("value") + "\n"
            + 'Sembuh: ' + e.getData('sembuh') + '\n'
            + 'Meninggal: ' + e.getData('meninggal') + "\n"
            + 'ODP Aktif: ' + e.getData('ODP') + "\n"
            + 'PDP Aktif: ' + e.getData('PDP')
        })
        districtSeries.labels(true)
        districtSeries.hovered().fill("rgba(255, 99, 132, 0.2)")
        districtSeries.selected().fill("rgba(255, 99, 132, 0.2)")
        labels = districtSeries.labels()
        labels.fontSize("10px")
        labels.offsetY(-30)

        districtMap.container("map_kabupaten_case")
        districtMap.draw(true)
        var districtZoom = anychart.ui.zoom()
        districtZoom.target(districtMap)
        districtZoom.render()
    })
</script>
