@extends('layouts.data_table')
@section('table_title')
Kabupaten
@overwrite
@section('table_content')
<table id="table_district" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
    <thead>
        <tr>
            <th data-priority="1" class="text-left text-blue-900 w-1/11">Nama</th>
            <th data-priority="2" class="text-left text-blue-900 w-1/11">Positif</th>
            <th data-priority="4" class="text-left text-blue-900 w-1/11">Sembuh</th>
            <th data-priority="5" class="text-left text-blue-900 w-1/11">Meninggal</th>
            <th data-priority="6" class="text-left text-blue-900 w-1/11">ODP</th>
            <th data-priority="7" class="text-left text-blue-900 w-1/11">Selesai ODP</th>
            <th data-priority="8" class="text-left text-blue-900 w-1/11"> ODP Aktif</th>
            <th data-priority="9" class="text-left text-blue-900 w-1/11">PDP</th>
            <th data-priority="10" class="text-left text-blue-900 w-1/11">Selesai PDP</th>
            <th data-priority="11" class="text-left text-blue-900 w-1/11">PDP Aktif</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <td class="w-1/11"><b>Total</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.positive')] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.recovered')] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.death')] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.ODP')] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.finished_param', ['case' => __('general.ODP')])] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.active_param', ['case' => __('general.PDP')])] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.PDP')] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.finished_param', ['case' => __('general.PDP')])] }}</b></td>
            <td class="w-1/11"><b>{{ $province[__('general.active_param', ['case' => __('general.PDP')])] }}</b></td>
        </tr>
    </tfoot>
</table>
@overwrite
