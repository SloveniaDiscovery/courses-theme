@extends('layouts.app')
@section('content')
@include('partials.scrolling-progress-bar')

@php
$link="?wfocu-accept-link=yes"
@endphp
@include('sections.top-bar-upsell')
@if($toggleBar1)
    @include('sections.first-upsell')
@endif
@if($toggleBar2)
    @include('sections.second-upsell')
@endif

@if($toggleBar3)
    @include('sections.third-upsell')
@endif
<section class="container">
    <div class="max-w-contentwidth m-auto">
        
    @include('blocks.flexible-upsell')

    </div>
</section>

@endsection