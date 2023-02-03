<?php
/*
    Template Name: Steps new template
    */
?>

@extends('layouts.app')
@section('content')
@include('partials.scrolling-progress-bar')

@php
$link="?wfocu-accept-link=yes"
@endphp
@include('sections.top-bar-upsell')

@include('sections.upsell-progress-2nd')

<section class="container max-w-contentwidth m-auto w-full upsell-box">

    @include('partials.content-upsell')
    @include('partials.no-thanks-button')

</section>

@endsection