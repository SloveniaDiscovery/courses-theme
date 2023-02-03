
<section class="mx-auto sm:max-w-contentwidth">
    <div class="mt-2 mb-12">
    <?php
        $testimonials = get_field('video_testimonials');
        if( $testimonials ): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4">
            <?php 
                foreach( $testimonials as $testimonial ): ?>
                @include('partials.testimonial-single-video')
            <?php
            endforeach; 
            ?>
        </div>
    <?php endif; ?>
    </div>
</section>