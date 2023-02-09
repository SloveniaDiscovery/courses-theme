<section class="max-w-pageWidth m-auto p-4 mb-12">
@layouts('thankyou_sections')
    @layout('headline')
        <h1 class="mt-20 mb-10 text-4xl font-bold">
            @sub('headline')
        </h1>
    @endlayout
    @layout('content')
        <div class="my-10">
            @sub('text')
        </div>
    @endlayout
    @layout('button')
        <a href="@sub('button_link', 'url')" class="bg-primary hover:bg-hover text-white font-bold p-4 rounded no-underline">
            @sub('button_text')
        </a>
    @endlayout
    @layout('image')
        <div class="my-4">
            <img src="@sub('image', 'url')"></img>
        </div>
    @endlayout
@endlayouts
</section>
