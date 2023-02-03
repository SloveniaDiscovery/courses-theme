<div class="shadow rounded p-4 md:p-8">
    <div class=" mx-auto flex flex-col items-center w-fit  align-center">
        <div class="flex items-center mb-2 object-cover">
            @layouts('image_box')
                @layout('award_image')
                    <img class=" h-20 mr-4" src="@sub('image', 'url')"></img>
                @endlayout
                @layout('satisfied_customers')
                    @include('partials.satisfied-customers')
                @endlayout
            @endlayouts
        </div>
        <div class="flex items-center object-cover">
            @layouts('image_box')
                @layout('review_image')
                    <img class=" h-12" src="@sub('image', 'url')"></img>
                @endlayout
            @endlayouts
        </div>
    </div>
</div>