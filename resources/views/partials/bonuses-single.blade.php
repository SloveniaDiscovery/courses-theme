<?php 
/**
 * Get all fields from bonus post
 */
    $bonus_image = get_field('product_bonus_image', $bonus);
    $bonus_title = get_field('product_bonus_title', $bonus); 
    $bonus_content = get_field('product_bonus_content', $bonus); 
    $bonus_value = get_field('product_bonus_value', $bonus); ?>
<div class="w-full flex my-4 flex-col sm:!flex-row">
    <img src="<?php echo $bonus_image['url']; ?>" class="h-auto sm:h-32 w-1/2 sm:w-auto m-auto sm:mr-4" ></img>
    <div class="block w-full">
        <div class="bg-black px-4 py-1 text-white text-left font-semibold w-fit rounded-sm mt-4 sm:mt-0 mb-2 sm:mb-0 text-sm md:text-base mx-auto sm:mx-0">
        🎁 {!! $bonus_title !!}
        </div>
        <div class="text-left w-11/12 bonus-content-text py-2">
            {!! $bonus_content !!}
        </div>
        <div class="uppercase font-semibold text-black flex justify-end text-xl w-full text-right">
        Value: {!! $bonus_value !!}
        </div>
    </div>
</div>