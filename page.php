<?php
the_post();
get_header();
?>

    <!-- s-content
	================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
					<?php the_title(); ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php the_date(); ?></li>
                    <li class="cat">
                        In
						<?php
						// the_category(" ");
						echo get_the_category_list( " " );
						?>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">

                <div class="s-content__post-thumb">

					<?php the_post_thumbnail( 'large' ); ?>

                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">
				<?php
				the_content();
				wp_link_pages();

				if ( get_post_meta( get_the_ID(), 'philosophy_page_metabox', true ) ) {
					$philosophy_page_meta = get_post_meta( get_the_ID(), 'philosophy_page_metabox', true );
				} else {
					$philosophy_page_meta = array();
				}

				if ( array_key_exists( 'page-heading', $philosophy_page_meta ) ) {
					echo esc_html( $philosophy_page_meta['page-heading'] ) . "<br>";
				}

				if ( array_key_exists( 'page-teaser', $philosophy_page_meta ) ) {
					echo esc_html( $philosophy_page_meta['page-teaser'] ) . "<br>";
				}

				if ( array_key_exists( 'is-favorite', $philosophy_page_meta ) ) {
					if ( $philosophy_page_meta['is-favorite'] ) {
						echo $philosophy_page_meta['favorite-text'];
					}
				}


				if ( array_key_exists( 'upload_file', $philosophy_page_meta ) ) {
					echo $philosophy_page_meta['upload_file'] . "<br>";
				}

				if ( array_key_exists( 'upload_image', $philosophy_page_meta ) ) {
					echo wp_get_attachment_image( $philosophy_page_meta['upload_image'], 'medium' ). '<br>';
				}

				if($philosophy_page_meta['upload_gallery']){
				    $philosophy_gallery_ids = explode(",", $philosophy_page_meta['upload_gallery']);
					foreach ( $philosophy_gallery_ids as $philosophy_gallery_id ) {
						echo wp_get_attachment_image( $philosophy_gallery_id, 'medium' ). "<br>";
				    }
                }

                echo "<pre>";
				print_r($philosophy_page_meta['opt-fieldset-1']['opt-text']);
                echo "</pre>";


				?>
                <p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                    <?php
                    // the_tags();
                    echo get_the_tag_list();
                    ?>
                </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
					<?php echo get_avatar( get_the_author_meta( "ID" ) ); ?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ); ?>">
								<?php the_author(); ?>
                            </a>
                        </h4>

                        <p><?php the_author_meta( "description" ); ?></p>

						<?php
						$philosophy_user_facebook  = get_field( "facebook", "user_" . get_the_author_meta( "ID" ) );
						$philosophy_user_twitter   = get_field( "twitter", "user_" . get_the_author_meta( "ID" ) );
						$philosophy_user_instagram = get_field( "instagram", "user_" . get_the_author_meta( "ID" ) );
						?>
                        <ul class="s-content__author-social">
							<?php if ( $philosophy_user_facebook ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $philosophy_user_facebook ); ?>">
										<?php _e( "Facebook", "philosophy" ); ?>
                                    </a>
                                </li>
							<?php endif; ?>
							<?php if ( $philosophy_user_twitter ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $philosophy_user_twitter ); ?>">
										<?php _e( "Twitter", "philosophy" ); ?>
                                    </a>
                                </li>
							<?php endif; ?>
							<?php if ( $philosophy_user_instagram ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $philosophy_user_instagram ); ?>">
										<?php _e( "Instagram", "philosophy" ); ?>
                                    </a>
                                </li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
						<?php
						$philosophy_prev_post = get_previous_post();
						$philosophy_next_post = get_next_post();
						?>
						<?php if ( $philosophy_prev_post ) : ?>
                            <div class="s-content__prev">
                                <a href="<?php echo get_the_permalink( $philosophy_prev_post ); ?>" rel="prev">
                                    <span><?php _e( "Previous Post", "philosophy" ); ?></span>
									<?php echo get_the_title( $philosophy_prev_post ); ?>
                                </a>
                            </div>
						<?php endif; ?>
                        <div class="s-content__next">
                            <a href="<?php echo get_the_permalink( $philosophy_next_post ); ?>" rel="next">
                                <span><?php _e( "Next Post", "philosophy" ); ?></span>
								<?php echo get_the_title( $philosophy_next_post ); ?>
                            </a>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
		================================================== -->
		<?php
		if ( ! post_password_required() ) {
			comments_template();
		}
		?>

    </section> <!-- s-content -->


<?php get_footer(); ?>