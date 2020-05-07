<script>
    $(document).ready(function() {
        var langUrl = "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json";
        var table = $('#table_district').DataTable( {
                language: {
                    "url" : langUrl
                },
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } )
            .columns.adjust()
            .responsive.recalc();

        var tableHospital = $('#table_hospital').DataTable({
            language: {
                    "url" : langUrl
            },
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        })
        .columns.adjust()
        .responsive.recalc();
        var tablePosts = $('#table_posts').DataTable({
            language: {
                    "url" : langUrl
            },
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        })
        .columns.adjust()
        .responsive.recalc();
    } );

</script>
