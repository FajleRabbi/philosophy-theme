<?php
    $audio = get_field("media_src");
?>

<article <?php  post_class('masonry__brick entry format-audio'); ?> data-aos="fade-up">

	<div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
			<?php the_post_thumbnail("philosohpy-home-square"); ?>
        </a>
		<div class="audio-wrap">
			<audio id="player" src="<?php echo esc_url($audio); ?>" width="100%" height="42" controls="controls"></audio>
		</div>
	</div>

	<?php get_template_part("template-parts/common/post/summery"); ?>

</article> <!-- end article -->