<!-- TOP BAR WITH TIMER minutes+seconds + STORE INFO -->
<header class="bg-black top-0 z-40 top-bar-countdown">
    <div class="w-full p-2 py-2 items-center flex justify-between mx-auto max-w-pageWidth flex-col-reverse md:!flex-row">
        <img id="head-logo" class="h-10 no-lazyload hidden md:flex" src="{{$logoWhite}}"></img>
        <div id="checkout-timer" class="text-center text-white font-semibold text-smallParagraph flex w-full justify-between items-center">
            <div class="my-0 p-y pt-4 lg:!pt-0 lg:p-0 bg-black text-white flex justify-center items-center md:justify-end w-full rounded">
                Your order is reserved for: @include('partials.countdown-checkout')
            </div>
        </div>
        <div class="text-white text-sm flex flex-col lg:flex-row items-center justify-center w-full">
            <div class="flex flex-row mb-1 lg:!mb-0">
            <div class="fill-white h-5">
                @include('icons.phone')
            </div>    
            <span class="ml-2">{{$phoneNumber}}</span>
            </div>
            <div class="flex flex-row">
            <div class="fill-white h-4 ml-4 mt-[2px] flex items-center md:text-base text-[12px]">
                @include('icons.mail')    
            </div> 
            <span class="ml-2">{{$email}}</span>
            </div>
        </div>
    </div>
</header>
