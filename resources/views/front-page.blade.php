@extends('layouts.app')

@include('sections.top-bar-sales-white')
@include('partials.ebook-form')

<section class="mx-auto container">
    <div class="max-w-contentwidth pt-10 mx-auto">
        <div class="hp-logos px-2 sm:px-8 py-4">
             <img class="mx-auto" src="{{$reviewLogosHp}}"></img>
        </div>
        <div class="text-black text-5xl font-normal my-16">{{$headlineSecondSectionHome}}</div>
    </div>
</section>

<section class="pb-10">
<div class=" mx-auto container">
    @include('partials.products-homepage')
</div>
</section>

<section class="mx-auto container my-10 justify-center">
    <div class="max-w-contentwidth m-auto">
        <div class="flex mb-16 justify-between flex-col sm:flex-row">
            @include('partials.expert-informations')
            <!-- <img class="h-20 mr-4 rounded-full" src="{{$imageThirdSectionHome}}"></img> -->
            <!-- <div class="text-black text-5xl font-normal">{{$headlineThirdSectionHome}}</div> -->
            @include('partials.satisfied-customers')
        </div>

        <div>{!! $contentThirdSectionHome !!}</div>

        <div class="my-12 h-12 flex justify-center">
            <?php $button_url = $homepageButtonLink['url']; ?>
            <a href="<?php echo esc_url($button_url); ?>" class="bg-darkOrange hover:bg-hoverOrange text-white font-semibold p-4 px-12 text-base rounded-[3px] flex items-center">
                {{$homepageButtonText}}
            </a>
        </div>

        <div class="text-black text-5xl font-normal mb-10">{{$headlineFourthSectionHome}}</div>

        <div>{!! $contentFourthSectionHome !!}</div>

        @include('sections.testimonial-section')
    </div>
</section>
@if($headlineFifthSectionHome)
<section class="mx-auto bg-lightOrange py-16">
    <div class=" container mx-auto">
        <div class="max-w-contentwidth m-auto">
            <div class="text-black text-5xl font-normal mb-10">{{$headlineFifthSectionHome}}
            </div>
            <div>{!! $contentFifthSectionHome !!}</div>
        </div>

    </div>
</section>
@endif
@if($newsletterFormText)
@include('sections.ebook-form-homepage')
@endif

@include('sections.footer')

