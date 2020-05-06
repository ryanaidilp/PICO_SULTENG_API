<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        var langUrl = "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json";
        var table = $('#table_district').DataTable( {
                language: {
                    "url" : langUrl
                },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();

        var tableHospital = $('#table_hospital').DataTable({
            language: {
                    "url" : langUrl
            },
            responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
        var tablePosts = $('#table_posts').DataTable({
            language: {
                    "url" : langUrl
            },
            responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
    } );

</script>
