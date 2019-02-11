
<?php
    $video_src = get_field("media_src");
?>
<article <?php  post_class('masonry__brick entry format-video'); ?> data-aos="fade-up">
	<div class="entry__thumb video-image">

		<a href="<?php echo esc_url($video_src); ?>" data-lity>
				<?php the_post_thumbnail("philosohpy-home-square"); ?>
		</a>

	</div>

	<?php get_template_part("template-parts/common/post/summery"); ?>

</article> <!-- end article -->
