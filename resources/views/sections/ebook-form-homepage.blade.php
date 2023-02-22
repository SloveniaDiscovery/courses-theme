<section class="bg-lightYellow my-14 mx-auto max-w-4xl rounded-xl homepage--second-ebook">
    <div class="flex flex-wrap">
        <div class="md:!w-1/2 w-full md:!mb-0 mb-10 flex justify-center pt-6 sm:py-6">
            <img class="object-contain" src="@sub('form_image','url')"></img>
        </div>
        <div class="md:!w-1/2 w-full md:!mb-0 mb-10 items-center inline-flex sm:py-10">
            <div class="sm:w-full px-4 sm:pr-10">
                <p class="!mb-0 text-darkOrange font-semibold">
                    @sub('form_subtitle')
                </p>
                <h1 class="font-bold mt-3">
                    @sub('form_title')
                </h1>
                <p class="text-black font-normal md:text-xl text-base mt-3 mb-4">
                    @sub('form_content')
                </p>
                <div>
                <?php $newsletter_form_shortcode = get_sub_field('form_shortcode'); echo do_shortcode($newsletter_form_shortcode)?>
                </div>
            </div>
        </div>
    </div>
</section>