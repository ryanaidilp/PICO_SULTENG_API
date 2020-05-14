@extends('layouts.data_table')
@section('table_title')
Rumah Sakit Rujukan COVID-19 Sulawesi Tengah
@overwrite
@section('table_content')
<table id="table_hospital" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
        <tr>
            <th data-priority="1" class="w-1/5 text-left text-blue-900">Nama</th>
            <th data-priority="2" class="w-1/5 text-left text-blue-900">Alamat</th>
            <th data-priority="3" class="w-1/5 text-left text-blue-900">Telepon</th>
            <th data-priority="4" class="w-1/5 text-left text-blue-900">Email</th>
            <th data-priority="5" class="w-1/5 text-left text-blue-900">Peta</th>
        </tr>
    </thead>
</table>
@overwrite
