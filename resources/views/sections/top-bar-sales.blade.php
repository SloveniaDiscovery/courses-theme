<!-- TOP BAR WITH STORE INFO + TIMER-->
@if($phoneNumber)
<header class="bg-black sticky top-0 z-50 top-bar-countdown">
    <div class="w-full p-2 items-center flex justify-between mx-auto max-w-pageWidth">
        <img class="h-10 no-lazyload hidden sm:flex" src="{{$logoWhite}}"></img>
        <div class="text-center text-white font-bold text-xl flex w-full md:!w-auto justify-between items-center">
            <div class="grid md:flex items-center text-sm md:!text-lg">
                @sub('top_bar_text')
                @include('partials.countdown-sales')   
            </div>
            <button class="leading-[1.2] hover:bg-[#039d00] bg-greenColor p-2 pl-4 pr-4 rounded-full text-white text-base ml-4 h-fit md:h-auto uppercase" onclick="toggleModal('modal-id')">
                @sub('top_bar_button_text')
            </button>
        </div>
        <div class="text-white text-xl hidden sm:flex">
            <div class="fill-white h-5 mr-2 mt-1">
            @include('icons.phone') </div>    
            {{$phoneNumber}}
        </div>
    </div>
</header>

@endif