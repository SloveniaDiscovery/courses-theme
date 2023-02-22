
    <div class="max-w-contentwidth mx-auto text-center">
    @layouts('card_section')
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('text_block')
            <div class="font-semibold py-4 paragraph-no-margin">
                @sub('text_block_wysiwyg')
            </div>
        @endlayout
    @endlayouts
        @include('partials.countdown-upsell-alpine-white')
    </div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-14 md:gap-4 lg:gap-8 mt-12 mb-20 sm:mt-20 max-w-4xl mx-auto ">
@layouts('card_section')
    @layout('products_cards')
    @group('left_upsell_card_section')
        <div class="w-full mt-0 mb-10 sm:mb-0 sm:mt-10 relative">
            @hassub('promo_text')
            <div class="text-white bg-darkerRed rounded-[30px] uppercase font-semibold text-base py-1 px-8 left-4 w-fit absolute -top-6 z-10">
                @sub('promo_text')
            </div>
            @endsub
            <div class="border-4 border-text border-t-40 relative">
                @hassub('title')
                <h4 class="bg-text p-2 py-4 relative text-white font-semibold uppercase text-center text-2xl">
                    @sub('title')
                </h4>
                @endsub
                <div class="p-2 md:!pl-4 md:!pr-4 upsell-boxes-content">
                    @hassub('image')
                        <img class="mx-auto mt-6 mb-4" src=" @sub('image', 'url')" > </img>
                    @endlayout
                    @hassub('text')
                        @sub('text')
                    @endsub
                    @hassub('select_product')
                        @include('partials.button-upsell-essential')
                    @endsub
                </div>
            </div>
        </div>
    @endgroup
    @group('right_upsell_card_section')
        <div class="w-full relative drop-shadow-md">
            @hassub('promo_text')
            <div class="text-white bg-darkerRed rounded-[30px] uppercase font-semibold text-base py-1 px-8 left-4 w-fit absolute -top-6 z-10">
                @sub('promo_text')
            </div>
            @endsub
            <div class="border-4 border-darkOrange border-t-40 relative">
                @hassub('title')
                <h4 class="bg-darkOrange p-2 py-4 relative text-white font-semibold uppercase text-center text-2xl">
                    @sub('title')
                </h4>
                @endsub
                <div class="p-2 md:!pl-4 md:!pr-4 upsell-boxes-content bg-white">
                    @hassub('image')
                        <img class="mx-auto mt-6 mb-4" src=" @sub('image', 'url')" > </img>
                    @endsub
                    @hassub('text')
                        @sub('text')
                    @endsub
                    @hassub('select_product')
                        @include('partials.button-upsell-bundle')
                    @endsub
                </div>
            </div>
            
        </div>
    @endgroup
    @endlayout
@endlayouts
</div>

<!-- <div class="max-w-contentwidth m-auto my-16">
    <div class="w-full text-center">
        <a href="?wfocu-reject-link=yes" class="my-12 hover:!no-underline !underline text-black text-xl hover:text-hoverOrange">
            <?php /**  echo $no_thanks_button  */ ?>
        </a>
    </div>
</div> -->


