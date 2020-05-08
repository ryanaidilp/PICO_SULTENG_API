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
@overwrite
