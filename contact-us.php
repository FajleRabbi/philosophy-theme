<?php
/**
 * Template Name: Contact Us Page
 */
the_post();
get_header(); ?>
<!-- s-content
================================================== -->
<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title(); ?>
            </h1>
        </div> <!-- end s-content__header -->
        
        <?php if(is_active_sidebar("contact-info")) : ?>
            <div class="s-content__media col-full">
                <?php dynamic_sidebar("contact-maps"); ?>
            </div> <!-- end s-content__media -->
        <?php endif; ?>
        <div class="col-full s-content__main">

            <?php the_content(); ?>

            <?php if(is_active_sidebar("contact-info")) : ?>
                <div class="row">
                    <?php dynamic_sidebar("contact-info"); ?>
                </div> <!-- end row -->
            <?php endif; ?>

            <h3><?php _e("Say Hello.", "philosophy"); ?></h3>

            <?php
                if(get_field("contact_form_shortcode")){
                    echo do_shortcode(get_field("contact_form_shortcode"));
                }
            ?>


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->


<?php get_footer(); ?>