<section class="mx-auto max-w-contentwidth">
    <div class="mt-12">
    <?php
        $testimonials = get_sub_field('testimonials');
        if( $testimonials ): ?>
        @if(get_post_type() === 'wffn_landing' || get_post_type() === 'wfocu_offer' || get_post_type() === 'page')
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
    <?php endif; ?>
    </div>
</section>