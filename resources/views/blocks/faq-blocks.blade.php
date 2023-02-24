<?php 
/* WP query for getting FAQs (custom post type) 
*   use @layout from app/Blocks/FAQBlocks.php, get subfields as @sub 
*/

$args = array(
    'posts_per_page'   => -1,
    'post_type'     => 'faq',
);

$post_objects = new WP_Query( $args );
?>

<section class="mx-auto container my-12">
    <div class="max-w-contentwidth m-auto">
      
    <?php if( $post_objects->have_posts() ): ?>
        <?php while( $post_objects->have_posts() ) : $post_objects->the_post(); ?>
        <?php 
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $product_url = get_field('faq_product_category');
        if (str_contains($url, $product_url) == true)  { ?>
          <h2 class="text-4xl justify-center flex">Frequently Asked Questions</h2>
        @layouts('question_answer')
        @layout('question_&_answer')
            <div class="mb-4 border-solid border-black relative border-2 bg-white w-full rounded-xl	" x-data="{ open: false }">
                <button class="flex text-left p-4 pr-8 w-full font-semibold text-xl items-center" @click="open = ! open">
                    <div :class="open ? 'font-bold' : ''" >
                        @sub('faq_question')
                    </div>
                    <div class="absolute right-2" :class="open ? 'rotate-90' : ''" > 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <g>
                    <path d="M8.58984 16.7563L13.1698 12.1428L8.58984 7.52943L9.99984 6.11224L15.9998 12.1428L9.99984 18.1735L8.58984 16.7563Z" fill="black"/>
                    </g>
                    <defs>
                    <clipPath >
                    <rect width="24.1224" height="24" fill="white" transform="translate(0 24.2041) rotate(-90)"/>
                    </clipPath>
                    </defs>
                    </svg>
                    </div>
                </button>
                <div class="pt-0 p-4 pr-7 text-lg" x-show="open"> 
                    @sub('faq_answer')
                </div>
            </div>
        @endlayout
        @endlayouts
        <?php } else {
            echo '';
        } ?>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
</section>

<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
