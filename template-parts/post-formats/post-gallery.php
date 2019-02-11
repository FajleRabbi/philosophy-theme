<article <?php  post_class('masonry__brick entry format-gallery'); ?> data-aos="fade-up">
    <?php
        $gallery = get_post_gallery(get_the_ID(), false);
    ?>
	<div class="entry__thumb slider">
		<div class="slider__slides">


            <?php
            if(!empty($gallery)) {
	            foreach ( $gallery['src'] as $src ) { ?>
                    <div class="slider__slide">
                        <img src="<?php echo esc_url( $src ); ?>">
                    </div>
	            <?php }
            }else{ ?>
                <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
		            <?php the_post_thumbnail("philosohpy-home-square"); ?>
                </a>
            <?php }
            ?>

		</div>
	</div>

	<?php get_template_part("template-parts/common/post/summery"); ?>

</article> <!-- end article -->