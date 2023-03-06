<section class="h-[300px] w-full relative flex items-end justify-center">
    <?php global $post; ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <?php if  ( ! empty( $image ) ) {  ?>
      <div class="w-full h-full bg-no-repeat bg-cover page-banner" style="background-image: url('<?php echo $image[0]; ?>')"></div>
    <?php  } else { ?>
      <div class="w-full h-full bg-no-repeat bg-cover page-banner" style="background-color: #FAFAFA;"></div>
    <?php } ?>
      <div class="meta-description absolute max-w-pageWidth container text-white">
        <h1 class="text-white font-semibold"><?php the_title(); ?></h1>
        <p class="font-semibold"><?php the_content(); ?></p>
      </div>
</section>