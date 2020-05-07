<script>
    anychart.onDocumentReady(function() {
        var data = [
        @foreach($provinces as $prov)
        {"id":"{{ $prov->map_id }}", "value":{{ $prov->positif }}, "sembuh" : {{ $prov->sembuh }}, "meninggal": {{ $prov->meninggal }}},
        @endforeach
        ]
        var map = anychart.map()
        map.geoData(anychart.maps.indonesia)
        var title = map.title()
        title.enabled(true)
        title.text("Heat Map kasus Positif COVID-19 di Indonesia")
        var series = map.choropleth(data)
        series.colorScale(anychart.scales.ordinalColor([
            {less:100,color:'#FFC2EA'},
            {from:100, to:200, color:'#FFA4E1'},
            {from:200, to:300, color:'#FF8AD9'},
            {from:300, to:400, color:'#FF72D2'},
            {from:400, to:500, color:'#E33594'},
            {from:500, to:600, color:'#D6407E'},
            {from:600, to:700, color:'#C72D70'},
            {from:700, to:800, color:'#AB2550'},
            {from:800, to:900, color:'#8F1E34'},
            {from:900, to:1000, color:'#73171E'},
            {greater:1000, color:'#571411'}]));
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
        var zoomController = anychart.ui.zoom()
        zoomController.target(map)
        zoomController.render()
        map.container("map_nasional_case")
        map.draw(true)
    })
</script>
