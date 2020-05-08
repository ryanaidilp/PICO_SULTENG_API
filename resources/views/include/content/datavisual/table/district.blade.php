@extends('layouts.data_table')
@section('table_title')
Kabupaten
@overwrite
@section('table_content')
<table id="table_district" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
        <tr>
            <th data-priority="1" class="w-1/11 text-left text-blue-900">Nama</th>
            <th data-priority="2" class="w-1/11 text-left text-blue-900">Positif</th>
            <th data-priority="3" class="w-1/11 text-left text-blue-900">Negatif</th>
            <th data-priority="4" class="w-1/11 text-left text-blue-900">Sembuh</th>
            <th data-priority="5" class="w-1/11 text-left text-blue-900">Meninggal</th>
            <th data-priority="6" class="w-1/11 text-left text-blue-900">ODP</th>
            <th data-priority="7" class="w-1/11 text-left text-blue-900">Selesai ODP</th>
            <th data-priority="8" class="w-1/11 text-left text-blue-900"> ODP Aktif</th>
            <th data-priority="9" class="w-1/11 text-left text-blue-900">PDP</th>
            <th data-priority="10" class="w-1/11 text-left text-blue-900">Selesai PDP</th>
            <th data-priority="11" class="w-1/11 text-left text-blue-900">PDP Aktif</th>
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
@overwrite
