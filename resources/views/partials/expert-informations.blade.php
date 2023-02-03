@if(is_front_page())
<div class="flex items-center">
    <div class="relative">
        <img class="h-20"src="{{$expertProfilePhoto}}"></img>
        <img class="h-14 absolute -right-6 top-10"src="{{$bestSellingAuthorBadge}}"></img>
    </div>
    <div class="ml-8 sm:ml-10 block mt-4">
        <div class="flex font-semibold text-[24px] pb-1">{{$expertName}} 
            <img class="h-4 mt-2 ml-2" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/check-blue.png' ) ); ?>"></img>
        </div>
        <div class="flex text-[15px] text-stone-500	leading-none">{{$expertJob}}</div>
    </div>
</div>
@else 
<div class="flex">
    <div class="relative">
        <img class="h-20"src="{{$expertProfilePhoto}}"></img>
        <img class="h-14 absolute -right-6 top-10"src="{{$bestSellingAuthorBadge}}"></img>
    </div>
    <div class="ml-8 block mt-4">
        <div class="flex font-bold text-xl">{{$expertName}} 
            <img class="h-4 mt-2 ml-2" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/check-blue.png' ) ); ?>"></img>
        </div>
        <div class="flex text-xs text-stone-500	leading-none max-w-[150px]">{{$expertJob}}</div>
    </div>
</div>
@endif