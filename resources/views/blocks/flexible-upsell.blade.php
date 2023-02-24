<?php 
/* Flexible content used for checkout, rendering fields on front-end 
*   use @layout from app/Blocks/FlexibleUpsell.php, get subfields as @sub 
*/ 
?>
@layouts('upsell_section')

<div class="max-w-contentwidth m-auto">
@if(is_page_template( 'template-upsell_steps.blade.php' ) )
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('image')
            <img class="max-w-[500px] w-full my-8 mx-auto" src="@sub('image', 'url')" alt="">
        @endlayout
        @layout('dashed_box')
            @include('sections.dashed-box')
        @endlayout
        @layout('no_thanks_button')
            @include('partials.no-thanks-button')
        @endlayout
        @layout('guarantee_section')
            @include('partials.guarantee-upsell')
        @endlayout
    @else
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('image')
            <img class="max-w-[500px] w-full my-8 mx-auto" src="@sub('image', 'url')" alt="">
        @endlayout
        @layout('no_thanks_button')
            @include('partials.no-thanks-button')
        @endlayout
        @layout('yellow_box')
            @include('sections.yellow-box')
        @endlayout
        @layout('green_box')
            @include('partials.green-box-upsell')
        @endlayout
        @layout('testimonials')
            @include('partials.testimonials')
        @endlayout
        @layout('guarantee_section')
            @include('partials.guarantee-upsell')
        @endlayout
@endif
</div>
    @layout('product_self_sort')
        <section class="mt-12">
            @include('sections.self-sorting_upsell')
        </section>
    @endlayout
@endlayouts