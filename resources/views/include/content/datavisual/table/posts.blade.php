@extends('layouts.data_table')
@section('table_title')
Posko Gugus Tugas COVID-19 Sulawesi Tengah
@overwrite
@section('table_content')
<table id="table_posts" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
@overwrite
