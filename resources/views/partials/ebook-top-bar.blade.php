<section class="h-12 w-full relative top-0 flex justify-center flex-row items-center bg-lightOrange">
        {{$ebookTopBar}} 
        <?php $button_url = $homepageButtonLink['url']; ?>
        <a href="<?php echo esc_url($button_url); ?>" class="bg-darkOrange hover:bg-hoverOrange text-white font-semibold p-1 px-4 ml-4 text-base rounded-[4px] flex items-center">
            {{$ebookTopBarButton}}
        </a>
</section>