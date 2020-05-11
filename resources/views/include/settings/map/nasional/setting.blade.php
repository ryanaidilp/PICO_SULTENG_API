<script>
    var map = anychart.map()
    var createChoropleth = function(name, data, color) {
        map.removeAllSeries()
        var series = map.choropleth(data)
        series.colorScale(anychart.scales.ordinalColor([
            {less:100,color: color[0]},
            {from:100, to:200, color: color[1]},
            {from:200, to:300, color: color[2]},
            {from:300, to:400, color: color[3]},
            {from:400, to:500, color:color[4]},
            {from:500, to:600, color:color[5]},
            {from:600, to:700, color:color[6]},
            {from:700, to:800, color:color[7]},
            {from:800, to:900, color:color[8]},
            {from:900, to:1000, color:color[9]},
            {greater:1000, color:color[10]}
        ]));
        series.tooltip().format(function(e) {
        var underTreatment = e.getData("positif") - (e.getData('sembuh') + e.getData('meninggal'))
        return 'Positif: ' + e.getData("positif") + "\n"
        + 'Dirawat: ' + underTreatment + "\n"
        + 'Sembuh: ' + e.getData('sembuh') + '\n'
        + 'Meninggal: ' + e.getData('meninggal')
        })
        series.tooltip().hideDelay(5000)
        var mapTitle = map.title()
        mapTitle.enabled(true)
        mapTitle.text("Choropleth Map kasus "+name+" COVID-19 di Indonesia")
        series.name(name + "(Choropleth)")
        series.labels(true)
        series.labels().format('{%value}')
        series.labels().fontWeight(600)
        if(darkmode.isActivated()){
            series.labels().fontColor("White")
        } else {
            series.labels().fontColor("Black")
        }
        series.hovered().fill(color[11])
        map.colorRange()
        .enabled(true)
        .length(10000)
        labels = series.labels()
        series.selectionMode('none')
    }
    var createCluster = function(name, data, color) {
        map.colorRange()
        .enabled(false)
        map.removeAllSeries()
        var series = map.bubble(data);
        series.name(name + "(Cluster)")
        series.selectionMode('none')
        series.labels(true)
        series.labels().format('{%value}')
        series.labels().fontWeight(600)
        if(darkmode.isActivated()){
            series.labels().fontColor("White")
        } else {
            series.labels().fontColor("Black")
        }
        series.legendItem()
            .enabled(true)
            .iconType('circle')
            .iconFill(color[5])
            .iconStroke('2 #E1E1E1');
        series.fill(color[5], 0.35);
        series.hovered().fill(color[5], 0.7);
        // chae the stroke and hoverStroke colors of series_1
        series.stroke(color[5]);
        series.tooltip().format(name + " : {%value}")
        series.tooltip().hideDelay(5000)
        series.hovered().stroke(color[5]);
        var mapTitle = map.title()
        mapTitle.enabled(true)
        mapTitle.text("Bubble Map kasus "+name+" COVID-19 di Indonesia")
    }
    var data = [
        @foreach($provinces as $prov)
            {"id":"{{ $prov->map_id }}", "positif":{{ $prov->positif }}, "sembuh" : {{ $prov->sembuh }}, "meninggal": {{ $prov->meninggal }}},
        @endforeach
    ]
    var file = "Data COVID-19 Nasional : {{ $count_data['last_update'] }}"
    map.exports().filename(file)
    var positiveDataset = anychart.data.set(data).mapAs({value: 'positif', size: 'positif'})
    var positiveColor = ['#F9CACD','#F4A8AC','#EE868B','#E76569','#DF4346','#D12E2A','#BB000E','#A90019','#960022','#820029' ,'#6E002C', "#CD0000"]
    var recoveredDataset = anychart.data.set(data).mapAs({value: 'sembuh', size: 'sembuh'})
    var recoveredColor = ['#DEEDCF','#BFE1B0','#99D492','#74C67A','#56B870','#39A96B','#198C75','#188977','#137177','#0E4D64' ,'#0A2F51','#1D9A6C']
    var deathDataset = anychart.data.set(data).mapAs({value: 'meninggal', size: 'meninggal'})
    var deathColor = ['#FFF3BA','#FFEB9B','#FFE07C','#FFD45D','#FFC63E','#FFB61F','#F89C07','#F0930F','#E98C16','#E1851E' ,'#DA7F25','#FFA500']
    map.maxBubbleSize(35)
    map.minBubbleSize(9)
    anychart.onDocumentReady(function() {
        if(darkmode.isActivated()){
            anychart.theme('darkEarth')
        } else {
            anychart.theme(null)
        }
            $.ajax({
                type: "GET",
                // Specify link to an SVG file.
                url: "https://raw.githubusercontent.com/RyanAidilPratama/wilayah-indonesia/master/data/geojson/combined/indonesia.geojson",
                success: function (response) {
                    var geojson = JSON.parse(response)

                    map.geoData(geojson)
                    var zoomController = anychart.ui.zoom()
                    zoomController.target(map)
                    zoomController.render()
                    map.container("map_nasional_case")
                    map.draw(true)
                }
            });

    })
    function positiveChoropleth() {
        createChoropleth('Positif', positiveDataset,  positiveColor)
    }
    function recoveredChoropleth() {
        createChoropleth('Sembuh', recoveredDataset,  recoveredColor)
    }
    function deathChoropleth() {
        createChoropleth('Meninggal', deathDataset,  deathColor)
    }
    function positiveBubble() {
        createCluster('Positif', positiveDataset,  positiveColor)
    }
    function recoveredBubble() {
        createCluster('Sembuh', recoveredDataset,  recoveredColor)
    }
    function deathBubble() {
        createCluster('Meninggal', deathDataset,  deathColor)
    }
    function checkMap(btn_id) {
        var radValue = $("input[name='data_covid']:checked").val()
        if(btn_id == "btn-choropleth"){
            if(radValue == "Positif"){
                positiveChoropleth()
            } else if(radValue == "Sembuh"){
                recoveredChoropleth()
            } else if(radValue == "Meninggal"){
                deathChoropleth()
            } else {
                alert("Pilih data terlebih dahulu!")
            }
        } else if( btn_id == "btn-bubble"){
            if(radValue == "Positif"){
                positiveBubble()
            } else if(radValue == "Sembuh"){
                recoveredBubble()
            } else if(radValue == "Meninggal"){
                deathBubble()
            } else {
                alert("Pilih data terlebih dahulu!")
            }
        }
    }

</script>
