<?php
        $post_object = get_field('selected_product');
        $price = get_post_meta( $post_object -> ID, '_regular_price', true);
        $price_sales = get_post_meta( $post_object -> ID, '_sale_price', true);
        $price_total=($price - $price_sales) / $price * 100;
        $format_number1 = number_format($price_total, 0);?>


<div class="flex justify-center items-center flex-col">
  <?php 
  if($price_sales > 0){ ?>
    <div class='flex sm:text-xl justify-center text-light'>
      <span class="mb-1">Non-Member Price:</span>&nbsp;
      <span class='mr-2 ml-2 text-darkerRed line-through decoration-darkerRed'><?php echo '$' . $price ?></span>
    </div>
    <div class='flex justify-center'>
    <span class='font-bold text-base sm:!text-xl text-center uppercase '>One-Time Special Offer for New Members: Only <span class="text-greenColor text-[26px]"><?php echo ' $' . $price_sales  ?></span>
    </div> 
  <?php }
  else {
      echo $price . "$";
  }?>

<a href="?wfocu-accept-link=yes" class="w-full">
<button id="moving-buy-button" class="relative block  w-1/2 text-center cursor-pointer animate-rocking mt-8" onclick="toggleModal('modal-id')">
      <!-- black background shadow -->
      <div class="relative bottom-6 bg-greenColor rounded-[5px]">
      <!-- text -->
      <div class="drop-shadow-lg relative text-xl font-semibold leading-none p-4 md:py-4 md:px-20 bg-greenColor
      rounded-[5px] transform  hover:transition hover:duration-200 hover:ease-in-out hover:border-b-0 hover:bg-hover">
      <?php
        $post_object = get_field('selected_product');
        $price = get_post_meta( $post_object -> ID, '_regular_price', true);
        $price_sales = get_post_meta( $post_object -> ID, '_sale_price', true);?>
        <div class="flex flex-col items-center">
            <div class="flex flex-row items-center">
            <div class='text-base sm:text-xl md:!text-2xl mr-2 ml-2 font-semibold !no-underline uppercase text-white'>
               @sub('moving_button_text')
               </div>
                <img class="h-6 mt-1" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/arrow-right.png' )); ?>"></img>
            </div>
      </div>
    </div>
</button>
</a>
<p>By clicking the button above, <span><?php echo ' $' . $price_sales  ?></span> will be <u>automatically</u> added to your order.</p>
</div>
