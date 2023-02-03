<div class="text-center border-dashed border-4 border-primary rounded-md p-4 sm:p-8 bg-secondary w-full">
    @layouts('yellow_box_flexible')
        @layout('headline')
        <h2 class="!text-3xl md:!text-4xl">@sub('main_heading')</h2>
        @endlayout
        @layout('subheading')
            <div class="text-2xl">@sub('sub_heading')</div>
        @endlayout
        @layout('text_with_background')
            <div class="bg-redColor text-white md:p-2 md:px-10 p-2 mt-6 !mb-6">
                @sub('text_with_background_color')
            </div>
        @endlayout
        @layout('text_content')
            <div class="text-left">@sub('text')</div>
        @endlayout
        @layout('image')
            <div class="flex justify-center my-4">
                <img src=" @sub('image', 'url')"></img>
            </div>
        @endlayout
        @layout('bonuses')
            @include('partials.bonuses-sales-page')
        @endlayout
        @layout('moving_button')
            @include('partials.button-buy')
        @endlayout
        @layout('guarantee')
            @include('partials.satisfaction-guarantee')
        @endlayout
        @layout('personal_assistance')
            @include('partials.personal-assistance')
        @endlayout
    @endlayouts
</div>