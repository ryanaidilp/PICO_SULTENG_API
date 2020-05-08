@extends('layouts.card_odp_pdp')
@section('card_title')
Pasien Dalam Pengawasan
<br>
(PDP)
@overwrite
@section('active_label')
PDP Aktif
@overwrite
@section('active_count')
{{ $count_data['active_pdp'] }}
@overwrite
@section('active_percentage')
{{ $count_data['active_pdp_percentage'] }}
@overwrite
@section('finished_label')
Selesai PDP
@overwrite
@section('finished_count')
{{ $count_data['finished_pdp'] }}
@overwrite
@section('finished_percentage')
{{ $count_data['finished_pdp_percentage'] }}
@overwrite
@section('total_case')
{{ $count_data['sum_pdp'] }}
@overwrite
