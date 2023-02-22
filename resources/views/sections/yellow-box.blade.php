<div class="text-center border-dashed border-4 border-primary rounded-md p-4 sm:p-8 bg-[#FFFAF2] w-full my-5">
    @layouts('yellow_box_flexible')
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('text_with_background')
           @include('partials.red-text')
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
        @layout('moving_button_#2')
            @include('partials.button-buy-box')
        @endlayout
        @layout('guarantee')
            @include('partials.satisfaction-guarantee')
        @endlayout
        @layout('personal_assistance')
            @include('partials.personal-assistance')
        @endlayout
    @endlayouts
</div>