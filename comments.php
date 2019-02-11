<?php
require_once( 'class-wp-bootstrap-comment-walker.php' );
?>

<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2">
				<?php
				$philsophy_cn = get_comments_number();
				if ( $philsophy_cn <= 1 ) {
					_e( $philsophy_cn . " Comment", "philosophy" );
				} else {
					_e( $philsophy_cn . " Comments", "philosophy" );
				}
				?>
            </h3>

            <!-- commentlist -->
            <ol class="commentlist">

				<?php
				wp_list_comments( array(
					'walker'     => new Bootstrap_Comment_Walker(),
					'max_depth'  => 10,
					'style'      => 'ol',
					'reply_text' => 'Reply',
				) );
				?>

            </ol> <!-- end commentlist -->
            <div class="comments-pagination">
				<?php
				the_comments_pagination( array(
					'screen_reader_text' => __( "Comments Pagination", "philosophy" ),
					'prev_text'          => __( "Previous Comment", "philosophy" ),
					'next_text'          => __( "Nex Comment", "philosophy" ),
				) );
				?>
            </div>

            <!-- respond
			================================================== -->
            <div class="respond">

                <h3 class="h2">
					<?php _e( "Add Comment", "philosophy" ); ?>
                </h3>

                <?php
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );

				$fields =  array(

                      'author' =>
                        '<div class="form-field"><input class="full-width" placeholder="Your Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                        '" size="30"' . $aria_req . ' /></div>',

                      'email' =>
                        '<div class="form-field"><input class="full-width" placeholder="Your Email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                        '" size="30"' . $aria_req . ' /></div>',

                      'url' =>
                        '<div class="form-field"><input class="full-width" placeholder="Website" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                        '" size="30" /></div>',
                    );

				$comments_args = array(
					// change the title of send button
					'label_submit'=>'Submit',
					'class_submit' => 'submit btn--primary btn--large full-width',
					'title_reply'=> null,
					'fields' => $fields,
					'comment_field' => '<div class="message form-field"><textarea id="comment cMessage" name="comment" class="full-width" placeholder="Your Message" aria-required="true"></textarea></div>',
				);
					comment_form($comments_args);
				?>

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->