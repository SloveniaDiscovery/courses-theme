<!-- BOX WITH DASHED RED BORDER - SALES PAGE
    Fields are specified in app/Blocks/FlexibleSalesPage.php
-->
<section class=" justify-center max-w-contentwidth mx-auto mb-10 ">
    <div class="border-dashed border-4 border-borderColorRed rounded-t-full bg-[#FFF6F6] p-4 w-fit mx-auto -mb-1 border-b-0	sticky h-3/6">
        <img class="h-16" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/limited-time-offer.png' ) ); ?>"></img>    
    </div>
    <div class=" border-dashed border-4 border-borderColorRed rounded-md p-4 sm:p-4 bg-[#FFF6F6] w-full">
        @layouts('limited_offer_box')
            @layout('text_content')
                @sub('text')
            @endlayout
            @layout('image')
                <div class="flex justify-center my-4">
                    <img src=" @sub('image', 'url')"></img>
                </div>
            @endlayout
        @endlayouts
    </div>
</section>