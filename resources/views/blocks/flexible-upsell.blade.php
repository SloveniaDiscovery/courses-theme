@layouts('upsell_section')
<div class="max-w-contentwidth m-auto">
    @if(is_page_template( 'template-upsell_steps.blade.php' ) )
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('main_headline')
            @sub('heading')
        @endlayout
        @layout('subheading')
            @sub('subheading')
        @endlayout
        @layout('image')
            <img class="my-8 mx-auto" src="@sub('image', 'url')" alt="">
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
</div>
    @else
        @layout('main_headline')
            @sub('heading')
        @endlayout
        @layout('subheading')
            @sub('subheading')
        @endlayout
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('image')
            <img class="my-8 mx-auto" src="@sub('image', 'url')" alt="">
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
    @endif
    @layout('product_self_sort')
        <section class="container mt-12">
            @include('sections.self-sorting_upsell')
        </section>
    @endlayout
@endlayouts