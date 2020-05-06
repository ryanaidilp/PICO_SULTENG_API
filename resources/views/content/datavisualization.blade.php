<section class="bg-white border-p py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h2 class="w-full my-2 md:text-3xl text-md font-black leading-tight text-center text-gray-800">
            Situasi COVID-19 di Sulawesi Tengah
        </h2>
        <div class="w-full mb-4">
            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="w-full text-xl text-gray-800 px-6 my-4">
            Terakhir diperbarui : <span
                class="font-bold ">{{ $count_data['last_update'] . " " .$province->updated_at->format('H:m') }}</span>
        </div>

        <div class="rounded-lg w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white overflow-hidden">
                <div class="bg-red-100 border-b-4 border-red-600 rounded-lg shadow-lg p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-center">
                            <h5 class="font-bold uppercase text-gray-600">Positif</h5>
                            <div class="flex flex-column items-center">
                                <p class="font-bold text-xs w-1/3">Sulawesi Tengah</p>
                                <h3 class="font-bold text-3xl w-1/3">{{ $province->positif }}</h3>
                                <p class="rounded font-bold text-white bg-red-400 text-small w-1/5">
                                    +{{ $stats[sizeof($stats) - 1]->positive }}</p>
                            </div>
                            <div class="flex flex-column items-left">
                                <p class="font-bold text-xs w-1/3">Indonesia</p>
                                <p class="font-bold text-xs w-1/3">{{ $count_data['ina_positive'] }}</p>
                                <p class="rounded font-bold text-red-100 text-small w-1/3">
                                    +{{ $stats[sizeof($stats) - 1]->positive }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white overflow-hidden">
                <div class="bg-green-100 border-b-4 border-green-600 rounded-lg shadow-lg p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-center">
                            <h5 class="font-bold uppercase text-gray-600">Sembuh</h5>
                            <div class="flex flex-column items-center">
                                <p class="font-bold text-xs w-1/3">Sulawesi Tengah</p>
                                <h3 class="font-bold text-3xl w-1/3">{{ $province->sembuh }}</h3>
                                <p class="rounded font-bold text-white bg-green-400 text-small w-1/5">
                                    +{{ $stats[sizeof($stats) - 1]->recovered }}</p>
                            </div>
                            <div class="flex flex-column items-left">
                                <p class="font-bold text-xs w-1/3">Indonesia</p>
                                <p class="font-bold text-xs w-1/3">{{ $count_data['ina_recovered'] }}</p>
                                <p class="rounded font-bold text-red-100 text-small w-1/3">
                                    +{{ $stats[sizeof($stats) - 1]->recovered }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white overflow-hidden">
                <div class="bg-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-lg p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-1 text-center">
                            <h5 class="font-bold uppercase text-gray-600">Meninggal</h5>
                            <div class="flex flex-column items-center">
                                <p class="font-bold text-xs w-1/3">Sulawesi Tengah</p>
                                <h3 class="font-bold text-3xl w-1/3">{{ $province->meninggal }}</h3>
                                <p class="rounded font-bold text-white bg-yellow-400 text-small w-1/5">
                                    +{{ $stats[sizeof($stats) - 1]->death }}</p>
                            </div>
                            <div class="flex flex-column items-left">
                                <p class="font-bold text-xs w-1/3">Indonesia</p>
                                <p class="font-bold text-xs w-1/3">{{ $count_data['ina_death'] }}</p>
                                <p class="rounded font-bold text-red-100 text-small w-1/3">
                                    +{{ $stats[sizeof($stats) - 1]->death }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrinks">
            <div class="flex-1 bg-white overflow-hidden">
                <div class="bg-white rounded-lg p-5">
                    <div class="flex flex-row items-center rounded-lg shadow-lg">
                        <div class="flex-1 text-center">
                            <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                                <h5 class="font-bold uppercase text-gray-600">
                                    Orang Dalam Pemantauan
                                    <br>
                                    (ODP)
                                </h5>
                            </div>
                            <div class="flex flex-column items-center mt-4">
                                <div class="w-1/2">
                                    <p>ODP Aktif</p>
                                    <h3 class="font-bold text-3xl">{{ $count_data['active_odp'] }}</h3>
                                    <p class="text-xs text-gray-600">({{ $count_data['active_odp_percentage'] }}
                                        %)</p>
                                </div>
                                <div class="w-1/2">
                                    <p>Selesai ODP</p>
                                    <h3 class="font-bold text-3xl">{{ $count_data['finished_odp'] }}</h3>
                                    <p class="text-xs text-gray-600">
                                        ({{ $count_data['finished_odp_percentage'] }} %)</p>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <p>Total</p>
                                <h3 class="font-bold text-3xl">{{ $count_data['sum_odp'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-lg w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white overflow-hidden">
                <div class="bg-white rounded-lg p-5">
                    <div class="flex flex-row items-center rounded-lg shadow-lg">
                        <div class="flex-1 text-center">
                            <div class="bg-gray-400 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                                <h5 class="font-bold uppercase text-gray-600">
                                    Pasien Dalam Pengawasan
                                    <br>
                                    (PDP)
                                </h5>
                            </div>
                            <div class="flex flex-column items-center mt-4">
                                <div class="w-1/2">
                                    <p>PDP Aktif</p>
                                    <h3 class="font-bold text-3xl">{{ $count_data['active_pdp'] }}</h3>
                                    <p class="text-xs text-gray-600">({{ $count_data['active_pdp_percentage'] }}
                                        %)</p>
                                </div>
                                <div class="w-1/2">
                                    <p>Selesai PDP</p>
                                    <h3 class="font-bold text-3xl">{{ $count_data['finished_pdp'] }}</h3>
                                    <p class="text-xs text-gray-600">
                                        ({{ $count_data['finished_pdp_percentage'] }}
                                        %)</p>
                                </div>
                            </div>
                            <div class="text-center mb-4">
                                <p>Total</p>
                                <h3 class="font-bold text-3xl">{{ $count_data['sum_pdp'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full md:w-1/3 p-3">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Positif</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        var positiveDay = [];
                                var positiveCase = [];
                                var cumulativePositive = [];
                                var underTreatmentPercentage = [];
                                var deathPercentage = [];
                                var recoveredPercentage = [];
                                @foreach($stats as $stat)
                                  positiveDay.push("{{ $stat->date }}");
                                  positiveCase.push("{{ $stat->positive }}");
                                  cumulativePositive.push("{{ $stat->cumulative_positive }}");
                                  underTreatmentPercentage.push("{{ $stat->under_treatment_percentage }}")
                                  deathPercentage.push("{{ $stat->death_percentage }}");
                                  recoveredPercentage.push("{{ $stat->recovered_percentage }}")
                                @endforeach
                                new Chart(document.getElementById("chartjs-7"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": positiveDay,
                                        "datasets": [{
                                            "label": "Kasus Positif",
                                            "data": positiveCase,
                                            "borderColor": "rgba(255, 99, 132, 0.2)",
                                            "backgroundColor": "rgb(255, 99, 132)"
                                        },
                                        {
                                            "label": "Kumulatif",
                                            "data": cumulativePositive,
                                            "type": "line",
                                            "fill": true,
                                            "backgroundColor" :"rgba(255, 99, 132, 0.2)",
                                            "borderColor": "rgba(255, 99, 132, 0.6)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full md:w-1/3 p-3">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Sembuh</h5>
                </div>
                <div class="p-5">
                    <canvas id="recovered_chart" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        var recoveredDay = [];
                                var recoveredCase = [];
                                var cumulativeRecovered = [];
                                @foreach($stats as $stat)
                                  recoveredDay.push("{{ $stat->date }}");
                                  recoveredCase.push("{{ $stat->recovered }}");
                                  cumulativeRecovered.push("{{ $stat->cumulative_recovered }}")
                                @endforeach
                                new Chart(document.getElementById("recovered_chart"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": recoveredDay,
                                        "datasets": [{
                                            "label": "Kasus Sembuh",
                                            "data": recoveredCase,
                                            "borderColor": "rgba(75, 192, 192, 0.2)",
                                            "backgroundColor": "rgb(75, 192, 192)"
                                        },
                                        {
                                            "label": "Kumulatif",
                                            "data": cumulativeRecovered,
                                            "type": "line",
                                            "fill": true,
                                            "backgroundColor": "rgba(75, 192, 192, 0.2)",
                                            "borderColor": "rgba(75, 192, 192, 0.6)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full md:w-1/3 p-3">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Meninggal</h5>
                </div>
                <div class="p-5">
                    <canvas id="death_chart" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        var deathDay = [];
                                var deathCase = [];
                                var cumulativeDeath = [];
                                @foreach($stats as $stat)
                                  deathDay.push("{{ $stat->date }}");
                                  deathCase.push("{{ $stat->death }}");
                                  cumulativeDeath.push("{{ $stat->cumulative_death }}")
                                @endforeach
                                new Chart(document.getElementById("death_chart"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": deathDay,
                                        "datasets": [{
                                            "label": "Kasus Meninggal",
                                            "data": deathCase,
                                            "borderColor": "rgba(255, 159, 64, 0.2)",
                                            "backgroundColor": "rgb(255, 159, 64)"
                                        },
                                        {
                                            "label": "Kumulatif",
                                            "data": cumulativeDeath,
                                            "type": "line",
                                            "fill": true,
                                            "backgroundColor": "rgba(255, 159, 64, 0.2)",
                                            "borderColor": "rgba(255, 159, 64, 0.6)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Trend Kasus COVID-19 Sulawesi Tengah</h5>
                </div>
                <div class="p-5">
                    <canvas id="combine_chart" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("combine_chart"), {
                                    "type": "bar",
                                    "data": {
                                        "labels": deathDay,
                                        "datasets": [
                                        {
                                            "label": "Positif",
                                            "data": cumulativePositive,
                                            "type": "line",
                                            "fill": false,
                                            "backgroundColor" :"rgba(255, 99, 132, 0.2)",
                                            "borderColor": "rgba(255, 99, 132, 0.6)"
                                        },{
                                            "label": "Sembuh",
                                            "data": cumulativeRecovered,
                                            "type": "line",
                                            "fill": false,
                                            "backgroundColor": "rgba(75, 192, 192, 0.2)",
                                            "borderColor": "rgba(75, 192, 192, 0.6)"
                                        },
                                        {
                                            "label": "Meninggal",
                                            "data": cumulativeDeath,
                                            "type": "line",
                                            "fill": false,
                                            "backgroundColor": "rgba(255, 159, 64, 0.2)",
                                            "borderColor": "rgba(255, 159, 64, 0.6)"
                                        }]
                                    },
                                    "options": {
                                        "scales": {
                                            "yAxes": [{
                                                "ticks": {
                                                    "beginAtZero": true
                                                }
                                            }]
                                        }
                                    }
                                });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>

        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase text-gray-600">Perbandingan</h5>
                </div>
                <div class="p-5"><canvas id="pie_chart" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("pie_chart"), {
                                    "type": "doughnut",
                                    "data": {
                                        "labels": ["Sedang Dirawat (%)", "Meninggal (%)", "Sembuh (%)"],
                                        "datasets": [{
                                            "label": "Cases",
                                            "data":
                                                [
                                                    underTreatmentPercentage[underTreatmentPercentage.length - 1],
                                                    deathPercentage[deathPercentage.length - 1],
                                                    recoveredPercentage[recoveredPercentage.length - 1]
                                                ],
                                            "backgroundColor": ["rgb(54, 162, 235)", "rgb(255, 99, 132)", "rgb(75, 192, 192)"]
                                        }]
                                    }
                                });
                    </script>
                </div>
            </div>
        </div>

        @include('map.kabupaten.chart')

        <div class="w-full p-3">
            <!--Table Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase md:text-3xl text-gray-600">Kabupaten</h5>
                </div>
                <div class="p-5">
                    <table id="table_district" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="w-1/11 text-left text-blue-900">Nama</th>
                                <th data-priority="2" class="w-1/11 text-left text-blue-900">Positif</th>
                                <th data-priority="3" class="w-1/11 text-left text-blue-900">Negatif</th>
                                <th data-priority="4" class="w-1/11 text-left text-blue-900">Sembuh</th>
                                <th data-priority="5" class="w-1/11 text-left text-blue-900">Meninggal</th>
                                <th data-priority="6" class="w-1/11 text-left text-blue-900">ODP</th>
                                <th data-priority="7" class="w-1/11 text-left text-blue-900">Selesai ODP</th>
                                <th data-priority="8" class="w-1/11 text-left text-blue-900">Aktif ODP</th>
                                <th data-priority="9" class="w-1/11 text-left text-blue-900">PDP</th>
                                <th data-priority="10" class="w-1/11 text-left text-blue-900">Selesai PDP</th>
                                <th data-priority="11" class="w-1/11 text-left text-blue-900">Aktif PDP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $district)
                            <tr>
                                <td class="w-1/11">{{ $district->kabupaten }}</td>
                                <td class="w-1/11">{{ $district->positif }}</td>
                                <td class="w-1/11">{{ $district->negatif }}</td>
                                <td class="w-1/11">{{ $district->sembuh }}</td>
                                <td class="w-1/11">{{ $district->meninggal }}</td>
                                <td class="w-1/11">{{ $district->ODP }}</td>
                                <td class="w-1/11">{{ $district->selesai_pemantauan }}</td>
                                <td class="w-1/11">{{ $district->dalam_pemantauan }}</td>
                                <td class="w-1/11">{{ $district->PDP }}</td>
                                <td class="w-1/11">{{ $district->selesai_pengawasan }}</td>
                                <td class="w-1/11">{{ $district->dalam_pengawasan }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="w-1/11"><b>Total</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('positif') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('negatif') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('sembuh') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('meninggal') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('ODP') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('selesai_pemantauan') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('dalam_pemantauan') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('PDP') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('selesai_pengawasan') }}</b></td>
                                <td class="w-1/11"><b>{{ $districts->sum('dalam_pengawasan') }}</b></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <!--/table Card-->
        </div>

        <div class="w-full p-3">
            <!--Table Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase md:text-3xl text-gray-600">Rumah Sakit rujukan COVID-19
                        Sulawesi Tengah
                    </h5>
                </div>
                <div class="p-5">
                    <table id="table_hospital" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="w-1/5 text-left text-blue-900">Nama</th>
                                <th data-priority="2" class="w-1/5 text-left text-blue-900">Alamat</th>
                                <th data-priority="3" class="w-1/5 text-left text-blue-900">Telepon</th>
                                <th data-priority="4" class="w-1/5 text-left text-blue-900">Email</th>
                                <th data-priority="5" class="w-1/5 text-left text-blue-900">Peta</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($hospitals as $hospital)
                            <tr>
                                <td class="w-1/5 text-sm">{{ $hospital->nama }}</td>
                                <td class="w-1/5 text-sm">{{ $hospital->alamat }}</td>
                                <td class="w-1/5">
                                    <a class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded"
                                        href="tel:{{ $hospital->telepon }}">
                                        {{ $hospital->telepon }}
                                    </a>
                                </td>
                                <td class="w-1/5 text-sm">
                                    <a href="mailto:{{ $hospital->email }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded">
                                        Kirim Email
                                    </a>
                                </td>
                                <td class="w-1/5 text-sm">
                                    <a class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded"
                                        href="{{ 'https://maps.google.com/maps?q='.$hospital->latitude.','.$hospital->longitude }}">
                                        Lihat di Peta
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/table Card-->
        </div>

        <div class="w-full p-3">
            <!--Table Card-->
            <div class="bg-white border-transparent rounded-lg shadow-lg">
                <div
                    class="bg-gray-300 uppercase text-gray-800 border-b-2 border-gray-500 rounded-tl-lg rounded-tr-lg p-2">
                    <h5 class="font-bold uppercase md:text-3xl text-gray-600">Call Center Gugus Tugas di
                        Kabupaten
                    </h5>
                </div>
                <div class="p-5">
                    <table id="table_posts" class="stripe hover"
                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1" class="w-1/3 text-left text-blue-900">Kabupaten</th>
                                <th data-priority="2" class="w-1/3 text-left text-blue-900">Nama</th>
                                <th data-priority="3" class="w-1/3 text-left text-blue-900">No Handphone</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($districts as $district)
                            @foreach ($district->posts as $posko)
                            <tr>
                                <td class="w-1/3">{{ $district->kabupaten }}</td>
                                <td class="w-1/3">{{ $posko->nama }}</td>
                                <td class="w-1/3">
                                    <ul>
                                        @foreach ($posko->phones as $phone)
                                        <li class="m-2">
                                            <a class="bg-blue-500 hover:bg-blue-700 text-white text-xs py-2 px-4 rounded"
                                                href="tel:{{ $phone->phone }}">
                                                {{ $phone->phone }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/table Card-->
        </div>
        @include('map.nasional.chart')
    </div>
</section>
