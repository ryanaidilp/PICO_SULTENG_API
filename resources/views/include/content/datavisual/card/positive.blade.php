@extends('layouts.card_case')
@section('card_case_title')
Positif
@overwrite
@section('card_case_border_color')
border-red-400
@overwrite
@section('card_case_new_bg_color')
bg-red-400
@overwrite
@section('card_case_bg_color')
bg-red-200
@overwrite
@section('local_case')
{{ $stats[sizeof($stats) - 1]->cumulative_positive }}
@overwrite
@section('local_new_case')
{{ $stats[sizeof($stats) - 1]->positive }}
@overwrite
@section('nasional_case')
{{ $count_data['ina_positive'] }}
@overwrite
