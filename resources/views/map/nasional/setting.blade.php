<script>
    anychart.onDocumentReady(function() {
        var data = [
        @foreach($provinces as $prov)
        {"id":"{{ $prov->map_id }}", "value":{{ $prov->positif }}, "sembuh" : {{ $prov->sembuh }}, "meninggal": {{ $prov->meninggal }}},
        @endforeach
        ]
        var map = anychart.map()
        map.geoData(anychart.maps.indonesia)
        var series = map.choropleth(data)
        series.colorScale(anychart.scales.ordinalColor([{less:500,color:'rgba(255, 99, 132, 0.4)'},{from:500, to:1000, color:'rgb(250, 90, 132)'},{greater:1000, color:'rgb(160, 50, 123)'}]));
        map.colorRange(true)
        map.colorRange().length(10000)
        series.tooltip().format(function(e) {
            return 'Positif: ' + e.getData("value") + "\n"
            + 'Sembuh: ' + e.getData('sembuh') + '\n'
            + 'Meninggal: ' + e.getData('meninggal')
        })
        series.labels(true)
        series.hovered().fill("rgba(255, 99, 132, 0.2)")
        series.selected().fill("rgba(255, 99, 132, 0.2)")
        labels = series.labels()
        labels.fontSize("10px")
        labels.offsetY(-30)

        map.container("map_nasional_case")
        var clicked = true;
        map.draw()
        // var geojson = JSON.parse(document.getElementById("geojson").value);
        // map.geoData(geojson);
    })
</script>