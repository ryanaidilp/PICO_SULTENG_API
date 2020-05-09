@section('body.script')
@parent
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
<script>
    var options = {
        mixColor: '#fff', // default: '#fff'
        backgroundColor: 'linear-gradient(110deg, #9db0b9 0%, #1695df 100%)',  // default: '#fff'
        label: '🌓'
    }
  const darkmode = new Darkmode(options)
  darkmode.showWidget()
</script>
<script>
    $(document).ready(function() {
        let tableOptions = {
                language: {
                    "url" : "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                },
                responsive: true,
                dom: 'Bfrtip',
                buttons: ['pageLength', 'csv', 'excel', 'pdf']
        }
        var table = $('#table_district').DataTable( tableOptions )
            .columns.adjust()
            .responsive.recalc();

        var tableHospital = $('#table_hospital').DataTable(tableOptions)
        .columns.adjust()
        .responsive.recalc();

        var tablePosts = $('#table_posts').DataTable(tableOptions)
        .columns.adjust()
        .responsive.recalc();

        var tableProvince = $('#table_province').DataTable(tableOptions)
        .columns.adjust()
        .responsive.recalc();
    } );

</script>

@endsection
