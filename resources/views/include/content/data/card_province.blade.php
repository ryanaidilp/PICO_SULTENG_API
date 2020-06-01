@extends('layouts.card_api_data')
@section('card_api_width')
1/3
@overwrite
@section('card_api_title')
@lang('home.province')
@overwrite
@section('card_api_caption')
@lang('home.province_desc')
@overwrite
@section('card_api_url')
{{ route('province.index') }}
@overwrite
@section('card_api_url_v2')
{{ route('v2.province.index') }}
@overwrite