<div class="border-dashed border-2 border-darkOrange rounded p-4 sm:p-8">
    @layouts('box_section')
        @layout('main_headline')
            @sub('heading')
        @endlayout
        @layout('subheading')
            @sub('subheading')
        @endlayout
        @layout('box_image')
            <img class="my-8 mx-auto" src="@sub('image', 'url')" alt="">
        @endlayout
        @layout('moving_button')
            @include('partials.button-buy-inside')
        @endlayout
        @layout('text_content')
            @sub('text')
        @endlayout
    @endlayouts
</div>