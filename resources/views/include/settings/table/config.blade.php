@section('body.script')
@parent
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
<script>
    var options = {
        mixColor: '#fff', // default: '#fff'
        backgroundColor: 'linear-gradient(110deg, #9db0b9 0%, #1695df 100%)', // default: '#fff'
        label: '🌓'
    }
    const darkmode = new Darkmode(options)
    darkmode.showWidget()

</script>
<script>
    $(document).ready(function() {
        let tableOptions = {
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            }
            , responsive: true
            , dom: 'Bfrtip'
            , buttons: ['pageLength', 'csv', 'excel', 'pdf']
            , order: [
                [1, "desc"]
            ]
        }
        var tableDistrict = $('#table_district').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }
                , responsive: true
                , dom: 'Bfrtip'
                , buttons: ['pageLength', 'csv', 'excel', 'pdf']
                , order: [
                    [1, "desc"]
                ]
                , deferedRender: true
                , ajax: "{{ route('district.index') }}"
                , columns: [{
                        'data': 'kabupaten'
                    }
                    , {
                        'data': 'positif'
                    }
                    , {
                        'data': 'negatif'
                    }
                    , {
                        'data': 'sembuh'
                    }
                    , {
                        'data': 'meninggal'
                    }
                    , {
                        'data': 'ODP'
                    }
                    , {
                        'data': 'selesai_pemantauan'
                    }
                    , {
                        'data': 'dalam_pemantauan'
                    }
                    , {
                        'data': 'PDP'
                    }
                    , {
                        'data': 'selesai_pengawasan'
                    }
                    , {
                        'data': 'dalam_pengawasan'
                    }
                , ]
            })
            .columns.adjust()
            .responsive.recalc();

        var tableHospital = $('#table_hospital').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }
                , responsive: true
                , dom: 'Bfrtip'
                , buttons: ['pageLength', 'csv', 'excel', 'pdf']
                , order: [
                    [1, "desc"]
                ]
                , deferedRender: true
                , ajax: "{{ route('hospital.index') }}"
                , columns: [{
                        'data': 'nama'
                    }
                    , {
                        'data': 'alamat'
                    }
                    , {
                        'data': 'telepon'
                        , render: function(data, type, row) {
                            return '<a class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded"' +
                                'href="tel:' + data + '">' +
                                data +
                                '</a>'
                        }
                    }
                    , {
                        'data': 'email'
                        , render: function(data, type, row) {
                            return '<a href="mailto:' + data + '"' +
                                'class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded">' +
                                'Kirim Email' +
                                '</a>'
                        }
                    }
                    , {
                        'data': null
                        , render: function(data, type, row) {
                            return '<a class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded"' +
                                'href="https://maps.google.com/maps?q=' + row.latitude + ',' + row.longitude + '">' +
                                'Lihat di Peta' +
                                '</a>'
                        }
                    }

                ]
            })
            .columns.adjust()
            .responsive.recalc();

        var tablePosts = $('#table_posts').DataTable(tableOptions)
            .columns.adjust()
            .responsive.recalc();

        var tableProvince = $('#table_province').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }
                , responsive: true
                , dom: 'Bfrtip'
                , buttons: ['pageLength', 'csv', 'excel', 'pdf']
                , order: [
                    [1, "desc"]
                ]
                , deferedRender: true
                , ajax: "{{ route('province.index') }}"
                , columns: [{
                        'data': 'provinsi'
                    }
                    , {
                        'data': 'positif'
                    }
                    , {
                        'data': 'dalam_perawatan'
                    }
                    , {
                        'data': 'sembuh'
                    }
                    , {
                        'data': 'meninggal'
                    }
                    , {
                        'data': 'rasio_kematian'
                        , render: function(data, type, full) {
                            return data + " %"
                        }
                    }
                , ]
            })
            .columns.adjust()
            .responsive.recalc();
        setInterval(() => {
            tableProvince.ajax.reload()
            tableDistrict.ajax.reload()
        }, 5 * 60 * 1000)
    });

</script>

@endsection
