<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

	<!--- basic page needs
	================================================== -->
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- mobile specific metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>

<!-- pageheader
================================================== -->
<section class="s-pageheader <?php echo apply_filters("philosophy_home_banner_class", "s-pageheader--home"); ?>">

	<header class="header">
		<div class="header__content row">

			<div class="header__logo">
				<?php
                    if(has_custom_logo()){
                        the_custom_logo();
                    }else{ ?>
                        <span>
                            <a href="<?php echo home_url("/"); ?>">
                                <?php bloginfo("name"); ?>
                            </a>
                        </span>
                <?php }
                ?>
			</div> <!-- end header__logo -->

			<ul class="header__social">
                <?php 
                    if(get_theme_mod("philosophy_header_fb_url")){ ?>
                        <li>
                            <a href="<?php echo esc_url(get_theme_mod("philosophy_header_fb_url")); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                    <?php }

                    if(get_theme_mod("philosophy_header_twitter_url")){ ?>
                        <li>
                            <a href="<?php echo esc_url(get_theme_mod("philosophy_header_twitter_url")); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                    <?php }

                    if(get_theme_mod("philosophy_header_instagram_url")){ ?>
                        <li>
                            <a href="<?php echo esc_url(get_theme_mod("philosophy_header_instagram_url")); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    <?php }

                    if(get_theme_mod("philosophy_header_pinterest_url")){ ?>
                        <li>
                            <a href="<?php echo esc_url(get_theme_mod("philosophy_header_pinterest_url")); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </li>
                    <?php }
                ?>
			</ul> <!-- end header__social -->

			<a class="header__search-trigger" href="#0"></a>

			<div class="header__search">

				<?php get_search_form(); ?>

				<a href="#0" title="Close Search" class="header__overlay-close">Close</a>

			</div>  <!-- end header__search -->


			<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            <?php get_template_part("template-parts/common/navigation"); ?>

		</div> <!-- header-content -->
	</header> <!-- header -->


    <?php
    if(is_home()){
	    get_template_part("template-parts/blog-home/feature");
    }

    ?>

</section> <!-- end s-pageheader -->
