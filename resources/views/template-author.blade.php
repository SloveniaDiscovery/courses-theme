{{--
  Template Name: Author
--}}

@extends('layouts.app')
@include('sections.header')

@include('partials.page-banner')
<div class="container max-w-pageWidth text-xs">
<?php if(function_exists('seopress_display_breadcrumbs')) { seopress_display_breadcrumbs(); } ?>
</div>

@include('blocks.flexible-page')

