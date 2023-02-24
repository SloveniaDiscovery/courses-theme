<?php 
/* Flexible content used for pages, rendering fields on front-end 
*   use @layout from app/Blocks/FlexiblePage.php, get subfields as @sub 
*/ 
?>
@if(is_page_template( 'template-author.blade.php' )) 
    @include('sections.author-content')
@elseif(is_page_template( 'template-reviews.blade.php'))
@layouts('page_section')
    @layout('testimonials')
    <div class="max-w-contentwidth m-auto mb-12">
        @include('partials.testimonials')
    </div>
    @endlayout
@endlayouts
@elseif(is_page_template( 'template-ebook.blade.php'))
@layouts('page_section')
@include('partials.ebook-form')
@endlayouts
@endif