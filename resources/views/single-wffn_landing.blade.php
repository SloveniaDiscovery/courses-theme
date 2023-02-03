@extends('layouts.app')
@section('content')
@include('partials.scrolling-progress-bar')

@include('blocks.flexible-salespage')

@include('blocks.faq-blocks')

 
@include('sections.before-footer')
<section class="mx-auto container">
@include('sections.footer')
</section>
@endsection