<?php
require_once( get_theme_file_path( "/inc/tgm.php" ) );
require_once( get_theme_file_path( "/inc/customizer.php" ) );
require_once( get_theme_file_path( "/inc/cmb2-attached-posts.php" ) );
require_once( get_theme_file_path( "/lib/csf/cs-framework.php" ) );
require_once( get_theme_file_path( "/inc/cs.php" ) );

if ( ! isset( $content_width ) ) {
	$content_width = 960;
}
if ( site_url() == "http://hasinwith.wp.com/" ) {
	define( "VERSION", time() );
} else {
	define( "VERSION", wp_get_theme()->get( "Version" ) );
}

// Action Hooks
function philosophy_after_setup_theme() {
	load_theme_textdomain( "philosophy", get_theme_file_path( "/languages" ) );

	add_theme_support( "post-thumbnails" );
	add_theme_support( "title-tag" );
	add_theme_support( "custom-logo" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "html5", array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( "post-formats", array( 'audio', 'video', 'image', 'quote', 'link', 'gallery' ) );
	add_editor_style( "/assets/css/editor-style.css" );
	add_image_size( "philosohpy-home-square", 400, 400, true );

	register_nav_menu( "topmenu", __( 'Top Menu', 'philosophy' ) );
	register_nav_menus( array(
		'footer-left'   => __( "Footer Left", "philosophy" ),
		'footer-middle' => __( "Footer Middle", "philosophy" ),
		'footer-right'  => __( "Footer right", "philosophy" ),
	) );

}

add_action( "after_setup_theme", "philosophy_after_setup_theme" );


function philosophy_assets() {
	wp_enqueue_style( "font-awesome", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.min.css" ), null, "4.2.0" );
	wp_enqueue_style( "fonts", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.0" );
	wp_enqueue_style( "base", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
	wp_enqueue_style( "vendor", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
	wp_enqueue_style( "main", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
	wp_enqueue_style( "philosophy-style", get_stylesheet_uri(), null, VERSION );

	wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
	wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
	wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), VERSION, true );


}

add_action( "wp_enqueue_scripts", "philosophy_assets" );


function philosophy_init() {
	register_sidebar( array(
		'name'          => __( 'About Us Page', 'philosophy' ),
		'id'            => 'about-us',
		'description'   => __( 'Widgets in this area will be shown on about us page', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contact Us Google Maps', 'philosophy' ),
		'id'            => 'contact-maps',
		'description'   => __( 'Widgets in this area will be shown on contact page google maps', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Contact Us Info', 'philosophy' ),
		'id'            => 'contact-info',
		'description'   => __( 'Widgets in this area will be shown on contact page informations', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-six tab-full %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Before Footer Section', 'philosophy' ),
		'id'            => 'before-footer-section',
		'description'   => __( 'Before Footer Section, Right Side', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Footer Right Section', 'philosophy' ),
		'id'            => 'footer-right',
		'description'   => __( 'Footer right Section, right Side', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Copy Right Section', 'philosophy' ),
		'id'            => 'copyright',
		'description'   => __( 'Footer copyright Section, button area', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="%2$s s-footer__copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );


}

add_action( "widgets_init", "philosophy_init" );

function philosophy_customize_preview_inti() {
	wp_enqueue_script( "theme-customizer-js", get_theme_file_uri( "/assets/js/theme-customizer.js" ), array(
		"jquery",
		"customize-preview"
	), VERSION, true );
}

add_action( "customize_preview_init", "philosophy_customize_preview_inti" );

// custom hook action test
function before_cat_title() {
	echo "<p>Before Title</p>";
}

add_action( "philosophy_before_category_title", "before_cat_title" );


function after_cat_title() {
	echo "<p>After Title</p>";
}

add_action( "philosophy_after_category_title", "after_cat_title" );


function before_cat_des() {
	echo "<p>Before Description</p>";
}

add_action( "philosophy_before_category_description", "before_cat_des" );


function after_cat_des() {
	echo "<p>after Description</p>";
}

add_action( "philosophy_after_category_description", "after_cat_des" );

function beginning_category_page( $category_title ) {
	if ( "Uncategorized" == $category_title ) {
		$visit_count = get_option( "special_category" );
		$visit_count = $visit_count ? $visit_count : 0;
		$visit_count ++;
		update_option( "special_category", $visit_count );
	}
}

add_action( "philosophy_category_page", "beginning_category_page" );


// modified functions

function philosophy_pagination() {
	global $wp_query;
	$pgn_links = paginate_links( array(
		'current'  => max( 1, get_query_var( 'paged' ) ),
		'total'    => $wp_query->max_num_pages,
		'type'     => 'list',
		'mid-size' => apply_filters( "philosophy_pagination_miz_size", 3 )
	) );
	$pgn_links = str_replace( "page-numbers", "pgn__num", $pgn_links );
	$pgn_links = str_replace( "<ul class='pgn__num'>", "<ul>", $pgn_links );
	$pgn_links = str_replace( "next pgn__num", "pgn__next", $pgn_links );
	$pgn_links = str_replace( "prev pgn__num", "pgn__prev", $pgn_links );

	echo wp_kses_post( $pgn_links );
}

// Filter Hooks

// Theme Filter Hooks

function philosophy_image_size_name_choose( $sizes ) {
	return array_merge( $sizes, array(
		'philosohpy-home-square' => __( 'Philosophy Square', 'philosophy' )
	) );
}

add_filter( "image_size_names_choose", "philosophy_image_size_name_choose" );

// comment text field position
function philosophy_comment_fields( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'philosophy_comment_fields' );


// Search form
function philosophy_search_form( $form ) {
	$homedir     = home_url( "/" );
	$label       = __( 'Search For:', 'philosophy' );
	$placeholder = __( 'Type Keywords', 'philosophy' );
	$button      = __( 'Search', 'philosophy' );
	$post_type   = <<<PT
<input type="hidden" name="post_type" value="post">
PT;
	if ( is_post_type_archive( "book" ) ) {
		$post_type = <<<PT
<input type="hidden" name="post_type" value="book">
PT;
	}


	$newform = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$homedir}">
	<label>
		<span class="hide-content">{$label}</span>
		<input type="search" class="search-field" placeholder="{$placeholder}" name="s" title="{$label}" autocomplete="off">
	</label>
	{$post_type}
	<input type="submit" class="search-submit" value="{$button}">
</form>
FORM;

	return $newform;

}

add_filter( "get_search_form", "philosophy_search_form" );

function philosophy_home_banner_class( $class ) {
	if ( is_home() ) {
		return $class;
	} else {
		return false;
	}
}

add_filter( "philosophy_home_banner_class", "philosophy_home_banner_class" );

// for buyer filter hook
function pagination_miz_size( $size ) {
	return 2;
}

add_filter( "philosophy_pagination_miz_size", "pagination_miz_size" );

function uppercase_text( $param1, $param2, $param3 ) {
	return ucwords( $param1 ) . " " . strtoupper( $param2 ) . " " . ucwords( $param3 );

}

add_filter( "philosophy_text", "uppercase_text", 10, 3 );

// custom taxonomy filter

function philosophy_footer_language_heading( $title ) {
	if ( is_post_type_archive( 'book' ) || is_tax( 'language' ) ) {
		$title = __( "Languages", "philosophy" );
	}

	return $title;
}

add_filter( "philosophy_footer_tag_heading", "philosophy_footer_language_heading" );

function philosophy_footer_tag_terms( $tags ) {
	if ( is_post_type_archive( 'book' ) || is_tax( 'language' ) ) {
		$tags = get_terms( array(
			'taxonomy'   => 'language',
			'hide_empty' => true
		) );
	}

	return $tags;
}

add_filter( "philosophy_footer_tag_items", "philosophy_footer_tag_terms" );


function philosophy_cpt_slug_fix( $post_link, $id ) {
	$p = get_post( $id );
	if ( is_object( $p ) && 'chapter' == get_post_type( $id ) ) {
		$parent_post_id = get_field( 'parent_book' );
		$parent_post    = get_post( $parent_post_id );
		if ( $parent_post ) {
			$post_link = str_replace( "%book%", $parent_post->post_name, $post_link );
		}

	}


	if ( is_object( $p ) && 'book' == get_post_type() ) {
		$genre = wp_get_post_terms( $p->ID, 'genre' );
		if ( is_array( $genre ) && count( $genre ) > 0 ) {
			$slug      = $genre[0]->slug;
			$post_link = str_replace( "%genre%", $slug, $post_link );
		} else {
			$slug      = "generic";
			$post_link = str_replace( "%genre%", $slug, $post_link );
		}
	}


	return $post_link;

}

add_filter( "post_type_link", "philosophy_cpt_slug_fix", 1, 2 );


// remove action hooks
remove_action( "term_description", "wpautop" );