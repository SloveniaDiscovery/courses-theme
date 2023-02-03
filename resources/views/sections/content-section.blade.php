<section class="justify-center">
    <div class=" max-w-contentwidth mt-10 m-auto">
        <?php if (get_field( 'toggle_before_first_content' )): ?>
            {!! $beforeFirstContent !!}
        <?php endif; ?>
        @include('sections.testimonials-no-heading')
        {!! $afterTestimonialText !!}
        <?php if (get_field( 'display_yellow_1' )): ?>
            @include('sections.yellow-box')
        <?php endif; ?>
        {!! $firstContent !!}
        {!! $secondContent !!}
        @include('partials.modal')
    </div>
</section>  