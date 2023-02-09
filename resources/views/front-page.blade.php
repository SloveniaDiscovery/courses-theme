@extends('layouts.app')

@include('sections.top-bar-sales-white')
@group('options_section')
@hassub('phone')
@sub('phone')
@endsub
@endgroup
@include('blocks.flexible-homepage')

@include('sections.footer')
