<?php

/**
 * Template Name: Featured Books
 */

get_header(); ?>

<!-- s-content
================================================== -->
<section class="s-content">

	<div class="row masonry-wrap">
		<div class="masonry">

			<div class="grid-sizer"></div>
            <?php
                $philosophy_f_arguments = array(
                    'post_type' => 'book',
                    'meta_key' => 'is_featured',
                    'meta_value' => true,
                    'posts_per_page' => 3
                );
                $philosophy_f_books = new WP_Query($philosophy_f_arguments);
            ?>

			<?php
                while( $philosophy_f_books->have_posts()){
	                $philosophy_f_books->the_post();
                    get_template_part("template-parts/post-formats/post", get_post_format());
                }
            ?>

		</div> <!-- end masonry -->
	</div> <!-- end masonry-wrap -->

<!--    post paginations-->
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php philosophy_pagination(); ?>
            </nav>
        </div>
    </div>

</section> <!-- s-content -->

<?php get_footer(); ?>