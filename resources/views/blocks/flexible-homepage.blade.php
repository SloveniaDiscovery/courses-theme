@layouts('homepage_sections')
    @layout('banner')
      @include('partials.ebook-form')
    @endlayout

<section class="container my-10 justify-center">
  @layout('products_grid')
      @include('partials.products-homepage')
  @endlayout
  @layout('shadow_box')
  <div class="max-w-contentwidth m-auto my-12">
      <div class="hp-logos px-2 sm:px-8 py-4">
        @hassub('box_image')
          <img class="mx-auto" src="@sub('box_image', 'url')"></img>
        @endsub
        @hassub('text_content')
          <div class="py-5 text-center">
            @sub('text_content')
          </div>
        @endsub
      </div>
  </div>
  </div>
  @endlayout
  @layout('expert_info')
    <div class="max-w-contentwidth m-auto">
      <div class="my-8">
        @include('partials.expert-info')
      </div>
    </div>
  @endlayout
  @layout('text_content')
    <div class="max-w-contentwidth m-auto">
      <div class="my-8">
        @sub('homepage_text')
      </div>
    </div>
  @endlayout
  @layout('button')
    <div class="max-w-contentwidth m-auto">
      @include('partials.center-aligned-button')
    </div>
  @endlayout
  @layout('heading')
    <div class="max-w-contentwidth m-auto">
        @sub('heading')
    </div>
  @endlayout
  @layout('image')
    <div class="flex justify-center my-4">
      <img class="max-w-[500px] " src="@sub('homepage_image', 'url')"></img>
    </div>
  @endlayout
  @layout('testimonials')
    <div class="max-w-contentwidth m-auto">
      @include('partials.testimonials')
    </div>
  @endlayout
  @layout('form')
    @include('sections.ebook-form-homepage')
  @endlayout
</section>
@endlayouts
