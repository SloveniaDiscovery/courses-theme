{{--
  Template Name: Steps template
  Template Post Type: wfocu_offer
--}}


@extends('layouts.app')
@section('content')
@include('partials.scrolling-progress-bar')

@php
$link="?wfocu-accept-link=yes"
@endphp
@include('sections.top-bar-upsell')

@include('sections.upsell-progress-2nd')

<section class="container upsell-box">

  @include('blocks.flexible-upsell')

</section>

@endsection