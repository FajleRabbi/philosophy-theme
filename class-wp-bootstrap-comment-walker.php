<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 4 Media object in wordpress comment list.
 *
 * @package     WP Bootstrap 4 Comment Walker
 * @version     1.0.0
 * @author      Aymene Bourafai <bourafai.a@gmail.com> <www.aymenebourafai.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/bourafai/wp-bootstrap-4-comment-walker
 * @link        https://v4-alpha.getbootstrap.com/layout/media-object/
 */

class Bootstrap_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment the comments list.
	 * @param int $depth Depth of comments.
	 * @param array $args An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
		?>
        <<?php echo wp_kses_post($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'thread-alt media' : ' media depth-1 comment' ); ?>>

        <div class="comment__avatar">
            <a href="<?php echo get_comment_author_url(); ?>">
				<?php echo get_avatar( $comment, $args['avatar_size'], 'mm', '', array( 'class' => "comment_avatar rounded-circle" ) ); ?>
            </a>
        </div>
        <div class="comment__content">
            <div class="comment__info">
                <cite><?php echo get_comment_author_link() ?></cite>

                <div class="comment__meta">
                    <time class="comment__time"><?php comment_date(); ?> @ <?php comment_time(); ?></time>
                    <?php
                    edit_comment_link( __( 'Edit', 'philosophy' ), ' ', ' ' );
					comment_reply_link( array_merge( $args, array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '',
						'after'     => ''
					) ) );
					?>
                </div>
            </div>
			<?php comment_text(); ?>
        </div><!-- .comment-content -->

		<?php
	}
}