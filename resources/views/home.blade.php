@extends('layouts.default')
@include('include.head.head')
@include('include.head.tailwind')
@include('include.head.datatables')
@include('include.head.anychart')
@include('include.head.chartjs')
@include('include.head.customcss')

@section('content')
@parent
@include('include.content.nav')
@include('include.content.hero')
@include('include.content.whitespace')
@include('include.content.whitespace')
@include('include.content.tech_stack')
@include('include.content.description')
@include('include.content.data')
{{-- @include('include.content.data_visualization')  --}}
@include('include.content.footer')
@endsection
{{-- @include('include.settings.map.config')  --}}
{{-- @include('include.settings.table.config')  --}}
{{-- @include('include.settings.analytics')  --}}
@include('include.settings.updater')
