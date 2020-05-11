@extends('layouts.data_table')
@section('table_title')
Provinsi
@overwrite
@section('table_content')
<table id="table_province" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
        <tr>
            <th data-priority="1" class="w-1/6 text-left text-blue-900">Nama</th>
            <th data-priority="2" class="w-1/6 text-left text-blue-900">Positif</th>
            <th data-priority="3" class="w-1/6 text-left text-blue-900">Dirawat</th>
            <th data-priority="4" class="w-1/6 text-left text-blue-900">Sembuh</th>
            <th data-priority="5" class="w-1/6 text-left text-blue-900">Meninggal</th>
            <th data-priority="6" class="w-1/6 text-left text-blue-900">Rasio Kematian</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($provinces as $prov)
        <tr>
            <td class="w-1/6">{{ $prov->provinsi }}</td>
            <td class="w-1/6">{{ $prov->positif }}</td>
            <td class="w-1/6">{{ $prov->positif - ($prov->sembuh + $prov->meninggal) }}</td>
            <td class="w-1/6">{{ $prov->sembuh }}</td>
            <td class="w-1/6">{{ $prov->meninggal }}</td>
            <td class="w-1/6">{{ round(($prov->meninggal/$prov->positif) * 100, 2) }} %</td>
        </tr>
        @endforeach
        <tr>
            <td class="w-1/6"><b>Total</b></td>
            <td class="w-1/6"><b>{{ $provinces->sum('positif') }}</b></td>
            <td class="w-1/6"><b>{{ $provinces->sum('positif') - ($provinces->sum('sembuh') + $provinces->sum('meninggal')) }}</b></td>
            <td class="w-1/6"><b>{{ $provinces->sum('sembuh') }}</b></td>
            <td class="w-1/6"><b>{{ $provinces->sum('meninggal') }}</b></td>
            <td class="w-1/6"><b>{{ round($provinces->sum('meninggal')/$provinces->sum('positif') * 100,2) }} %</b></td>
        </tr>
    </tbody>

</table>
@overwrite
