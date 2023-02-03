<section class="h-64 w-full relative flex items-end justify-center">
    <?php global $post; ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <?php if  ( ! empty( $image ) ) {  ?>
      <div class="w-full h-full bg-no-repeat bg-cover page-banner" style="background-image: url('<?php echo $image[0]; ?>')"></div>
      <div class="meta-description absolute container flex flex-col text-white">
        <h1 class="text-white font-semibold mb-10"><?php the_title(); ?></h1>
      </div>
    <?php  } else { ?> 
      <div class="w-full h-full bg-no-repeat bg-cover page-banner" style="background-color: #FAFAFA;"></div>
      <div class="meta-description absolute container flex flex-col text-white">
        <h1 class="text-black font-semibold mb-10"><?php the_title(); ?></h1>
      </div>
    <?php } ?>
</section>