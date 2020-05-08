@section('body.script')
@parent
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
    } );

</script>

@endsection
