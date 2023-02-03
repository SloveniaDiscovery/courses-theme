
<section class="">
    <div class=" text-center">
        <?php if(get_field('toggle_top_heading')): ?>
            @include('partials.top-heading')
        <?php endif; ?>
        <?php if(get_field('toggle_headline_h1')): ?>
            <div>{!! $mainHeading !!}</div>
        <?php endif; ?>
        <?php if(get_field('toggle_headline_h2')): ?>
            <div>{!!$subheading!!}</div>
        <?php endif; ?>
    </div>
   @include('partials.program-section-new')
   @include('partials.image-reviews')

</section>


