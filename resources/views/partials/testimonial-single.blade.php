<?php
$testimonial_name = get_field('testimonial_name', $testimonial);
$testimonial_content = get_field('testimonial_text', $testimonial);
$testimonial_image = get_field('testimonial_image', $testimonial);
$testimonial_headline = get_field('testimonial_headline', $testimonial);
$testimonial_style = get_field('testimonial_style', $testimonial);
$testimonial_link = get_field('testimonial_link', $testimonial);
?>
@if((is_page_template( 'template-dynamic_checkout.blade.php' ) ))
<div class="inline-flex bg-white mt-5 rounded-md">
@else
<div class="inline-flex bg-white">
  @endif
    <div class=" p-6 shadow rounded-lg">
        <div class="flex relative mb-5 items-center w-full ">
            @if($testimonial_image)
              <img class="rounded-full mr-2 h-14 w-14 object-cover" src="<?php echo $testimonial_image['url']; ?>">
            @else
              <img class="rounded-full mr-2 h-14 w-14 object-cover" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/avatar.jpeg' ) ); ?>">
            @endif
            <div style="width: -webkit-fill-available;">
            <div class="font-semibold w-max"><?php echo $testimonial_name; ?></div>
              <div class="fill-primary mt-1 flex h-4">
                @if($testimonial_style=="Google")
                  @for ($i = 0; $i <= 4; $i++)
                    <div class="mr-0.5 h-full !fill-googleRatingStar">@include('icons.rating-star') </div>
                  @endfor
                @elseif($testimonial_style=="Facebook")
                <!-- <div class="text-facebookRatingStar font-semibold mr-1 text-lg mt-[-5px]"> 5.0 </div> -->
                  @for ($i = 0; $i <= 4; $i++)
                    <div class="mr-0.5 h-full fill-facebookRatingStar ">@include('icons.rating-star')</div>
                  @endfor
                @elseif($testimonial_style=="Tripadvisor")
                  @for ($i = 0; $i <= 4; $i++)
                  <img class= "h-4 ml-[1px]" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/tripadvisor-star.jpg' ) ); ?>"></img>
                  @endfor
                @endif
              </div>
              <div class="flex items-center mt-1 text-verified text-xs w-full">
                <img class="rounded-full h-6 object-cover mr-1" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/check-blue.png' ) ); ?>">
                <span>Verified customer</span>
              </div>
            </div>
            @if($testimonial_style=="Google")
            <div class="flex justify-end w-full">
              @if($testimonial_link)
                <a href="<?php echo ($testimonial_link["url"]); ?>">
                  <img class= "h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/google-logo.jpg' ) ); ?>"></img>
                </a>
              @else 
                <img class= "h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/google-logo.jpg' ) ); ?>"></img>
              @endif
              </div>
            @elseif($testimonial_style=="Facebook")
            <div class="flex justify-end w-full">
              @if($testimonial_link)
                <a href="<?php echo ($testimonial_link["url"]); ?>">
                  <img class= "h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/facebook-logo.jpg' ) ); ?>"></img>
                </a>
              @else 
                <img class= "h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/facebook-logo.jpg' ) ); ?>"></img>  
              @endif
              </div>
            @elseif($testimonial_style=="Tripadvisor")
            <div class="flex justify-end w-full">
              @if($testimonial_link)
                <a href="<?php echo ($testimonial_link["url"]); ?>">
                  <img class= "h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/trustpilot-logo.png' ) ); ?>"></img>
                </a>
              @else 
                <img class= "h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/trustpilot-logo.png' ) ); ?>"></img>
              @endif
            </div>
            @endif
        </div>
        
        <div class="italic text-lg "><?php echo $testimonial_content ?></div>
    </div>
</div>