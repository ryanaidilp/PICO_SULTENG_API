@extends('layouts.card_api_data')
@section('card_api_title')
@lang('home.national_stats')
@overwrite
@section('card_api_width')
1/3
@overwrite
@section('card_api_caption')
@lang('home.national_stats_desc')
@overwrite
@section('card_api_url')
{{ route('v2.national.stats.index') }}
@overwrite
@section('card_api_url_v2')
{{ route('v2.national.stats.index') }}
@overwrite
{{-- Put Your API Card Data Here --}}
