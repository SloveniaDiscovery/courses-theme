<!-- TOP BANNER - UPSELL TEMPLATE IF TOGGLE BAR 2
    Fields are specified in app/Blocks/FlexibleUpsell.php
-->
<section class=" w-full m-auto bg-third h-auto pt-4 mb-10">
    <div class="container">
        @include('partials.progress-bar-second-upsell')
        <div class="max-w-contentwidth m-auto font-bold md:text-4xl text-xl w-full text-center mt-10">
        @layouts('upsell_section')
        @layout('toggle_bar_2_headline')   
            @sub('headline')
        @endlayout
        @endlayouts
        </div>
        <div class="max-w-contentwidth m-auto flex mt-12">
            <img class="md:h-36 h-20 rounded-full" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/marko-juhant-obraz.jpeg' ) ); ?>"></img>
            <div class="flex flex-col justify-center ml-4 align-middle">
                <div class="md:text-xl text-l">From: <span class="font-bold md:text-xl text-l"> Marko Juhant</span>
                </div>
                <div class="md:text-xl text-l">Subject: <span class="font-bold md:text-xl text-l">
                @layouts('upsell_section')
                @layout('product_name')   
                    @sub('product_name')
                @endlayout
                @endlayouts
                </span>
                </div>
                <div class="md:text-xl text-l">To: <span class="font-bold md:text-xl text-l"> <?php
                $customer_id = get_current_user_id();
                echo get_user_meta($customer_id, 'first_name', true);
                ?></span>
                </div>
            </div>
        </div>
    </div>
    
</section>