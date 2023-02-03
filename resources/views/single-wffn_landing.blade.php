@extends('layouts.app')
@section('content')
<?php if (get_field( 'timer' ) ) { ?>
    @include('sections.top-bar-datepick')
<?php } else { ?>
    @include('sections.top-bar-sales')
<?php } ?>

@include('partials.scrolling-progress-bar')

<section class="mx-auto container">
@php
$link="#";
$titleRumen=$titleYellowBox;
$subtitleRumen=$subtitleYellowBox;
$textRumen=$textYellowBox;
$imageRumen=$imageYellowBox;
@endphp
@include('sections.first-section')
@include('sections.content-section')
<?php if (get_field( 'display_yellow_2' ) ): ?>
    @include('sections.yellow-box')
<?php endif; ?>

@include('sections.testimonial-section')
@include('sections.testimonial-video-section')
@include('sections.who-is-challange-for')
@include('sections.money-back')
@if($limitedOffer) 
    @include('sections.limited-offer')
@endif
@php
$titleRumen=$whatYouGetTitle;
$subtitleRumen=$whatYouGetSubtitle;
$textRumen=$whatYouGetText;
$imageRumen=$whatYouGetImage;
@endphp
<?php if ( get_field( 'display_yellow_3') ): ?>
    @include('sections.yellow-box')
<?php endif; ?>
@include('sections.faq-section')

@include('sections.yellow-box')

</section>
@include('sections.before-footer')
<section class="mx-auto container">
@include('sections.footer')
</section>
@endsection