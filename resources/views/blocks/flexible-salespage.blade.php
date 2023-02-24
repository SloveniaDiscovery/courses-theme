<?php 
/* Flexible content used for sales pages, rendering fields on front-end 
*   use @layout from app/Blocks/FlexibleSalesPage.php, get subfields as @sub 
*/ 
?>
@layouts('salespage_sections')
    @layout('top_bar_to_midnight')
        @include('sections.top-bar-sales')    
    @endlayout
    @layout('top_bar_to_date')
        @include('sections.top-bar-datepick')
    @endlayout
@endlayouts
<section class="mx-auto container">
@layouts('salespage_sections')
    @layout('text_with_background')
    <div class="w-full flex mt-4 justify-center">
        <div class="bg-darkerRed py-1 px-10 text-white normal-case md:text-xl text-sm w-fit font-semibold rounded-full text-center">
            @sub('text_with_background_color')
        </div>
    </div>
    @endlayout
    @layout('main_heading')
        @sub('heading')
    @endlayout
    @layout('subheading')
        @sub('subheading')
    @endlayout
    @layout('product_preview')
        @include('partials.program-section-new')
    @endlayout
@endlayouts
</section>
<section class="container">
    <div class="max-w-contentwidth mt-10 m-auto">
    @layouts('salespage_sections')
        @layout('logos_badges')
        <?php $images = get_sub_field('logo_badge');
        if( $images ): ?> 
            <div class="badge-logos my-6 m-auto">
                <?php foreach( $images as $image ): ?>
                    <img src="<?php echo $image['url'] ?>"/>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        @endlayout
        @layout('logo_reviews')
        <?php $rev_images = get_sub_field('logo_review');
        if( $rev_images ): ?> 
            <div class="review-logos my-6 m-auto">
                <?php foreach( $rev_images as $rev_image ): ?>
                    <img src="<?php echo $rev_image['url'] ?>"/>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        @endlayout
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('image')
            <div class="flex justify-center my-4">
                <img src=" @sub('image', 'url')"></img>
            </div>
        @endlayout
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('testimonials')
            @include('partials.testimonials')
        @endlayout
        @layout('video_testimonials')
            @include('partials.video-testimonials')
        @endlayout
        @layout('yellow_box')
            @include('sections.yellow-box')
        @endlayout
        @layout('modal_form')
           @include('partials.modal')
        @endlayout
        @layout('limited_offer')
           @include('sections.limited-offer')
        @endlayout
        @layout('faq_section')
            @include('blocks.faq-blocks')
        @endlayout
    @endlayouts
    </div>
</section> 