<!-- <img class="h-10 mr-4" src="@sub('customers_image', 'url')"></img> -->

@if(is_front_page())
<div class="flex items-center flex-col sm:flex-row ml-auto mr-0 mt-4 sm:mt-0">
    <img class="h-10 mr-4" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/testimonials.png' ) ); ?>"></img>
    <div>
        <div class="text-black font-bold text-xl leading-none">{{$satisfiedCustomersNumber}}</div>
        <div class="text-black text-xs leading-none">satisfied customers</div>
    </div>
</div>
@else
<img class="h-10 mr-4" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/testimonials.png' ) ); ?>"></img>

<div>
    <div class="text-black font-bold text-3xl leading-none">{{$satisfiedCustomersNumber}}</div>
    <div class="text-black text-xs leading-none">satisfied customers</div>
</div>
@endif