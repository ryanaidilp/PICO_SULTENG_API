@extends('layouts.card_odp_pdp')
@section('card_title')
Orang Dalam Pemantauan
<br>
(ODP)
@overwrite
@section('active_label')
ODP Aktif
@overwrite
@section('active_count')
{{ $count_data['active_odp'] }}
@overwrite
@section('active_percentage')
{{ $count_data['active_odp_percentage'] }}
@overwrite
@section('finished_label')
Selesai ODP
@overwrite
@section('finished_count')
{{ $count_data['finished_odp'] }}
@overwrite
@section('finished_percentage')
{{ $count_data['finished_odp_percentage'] }}
@overwrite
@section('total_case')
{{ $count_data['sum_odp'] }}
@overwrite
