<section class="max-w-pageWidth m-auto p-4 my-12">
@layouts('thankyou_sections')
    @layout('heading')
        @sub('heading')
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
