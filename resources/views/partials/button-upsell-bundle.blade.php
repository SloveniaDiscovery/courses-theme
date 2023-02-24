<?php
/**
 * Button used in upsell template - self-sorting section, second product, on the right
 * 
 * fields are specified in app/Blocks/FlexibleUpsell.php
 * 
 */
    $post_object = get_sub_field('select_product');
    $price = get_post_meta( $post_object -> ID, '_regular_price', true);
    $price_sales = get_post_meta( $post_object -> ID, '_sale_price', true);
    $price_total=($price - $price_sales) / $price * 100;
    $format_number1 = number_format($price_total, 0);
?>

<div class="grid justify-center mt-12 mb-6">
    <div class="text-center text-sm font-semibold">ONE TIME PAYMENT</div>
    <?php if($price_sales > 0) { ?>
     <div class='flex justify-center'>
        <div class='font-semibold text-3xl text-black'>
            ONLY
        </div>
        <div class='text-3xl mr-2 ml-2 font-semibold !no-underline uppercase text-greenColor items-center flex'>
            <div class='text-sm'>$</div>
            <?php echo $price_sales  ?>
        </div>
    </div>
    <div class='flex text-xl'>
        <span class='mt-1'>Usually</span>
        <div class='mr-2 ml-2 line-through pt-1' >
        <?php  echo '$' . $price ?> 
        </div>
        <span class='font-bold text-redColor mt-1'>
            <?php echo $format_number1  . '% OFF' ?></span>
        </div>
    <?php }
    else{
        echo $price . "$";
    }?>
  </div>
  <a href="?wfocu-accept-link=yes&key=2" class="w-full">
  <button class="absolute block w-auto left-4 right-4 text-center cursor-pointer mt-3" onclick="toggleModal('modal-id')">
      <div class="relative  bottom-6  text-xl font-semibold leading-none py-2 px-4 bg-greenColor rounded-[3px] transform  hover:bg-hover">
        <div class="flex flex-col items-center">
            <div class="flex flex-row items-center">
            <div class='text-xl mr-2 ml-2 font-semibold !no-underline uppercase text-white'>
                @sub('button_text')
            </div>
            <img class="h-4" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/arrow-right.png' )); ?>"></img>
            </div>
        </div>
      </div>
    </button>
    </a>
