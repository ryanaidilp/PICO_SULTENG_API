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
        districtSeries.colorScale(anychart.scales.ordinalColor([
            {less:1, color:'#DEEDCF'},
            {from:1, to:10, color:'#FFA4E1'},
            {from:10, to:20, color:'#FF72D2'},
            {from:20, to:30, color:'#E33594'},
            {from:30, to:40, color:'#C72D70'},
            {from:40, to:50, color:'#AB2550'},
            {greater:50, color:'#8F1E34'}]));
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
        districtSeries.hovered().fill("rgb(160, 50, 123)")
        districtSeries.selected().fill("rgb(160, 50, 123)")
        labels = districtSeries.labels()
        labels.fontSize("10px")
        labels.offsetY(-30)

        var districtZoom = anychart.ui.zoom()
        districtZoom.target(districtMap)
        districtZoom.render()
        districtMap.container("map_kabupaten_case")
        districtMap.draw(true)
    })
</script>
