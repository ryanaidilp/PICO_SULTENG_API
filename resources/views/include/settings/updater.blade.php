@section('body.script')
@parent
<script>
var updateData = function () {
    $.ajax({
        type: "GET",
        url: "{{ route('stats.index') }}",
        dataType: "json",
        success: function (response) {
            var len = response.data.length
            var pos = response.data[len - 1].cumulative_positive
            var dead = response.data[len - 1].cumulative_death
            var rec = response.data[len - 1].cumulative_recovered
            pos = pos - (dead + rec)
            pieChart.data.datasets[0].data = [pos, dead, rec]
            pieChart.update()

            label = []
            positive = []
            recovered = []
            death = []
            deathCase = [];
            positiveCase = []
            recoveredCase = []
            for(var i = 0; i < response.data.length; i++){
                label.push(response.data[i].date)
                positive.push(response.data[i].cumulative_positive)
                recovered.push(response.data[i].cumulative_recovered)
                death.push(response.data[i].cumulative_death)
                deathCase.push(response.data[i].death)
                positiveCase.push(response.data[i].positive)
                recoveredCase.push(response.data[i].recovered)
            }
            chartCombined.data.labels = label
            chartCombined.data.datasets[0].data = positive
            chartCombined.data.datasets[1].data = recovered
            chartCombined.data.datasets[2].data = death
            chartCombined.update()

            deathChart.data.labels = label
            deathChart.data.datasets[0].data = deathCase
            deathChart.data.datasets[1].data = death
            deathChart.update()


            positiveChart.data.labels = label
            positiveChart.data.datasets[0].data = positiveCase
            positiveChart.data.datasets[1].data = positive
            positiveChart.update()

            recoveredChart.data.labels = label
            recoveredChart.data.datasets[0].data = recoveredCase
            recoveredChart.data.datasets[1].data = recovered
            recoveredChart.update()
        }
    });
 }
 updateData()
 setInterval(() => {
     updateData()
 }, 5 * 60 * 1000)
</script>
@endsection
