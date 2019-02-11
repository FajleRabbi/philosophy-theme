<?php
do_action("philosophy_category_page", single_cat_title('', false));
get_header(); ?>

<!-- s-content
================================================== -->
<section class="s-content">
    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <?php echo apply_filters("philosophy_text", "hello", "wonderfull", "world"); ?>
            <?php do_action("philosophy_before_category_title"); ?>
            <h2><?php _e("new translatable text", "philosophy"); ?></h2>
            <h1> 
                <?php
                    _e("Category:", "philosophy");
                    single_cat_title(); 
                ?>
            </h1>
	        <?php do_action("philosophy_after_category_title"); ?>

	        <?php do_action("philosophy_before_category_description"); ?>
            <p class="lead">
                <?php echo category_description(); ?>
            </p>
	        <?php do_action("philosophy_after_category_description"); ?>
        </div>
    </div>

	<div class="row masonry-wrap">
        <div class="nopost-wrapper text-center">
			<?php
			if(!have_posts()){ ?>
                <h1><?php _e("There is no post in this category. 😭", "philosophy"); ?></h1>
			<?php }
			?>
        </div>
		<div class="masonry">

			<div class="grid-sizer"></div>
			<?php
                
                while(have_posts()){
                    the_post();
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