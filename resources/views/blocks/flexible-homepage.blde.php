@layouts('homepage_sections')
    @layout('banner')
      @include('partials.ebook-form')
      <section class="py-10 ">
        <div class=" mx-auto container">
            @include('partials.products-homepage')
        </div>
      </section>
    @endlayout
@endlayouts
<section class="mx-auto container my-10 justify-center">
  <div class="max-w-contentwidth m-auto">
      @layouts('homepage_sections')
        <!-- @layout('about_me')
          <div class="flex items-center mb-10">
            <img class="h-20 mr-4 rounded-full" src="@sub('homepage_author_round_image', 'url')"></img>
            <div class="text-black text-5xl font-normal">
              @sub('homepage_heading_h2')
            </div>
          </div>
        @endlayout -->
        @layout('expert_info')
          <div class="my-8">
            @include('partials.expert-info')
          </div>
        @endlayout
        @layout('text_content')
          <div class="my-8">
            @sub('homepage_text')
          </div>
          @endlayout
        @layout('button')
          <div class="my-12 h-14 flex justify-end">
              <a href="@sub('button_link', 'url')" class="bg-primary hover:bg-darkOrange text-white font-bold p-4 px-8 rounded-xl no-underline uppercase">
                  @sub('button_text')
              </a>
          </div>
        @endlayout
        @layout('heading_h2')
          <div class="text-black text-5xl font-normal mb-10">
            @sub('homepage_heading_h2')
          </div>
        @endlayout
        @layout('image')
          <div class="flex justify-center my-4">
            <img src=" @sub('homepage_image', 'url')"></img>
          </div>
        @endlayout
        @layout('testimonials')
          @include('partials.testimonials')
        @endlayout
    @endlayouts
  </div>
</section>
@layouts('homepage_sections')
  @layout('form')
    @include('sections.ebook-form-homepage')
  @endlayout
@endlayouts