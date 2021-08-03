@extends('layouts.content')

@section('content_title')
Data
@overwrite

@section('content_body')
@include('include.content.data.card_district')
@include('include.content.data.card_province')
@include('include.content.data.card_stats')
@include('include.content.data.card_national_stat')
@include('include.content.data.card_hospital')
@include('include.content.data.card_posts')
@overwrite
