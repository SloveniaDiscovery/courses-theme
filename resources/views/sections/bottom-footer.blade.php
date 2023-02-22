@if((is_page_template( 'template-dynamic_checkout.blade.php' ) ))
<div class="bg-[#F3F3F3] w-full p-4 mb-10 md:px-0  items-center flex justify-end mx-auto  max-w-pageWidth ">
@else
<div class="bg-white w-full p-4 mb-10 md:px-0  items-center flex justify-end mx-auto  max-w-pageWidth ">
  @endif
    <!-- <img class="h-4 md:h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/verified.png' ) ); ?>"></img> -->
    <img id="logo-img" class="!h-10" src="{{$logoColor}}"></img>
</div>