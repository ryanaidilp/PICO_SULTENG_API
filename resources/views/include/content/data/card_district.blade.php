@extends('layouts.card_api_data')
@section('card_api_width')
1/3
@overwrite
@section('card_api_title')
@lang('home.district')
@overwrite
@section('card_api_caption')
@lang('home.district_desc')
@overwrite
@section('card_api_url')
{{ route('regency.index') }}
@overwrite
@section('card_api_url_v2')
{{ route('v2.regency.index') }}
@overwrite
