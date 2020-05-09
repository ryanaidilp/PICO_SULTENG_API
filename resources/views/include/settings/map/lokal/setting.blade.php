<script>
    anychart.onDocumentReady(function() {
        $.ajax({
            type: "GET",
            url: "https://raw.githubusercontent.com/RyanAidilPratama/PICO_SULTENG_Android/master/app/src/main/assets/map.json",
            success: function (data) {
                var districtData = [
                @foreach($districts as $district)
                    {"id":"{{ $district->kabupaten }}", "value":{{ $district->positif }}, "sembuh" : {{ $district->sembuh }}, "meninggal": {{ $district->meninggal }},
                    "ODP" : {{ $district->dalam_pemantauan }}, "PDP" : {{ $district->dalam_pengawasan }}},
                @endforeach
                ]
                var districtMap = anychart.map()
                var fileDistrict = "Data COVID-19 Sulawesi Tengah_{{ $count_data['last_update'] }}"
                districtMap.exports().filename(fileDistrict)
                var districtSeries = districtMap.choropleth(districtData)
                districtSeries.colorScale(anychart.scales.ordinalColor([
                    {less:0, color:'#F5EFF8'},
                    {from:0, to:10, color:'#FFA4E1'},
                    {from:10, to:20, color:'#FF72D2'},
                    {from:20, to:30, color:'#E33594'},
                    {from:30, to:40, color:'#C72D70'},
                    {from:40, to:50, color:'#AB2550'},
                    {greater:50, color:'#8F1E34'}]));

                districtSeries.tooltip().titleFormat(function(e) {
                    return e.getData('id')
                })
                districtSeries.tooltip().format(function(e) {
                    var underTreatment = e.getData("value") - (e.getData('sembuh') + e.getData('meninggal'))
                    return 'Positif: ' + e.getData("value") + "\n"
                    + 'Dirawat: ' + underTreatment + "\n"
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
                districtMap.colorRange(true)
                districtMap.colorRange().length(1000)
                var districtTitle = districtMap.title()
                districtTitle.enabled(true)
                districtTitle.text("Choropleth Map kasus Positif COVID-19 di Sulawesi Tengah")
                var chart = anychart.map();
                var arrs = data;
                arrs = arrs.split("name").join("id")
                arrs = arrs.split("Palu").join("Kota Palu")
                var geojson = JSON.parse(arrs)
                districtMap.geoData(geojson);
                var districtZoom = anychart.ui.zoom()
                districtZoom.target(districtMap)
                districtZoom.render()
                districtMap.container("map_kabupaten_case")
                districtMap.draw(true)
            }
        })
    })
</script>
