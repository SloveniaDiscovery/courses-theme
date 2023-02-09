<section class="flex container my-16 flex-col md:flex-row">
    <div x-ref="leftDiv" x-data="{  headings: Array.from(document.getElementById('content').querySelectorAll('h2, h3, h4')), prevOffset: window.pageYOffset,
        top:$refs.quicklinks.offsetTop - window.pageYOffset, 
        initialPosition: 200,
        bottomDiv:$refs.leftDiv.offsetTop - window.pageYOffset + $refs.leftDiv.offsetHeight - this.innerHeight,
        bottom: $refs.quicklinks.offsetTop - window.pageYOffset + $refs.quicklinks.offsetHeight - this.innerHeight,
        offset: 0,}" x-init="
        width = window.innerWidth;
        if (width < 1024) {
            headings[0].previousElementSibling.append($refs.leftDiv);
        };
        " class="md:!w-1/3 mb-5" :class="headings[0] ? 'md:pr-6':'!hidden'">
        @include('partials.sidebar-links')
    </div>
  
    <div class="md:!w-2/3 max-w-contentwidth">
    @layouts('page_section')
        @layout('text_block')
        <div class="mb-12 text-default" id="content">
            @sub('text_content')
        </div>
        @endlayout
        @layout('image')
            <div class="flex justify-center my-4">
                <img src=" @sub('image', 'url')"></img>
            </div>
        @endlayout
    @endlayouts
    </div>
</section>
@layouts('page_section')
  @layout('ebook-form') 
<section class="flex w-full h-auto md:h-[60vh] items-start flex-col md:flex-row">
  <div class="w-full md:w-1/2 flex justify-end items-center h-[45vh] relative">

  @hassub('image')
    <img class="h-[35vh] md:h-full md:mr-16 m-auto z-10" src="@sub('image', 'url')"></img>
    @endsub
  
    <div class="absolute bg-lightOrange w-full h-[40vh] z-o"></div>
  </div>
  <div class="w-full md:w-1/2 xl:w-1/3 h-full p-4 md:p-0 md:pl-10">
    
    @hassub('headline')
        @sub('headline')
        @endsub
        @hassub('signature')
        <img class="w-44 mb-4" src="@sub('signature', 'url')"></img>
        @endsub
        @hassub('form_shortcode')
        <?php $form_shortcode = get_sub_field('form_shortcode'); echo do_shortcode($form_shortcode) ?>
        @endsub
        
  </div>
</section>
    @endlayout
    @endlayouts