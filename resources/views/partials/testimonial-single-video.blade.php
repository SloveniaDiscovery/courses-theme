<?php 
/** SINGLE TESTIMONIALS FIELDS - VIDEO TESTIMONIALS*/
$testimonial_name = get_field('testimonial_name', $testimonial);
$testimonial_image = get_field('testimonial_image', $testimonial);
$testimonial_video_image = get_field('testimonial_video_image', $testimonial);
$testimonial_headline = get_field('testimonial_headline', $testimonial);
$testimonial_link = get_field('testimonial_link', $testimonial);
$iframe = get_field('embed_video_link', $testimonial);
$iframe_block = get_field('video_iframe_block', $testimonial);
?>
<!-- SINGLE TESTIMONIAL VIEW - CARDS-->
<div class="relative mb-0 md:mb-12">
    <div class="video-testimonial shadow rounded-lg relative" style="background-image: url('<?php echo $testimonial_video_image['url']; ?>'); ">
        <div class="p-6 video-background rounded-lg">
            <div class="flex relative mb-5 items-start w-full ">
                @if($testimonial_image)
                <img class="rounded-full mr-2 h-14 w-14 object-cover" src="<?php echo $testimonial_image['url']; ?>">
                @else
                <img class="rounded-full mr-2 h-14 w-14 object-cover" src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/avatar.jpeg' ) ); ?>">
                @endif
                <div>
                    <span class="font-semibold w-max text-[24px]"><?php echo $testimonial_name; ?></span>
                    <div class="fill-primary flex h-4">
                        @for ($i = 0; $i <= 4; $i++)
                        <div class="mr-0.5 h-full !fill-white">
                            @include('icons.rating-star') 
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        @if($testimonial_headline)
        <div class="p-4 video-testimonial-head absolute bottom-0">
            <p class="!leading-[2] font-bold rotate-[-1deg] max-w-[75%]">
                <span class="bg-white p-[6px] shadow-[1.5px_1.5pxpx_-2px_0_rgba(0,0,0,0.4)]"><?php echo $testimonial_headline ?></span>
            </p>
        </div>
        @endif
    </div>
    @if($iframe_block)
    <div class="inline-video absolute top-0 w-full h-[350px]">
        <div class="absolute top-0 w-full h-full flex justify-center items-center">
            <button class="play-video">
                <img src="<?php echo esc_url( get_theme_file_uri( '/resources/assets/images/play.svg' ) ); ?>" alt="Play video">
            </button>
        </div>
        <div class="testim-video" class="w-full h-full">
        <?php
            // // Use preg_match to find iframe src.
            // preg_match('/src="(.+?)"/', $iframe, $matches);
            // $src = $matches[0];

            // // Add extra parameters to src and replace HTML.
            // $params = array(
            //     'controls'  => 1,
            //     'hd'        => 1,
            //     'autohide'  => 1,
            //     'fs'        => 0,
            //     'rel'        => 0,
            //     'modestbranding' => 0,
			// 	'autoplay' => 0,
            //     'byline' => 0,
            //     'title' => 0,
            //     'portrait' => 0,
            //     'width' => 390
            // );
            // $new_src = add_query_arg($params, $src);
            // $iframe = str_replace($src, $new_src, $iframe);

            // // Add extra attributes to iframe HTML.
            // $attributes = 'frameborder="0"';
            // $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

            // // Display customized HTML.
            // echo $iframe;
        ?>
            <div style="padding:100% 0 0 0;position:relative;">
                <iframe src="https://player.vimeo.com/video/<?php echo $iframe_block; ?>?h=715d9e2429&amp;badge=0&amp;autopause=0;autoplay=0&amp;player_id=0&amp;app_id=58479" 
                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen 
                    style="position:absolute;top:0;left:0;width:100%;height:100%;" 
                    title="<?php echo $testimonial_headline ?>">
                </iframe>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
$(".testim-video").hide();
$(function(){

    $(".play-video").click(function(){
        $(this).hide();
        let show_video = $(this).parent().parent().find($(".testim-video"));
        show_video.show();
        let element = $(this).parent().parent().find($('iframe')).attr('src');
        element = element.replace("autoplay=0", "autoplay=1");
        $(this).parent().parent().find($('iframe')).attr('src', element);

    });
});
</script>
