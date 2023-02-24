<?php 
/** WP QUERY FOR SHOWING SALES PAGES ON HOMEPAGE -> Optin pages */
// args
$args = array(
    'posts_per_page'   => -1,
    'post_type'     => array('wffn_landing', 'wffn_optin'),
    'category_name' => 'homepage',
);


// query
$post_objects = new WP_Query( $args );
?>
<div class="grid-cols-1 sm:grid-cols-2 lg:!grid-cols-3 gap-4 grid w-full">

<?php if( $post_objects->have_posts() ): ?>
    <?php while( $post_objects->have_posts() ) : $post_objects->the_post(); ?>
            <div class="shadow rounded-lg h-fit	">
                <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');?>
                <img class="w-full object-cover rounded-tl-lg rounded-tr-lg h-52" src="<?php echo $featured_image[0] ?>">
                <div class="product-card p-4">
                    <a href="<?php the_permalink(); ?>">
                        <div class="text-xl font-semibold"> <?php the_title(); ?></div>
                    </a>
                    <?php the_content() ?>
                    <div class="flex justify-end">
                        <a href="<?php the_permalink(); ?>" class="bg-darkOrange hover:bg-hoverOrange text-white font-semibold py-[9px] pr-[12px] pl-[20px] text-base rounded-[3px] flex">
                            MORE
                            <img class="h-6" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/arrow-small-right-white.svg' )); ?>"></img>
                        </a>
                    </div>
                </div>
            </div>
    <?php endwhile; ?>
<?php endif; ?>
</div>

<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>