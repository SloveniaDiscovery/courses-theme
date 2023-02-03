@if($moneyBackGuarranteHeadline)
<div class="font-semibold md:text-xl text-lg mt-4 text-black flex justify-center md:w-11/12 mx-auto">
    <img class="h-20 mr-1" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/guaranteed-money-back.png' ) ); ?>"></img>
    <div>
        <!-- <div class="text-left font-bold text-base ml-4">@sub('guarantee_headline')</div>
        <div class="text-left font-normal !text-sm ml-4">@sub('guarantee_text')</div> -->
        <div class="text-left font-bold text-base ml-4">{!! $moneyBackGuarranteHeadline !!}</div>
        <div class="text-left font-normal !text-sm ml-4">{!! $moneyBackGuarranteText !!}</div>
    </div>
</div>
@endif
