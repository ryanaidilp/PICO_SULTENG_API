@extends('layouts.content')
@section('content_title')
<i>Technology Stack</i>
@overwrite

@section('content_body')
@include('include.content.stack.card_lumen')
@include('include.content.stack.card_tailwind')
@include('include.content.stack.card_chart')
@include('include.content.stack.card_mysql')
@overwrite
