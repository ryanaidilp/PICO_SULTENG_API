@extends('layouts.content')
@section('content_title')

Situasi COVID-19 di Sulawesi Tengah

@overwrite

@section('content_body')

@include('include.content.datavisual.header')

@include('include.content.datavisual.card.positive')
@include('include.content.datavisual.card.recovered')
@include('include.content.datavisual.card.death')

@include('include.content.datavisual.card.odp')
@include('include.content.datavisual.card.pdp')

@include('include.content.datavisual.chart.line.positive')
@include('include.content.datavisual.chart.line.recovered')
@include('include.content.datavisual.chart.line.death')

@include('include.content.datavisual.chart.line.combined')
@include('include.content.datavisual.chart.pie.combined')
@include('include.content.datavisual.chart.bar.district_bar')

@include('include.content.datavisual.map.lokal.chart')
@include('include.content.datavisual.map.nasional.chart')

@include('include.content.datavisual.table.province')
@include('include.content.datavisual.table.district')
@include('include.content.datavisual.table.hospital')
@include('include.content.datavisual.table.posts')

@overwrite
