<?php if( have_rows('above_boxes_content') ):
    while ( have_rows('above_boxes_content') ) : the_row();
        if( get_row_layout() == 'upsell_above_content' ):
            $above_box_title = get_sub_field('title_above_box_contents');
            $above_box_desc = get_sub_field('desc_above_box_contents');
          
?>
<?php endif; 
endwhile;
endif; ?>
<?php if( have_rows('upsell_self_sort_essential') ):
    while ( have_rows('upsell_self_sort_essential') ) : the_row();
        if( get_row_layout() == 'essential_box' ):
            $essential_title = get_sub_field('upsell_essential_box_title');
            $essential_content = get_sub_field('upsell_essential_box_content');
            $essential_image = get_sub_field('upsell_essential_box_image');
?>
<?php endif; 
endwhile;
endif; ?>
<?php
 if( have_rows('upsell_self_sort_bundle') ):
    while ( have_rows('upsell_self_sort_bundle') ) : the_row();
        if( get_row_layout() == 'bundle_box' ):
            $promo_text =  get_sub_field('upsell_bundle_box_promo');
            $bundle_title =  get_sub_field('upsell_bundle_box_title');
            $bundle_content = get_sub_field('upsell_bundle_box_content');
            $image =  get_sub_field('upsell_bundle_box_image');
            $no_thanks_button= get_sub_field('upsell_no_thanks');
?>   
<?php endif; 
endwhile;
endif; ?>

<section class="container mt-12">
    <div class="max-w-contentwidth mx-auto text-center">
        <h3 class="text-darkerRed font-bold text-3xl uppercase pb-0 pt-4"><?php echo $above_box_title ?></h3>
        <div class="uppercase font-semibold py-4 paragraph-no-margin">
            <?php  echo $above_box_desc;?>
        </div>
        @include('partials.countdown-upsell-alpine-white')
    </div>
</section>

<section class="container">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-12 my-6 sm:my-12 max-w-4xl mx-auto ">
    <div class="w-full mt-0 mb-10 sm:mb-0 sm:mt-10">
    <div class="border-4 border-text border-t-40 relative">
        <h3 class="bg-text p-2 py-4 relative text-white font-semibold uppercase text-center text-2xl">
        <?php echo $essential_title ?>
        </h3>
        <div class="p-2 md:!pl-4 md:!pr-4 upsell-boxes-content">
            <img class="mx-auto mt-6 mb-4" src="<?php echo esc_url($image['url']); ?>" > </img>
            <?php echo $essential_content ?>
            @include('partials.button-upsell-essential')
        </div>
    </div>

    </div>
    <div class="w-full relative drop-shadow-md">
    <div class="text-white bg-darkerRed rounded-[30px] uppercase font-semibold text-base py-1 px-8 left-4 w-fit absolute -top-6 z-10"><?php echo $promo_text ?></div>
    <div class="border-4 border-darkOrange border-t-40 relative">
        <h3 class="bg-darkOrange p-2 py-4 relative text-white font-semibold uppercase text-center text-2xl">
            <?php echo $bundle_title ?>
        </h3>
        <div class="p-2 md:!pl-4 md:!pr-4 upsell-boxes-content bg-white">
            <img class="mx-auto mt-6 mb-4" src="<?php echo esc_url($image['url']); ?>" > </img>
            <?php echo $bundle_content ?>
             @include('partials.button-upsell-bundle')
        </div>
    </div>

    </div>
</div>
<div class="max-w-contentwidth m-auto my-16">
    <div class="w-full text-center">
        <a href="?wfocu-reject-link=yes" class="my-12 hover:!no-underline !underline text-black text-xl hover:text-hoverOrange">
            <?php echo $no_thanks_button ?>
        </a>
    </div>
</div>
</section>