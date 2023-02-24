<!-- BOX WITH DASHED BORDER - UPSELL TEMPLATE 
    Fields are specified in app/Blocks/FlexibleUpsell.php
-->
<div class="border-dashed border-2 border-darkOrange rounded p-4 sm:p-8">
    @layouts('box_section')
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('box_image')
            <img class="my-8 mx-auto" src="@sub('image', 'url')" alt="">
        @endlayout
        @layout('moving_button')
            @include('partials.button-buy-inside')
        @endlayout
        @layout('box_text')
            @sub('text')
        @endlayout
    @endlayouts
</div>