@extends('layouts.app')

@if(in_category('Courses grid'))

@include('sections.header')
@include('partials.page-banner')
<?php if(function_exists('seopress_display_breadcrumbs')) { seopress_display_breadcrumbs(); } ?>

<section class="container max-w-pageWidth mt-20 mb-12 justify-center">

    @layouts('page_section')
    <div class="mb-10">
    @layout('heading')
        @sub('heading')
    @endlayout
    </div>
    @endlayouts
    @include('partials.products-homepage')

</section>
@include('sections.footer')
@else 

@include('blocks.flexible-page')

@section('content')
@include('sections.content-page')
@endsection

@endif

