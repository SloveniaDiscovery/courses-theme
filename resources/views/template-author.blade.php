{{--
  Template Name: Author
--}}

@extends('layouts.app')
@include('sections.top-bar-sales-white')

<section class="h-64 w-full relative flex items-end justify-center">
    <?php global $post; ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <div class="w-full h-full bg-no-repeat bg-cover" style="background-image: url('<?php echo $image[0]; ?>')"></div>
    <div class="meta-description absolute container flex flex-col text-white">
      <h1 class="text-white font-bold mb-10"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
</section>

@include('blocks.flexible-page')


@include('sections.footer')