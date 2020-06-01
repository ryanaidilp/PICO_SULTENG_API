@extends('layouts.card_api_data')
@section('card_api_title')
@lang('home.posts')
@overwrite
@section('card_api_width')
1/3
@overwrite
@section('card_api_caption')
@lang('home.posts_desc')
@overwrite
@section('card_api_url')
{{ route('posts.index') }}
@overwrite
@section('card_api_url_v2')
{{ route('v2.posts.index') }}
@overwrite
{{-- Put Your API Card Data Here --}}
