<section class="bg-lightYellow my-14 mx-auto max-w-4xl rounded-xl homepage--second-ebook">
    <div class="flex flex-wrap">
        <div class="md:!w-1/2 w-full md:!mb-0 mb-10 flex justify-center pt-6 sm:py-6">
            <!-- <img src="@sub('form_image','url')"></img> -->
            <img class="w-auto object-contain" src="{{$newsletterFormImage}}"></img>
        </div>
        <div class="md:!w-1/2 w-full md:!mb-0 mb-10 items-center inline-flex sm:py-10">
            <div class="w-full px-4 sm:pr-10">
                <h2 class="!mb-0 md:!text-2xl !text-xl font-semibold text-darkOrange">{{$firstTextHome}}</h2>
                <h1 class="md:!text-[64px] !text-4xl font-semibold text-primary mt-3">{!! $secondTextHome !!}</h1>
                <div class="text-black font-normal md:text-xl !text-base mt-3 mb-4">{{$thirdTextHome}}</div>
                <div>
               
                <!-- <h1 class="md:!text-[64px] text-5xl font-semibold text-primary mt-3">
                    @sub('form_title')
                </h1>
                <div class="text-black font-normal md:text-xl text-base mt-3 mb-4">
                    @sub('form_content')
                </div> -->
                <div>
                <?php $form_shortcode = $formShortcodeHome; echo do_shortcode($form_shortcode)?>      
                </div>
            </div>
        </div>
    </div>
</section>