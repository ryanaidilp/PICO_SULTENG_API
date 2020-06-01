@extends('layouts.card_api_data')
@section('card_api_width')
1/3
@overwrite
@section('card_api_title')
@lang('home.local_stats')
@overwrite
@section('card_api_caption')
@lang('home.local_stats_desc')
@overwrite
@section('card_api_url')
{{ route('stats.index') }}
@overwrite
@section('card_api_url_v2')
{{ route('v2.stats.index') }}
@overwrite
