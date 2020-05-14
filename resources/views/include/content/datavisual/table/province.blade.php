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
    <tfoot>
        <tr>
            <td><b>Total</b></td>
            <td><b>{{ $provinces->sum('positif') }}</b></td>
            <td><b>{{ $provinces->sum('positif') - ($provinces->sum('sembuh') + $provinces->sum('meninggal')) }}</b></td>
            <td><b>{{ $provinces->sum('sembuh') }}</b></td>
            <td><b>{{ $provinces->sum('meninggal') }}</b></td>
            <td><b>{{ round($provinces->sum('meninggal')/$provinces->sum('positif') * 100,2) }} %</b></td>
        </tr>
    </tfoot>
    <caption class="text-xs text-grey-200"><i>*) Data yang belum diketahui Provinsinya akan ditambahkan pada "Indonesia"</i></caption>

</table>
@overwrite
