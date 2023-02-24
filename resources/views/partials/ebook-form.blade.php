<!-- E-BOOK BANNER WITH FORM  -->
<section class="bg-lightOrange md:py-20 py-10 rounded-bl-[15%] rounded-br-[15%]">
    <div class="flex flex-wrap mx-auto container">
        <div class="md:!w-1/2 w-full md:!mb-0 mb-10">
        <img class="w-full" src="@sub('banner_image', 'url')"></img>

        </div>
        <div class="md:!w-1/2 w-full md:!mb-0 mb-10 items-center inline-flex">
            <div class="w-full sm:pl-16">
                <?php if (is_page( 'E-book' )):?>
                <p class="!text-base mb-3"> @sub('banner_small_text')</p>
                <?php endif; ?>
                <p class="!mb-0 text-darkOrange font-semibold">
                    @sub('banner_subtitle')
                </p>
                <h1 class="font-bold text-black mt-3">
                    @sub('banner_title')
                </h1>
                <p class="text-black font-normal md:text-xl text-base mt-3 mb-4">
                    @sub('banner_short_description')
                </p>
                <div>
                <?php $form_shortcode = get_sub_field('banner_form_shortcode');
                 echo do_shortcode($form_shortcode)?>
                </div>
            </div>
        </div>
    </div>
</section>