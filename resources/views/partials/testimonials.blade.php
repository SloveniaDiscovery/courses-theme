<?php
/* 
*  SHOW CHOSEN TESTIMONIALS (CPT) FROM SUB FIELD testimonials
*/ 
    $testimonials = get_sub_field('testimonials');
    if( $testimonials ): ?>
    @if((is_page_template( 'template-dynamic_checkout.blade.php' ) ))
    <div class="max-w-pageWidth my-1 md:!my-12">
        <div class="sm:columns-2 md:columns-3  gap-5">
            <?php 
                foreach( $testimonials as $testimonial ): ?>
                @include('partials.testimonial-single')
            <?php
            endforeach; 
            ?>
        </div>
    </div>
    @else
    <section class="mx-auto max-w-contentwidth">
    <div class="mt-12">
        @if(get_post_type() === 'wffn_landing' || get_post_type() === 'wfocu_offer' || get_post_type() === 'page' || get_post_type() === 'wffn_optin')
        <div class=" md:gap-4 md:columns-2 columns-1 gap-2">
        @elseif(get_post_type() === 'wfacp_checkout')
        <div class="columns-1 gap-2">
        @endif
            <?php 
                foreach( $testimonials as $testimonial ): ?>
                @include('partials.testimonial-single')
            <?php
            endforeach; 
            ?>
        </div>
    </div>
    </section>
    @endif
<?php endif; ?>
