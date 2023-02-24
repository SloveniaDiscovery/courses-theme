<!-- FIRST SECTION ON SALES PAGE -->
<div class="flex flex-wrap md:mt-16">  
    <div class="md:!w-1/2 w-full md:!mb-0 mb-14 md:pr-4">
        @hassub('product_image')
            <img class="w-full" src="@sub('product_image', 'url')"></img>
        @endsub
        @hassub('embed_code')
            @sub('embed_code')
        @endsub
        @include('partials.expert-info')
    </div>
    <div class="md:!w-1/2 w-full relative">
    @hassub('product_title')
    <div id="product-info" class="border-4 border-black !rounded-lg border-t-40 relative">
            <div class="bg-black pb-2 pt-2 relative">
                @include('partials.promo-text')
                
                <?php if(get_sub_field('timer')) { ?>
                    @include('partials.date-picker')
                <?php } else { ?>
                    @include('partials.countdown-sales')
                <?php } ?>
                <div class="text-white text-2xl text-center font-semibold">
                    @sub('product_title')
                </div>
                <div class="fill-primary flex h-[11px] items-center justify-center my-1">
                    @for ($i = 0; $i <= 4; $i++)
                        <div class="mr-0.5 h-full !fill-yellow-400">@include('icons.rating-star')</div>
                    @endfor
                    <div class="font-semibold text-white text-[14px]">4.92 / 5 based on 241 reviews</div>
                </div>
                    
            </div>
            <div class=" block !rounded-lg p-2 md:!pl-2.5 md:!pr-2.5">
                    <div id="product-includes" class=" !text-sm p-2"> 
                        @sub('product_includes')
                    </div>
                    <div class="flex justify-center whitespace-nowrap">
                    <?php
                        $post_object = get_field('selected_product');
                        $price = get_post_meta( $post_object -> ID, '_regular_price', true);
                        $price_sales = get_post_meta( $post_object -> ID, '_sale_price', true);
                        if($price_sales > 0){
                            echo "<div class='text-redColor text-xl mr-2 ml-2 font-bold uppercase'> only " . "$"  . $price_sales ."</div>" ."<div class='text-redColor text-xl font-bold uppercase'> today" . "&nbsp" . "</div>" . "<div class='text-xs mr-2 mt-1 font-medium line-through flex items-center'>" .  "LIST PRICE" . " $" .  $price . "</div>";
                        }
                        else{
                            echo $price . "$";
                        }
                        ?>
                    </div>
                    <div id="form" class="flex-auto relative mt-4">
                        <?php $form_shortcode = get_sub_field('main_form_shortcode'); echo do_shortcode($form_shortcode)?>
                    </div>    
                </div>  
                <img class="h-32 hidden md:flex md:absolute md:-right-16 md:top-8" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/parenting-award.png' ) ); ?>"></img>
        </div>
        @endsub
        <div class="mt-8 grid justify-items-center">
            <div class="flex">
                <img class="h-4 mr-3" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/lock.png' ) ); ?>"></img>
                <div class="text-sm mb-2">100% Secure 256-bit Encryption.</div>
            </div>
            <img class="h-4" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/payment-methods.jpg' ) ); ?>"></img>
        </div>

 </div>

 </div>