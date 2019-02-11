<?php

define( 'CS_ACTIVE_FRAMEWORK', true );
define( 'CS_ACTIVE_METABOX', true );
define( 'CS_ACTIVE_TAXONOMY', true );
define( 'CS_ACTIVE_SHORTCODE', true );
define( 'CS_ACTIVE_CUSTOMIZE', false );
define( 'CS_ACTIVE_LIGHT_THEME', true );

function philosophy_csf_metabox(){
	CSFramework_Taxonomy::instance(array());
	CSFramework_Metabox::instance(array());
	CSFramework_Shortcode_Manager::instance(array());
}
add_action('init', 'philosophy_csf_metabox');

function philosophy_csf_theme_option_init($settings){
	$settings = array(
		'menu_title'      => 'Philosophy Theme Options',
		'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
		'menu_slug'       => 'cs-framework',
		'ajax_save'       => true,
		'show_reset_all'  => false,
		'menu_position'   => 45,
		'framework_title' => 'Philosophy Theme Options <small>by Fajle Rabbi</small>',
	);

	$options = philosophy_theme_options();
	new CSFramework($settings, $options);
}
add_action("init", "philosophy_csf_theme_option_init");

function philosophy_theme_options(){
	$options = array();
	$options[] = array(
		'name'   => 'section-1',
		'title'  => 'section One',
		'icon'   => 'fa fa-star',

		// begin: fields
		'fields' => array(

			// begin: a field
			array(
				'id'    => 'is_tag_visible',
				'type'  => 'switcher',
				'title' => 'Is tag visible?',
			),
			array(
				'id'    => 'facebook_url',
				'type'  => 'text',
				'title' => 'facebook url',
			),
			array(
				'id'    => 'twitter',
				'type'  => 'text',
				'title' => 'twitter',
			),
//			array(
//				'id'        => 'sc_icon',
//				'type'      => 'group',
//				'title'     => 'social',
//				'button_title'     => 'add social',
//				'fields'    => array(
//					array(
//						'id'    => 'facebook-url',
//						'type'  => 'text',
//						'title' => 'Text',
//					),
//				),
//			),



		), // end: fields
	);
	$options[] = array(
		'name'   => 'section-2',
		'title'  => 'section Two',
		'icon'   => 'fa fa-home',
		// begin: fields
		'fields' => array(

			// begin: a field
			array(
				'id'    => 'section_text',
				'type'  => 'text',
				'title' => 'section two testing text field',
			),

		), // end: fields
	);

	return $options;
}
// add_filter('cs_framework_options', 'philosophy_theme_options');







function philosophy_taxonomy_options($options){
	$options[]   = array(
		'id'       => 'language_featured_image',
		'taxonomy' => 'language', // category, post_tag or your custom taxonomy name
		'fields'   => array(

			array(
				'id'    => 'featured_image',
				'type'  => 'image',
				'title' => 'Language feature image',
			),

		),
	);
	return $options;
}
add_filter('cs_taxonomy_options', 'philosophy_taxonomy_options');

function philosophy_page_metabox( $options ) {
	$options = array();
	$page_id = 0;
	if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
		$page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	}

	$current_page_template = get_post_meta( $page_id, '_wp_page_template', true );
	if ( ! in_array( $current_page_template, array( 'about-us.php', 'contact-us.php' ) ) ) {
		return $options;
	}

	$options   = array();
	$options[] = array(
		'id'        => 'philosophy_page_metabox',
		'title'     => 'Page Options',
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'page-section1',
				'title'  => __( 'Page Settings', 'philosophy' ),
				'icon'   => 'fa fa-home',
				'fields' => array(
					array(
						'id'      => 'page-heading',
						'type'    => 'text',
						'default' => __( 'Page Heading', 'philosophy' ),
						'title'   => __( 'Page Heading', 'philosophy' ),
					),
					array(
						'id'      => 'page-teaser',
						'type'    => 'textarea',
						'default' => __( 'Page Teaser', 'philosophy' ),
						'title'   => __( 'Page Teaser', 'philosophy' ),
					),
					array(
						'id'      => 'is-favorite',
						'type'    => 'switcher',
						'default' => 1,
						'title'   => __( 'is favorite', 'philosophy' ),
					),
					array(
						'id'         => 'is-favorite-extra',
						'type'       => 'switcher',
						'default'    => 0,
						'title'      => __( 'is favorite extra', 'philosophy' ),
						'dependency' => array( 'is-favorite', '==', '1' )
					),
					array(
						'id'         => 'favorite-text',
						'type'       => 'text',
						'default'    => __( 'favorite text', 'philosophy' ),
						'title'      => __( 'Favorite text', 'philosophy' ),
						'dependency' => array( 'is-favorite-extra', '==', '1' )
					),
//					array(
//						'id'      => 'favorite-text',
//						'type'    => 'text',
//						'default' => __( 'favorite text', 'philosophy' ),
//						'title'   => __( 'Favorite text]', 'philosophy' ),
//						'dependency' => array('is-favorite|is-favorite-extra', '==|==', '1|1')
//					),
					array(
						'id'         => 'supported_language',
						'type'       => 'checkbox',
						'title'      => __( 'Supported Languages', 'philosophy' ),
						'options'    => array(
							'bangla'  => 'Bangla',
							'english' => 'English',
							'french'  => 'French',
						),
						'attributes' => array(
							'data-depend-id' => 'supported_language'
						)
					),
					array(
						'id'         => 'lang-data',
						'type'       => 'text',
						'default'    => __( 'Extra lang data', 'philosophy' ),
						'title'      => __( 'Extra lang data', 'philosophy' ),
						//'dependency' => array('supported_language_english|supported_language_bangla', '==|==', '1|1')
						'dependency' => array( 'supported_language', 'any', 'bangla,english' )
					),


				)
			),
			// section 2
			array(
				'name'   => 'page-section2',
				'title'  => __( 'Extra Section', 'philosophy' ),
				'icon'   => 'fa fa-book',
				'fields' => array(
					array(
						'id'      => 'page-heading2',
						'type'    => 'text',
						'default' => __( 'Page Heading2', 'philosophy' ),
						'title'   => __( 'Page Heading2', 'philosophy' ),
					),
					array(
						'id'      => 'page-teaser2',
						'type'    => 'textarea',
						'default' => __( 'Page Teaser2', 'philosophy' ),
						'title'   => __( 'Page Teaser2', 'philosophy' ),
					),
					array(
						'id'      => 'page-switcher2',
						'type'    => 'switcher',
						'default' => __( 'Page Switcher2', 'philosophy' ),
						'title'   => __( 'Page Switcher2', 'philosophy' ),
					),
				)
			),

		),
	);

	return $options;
}

add_filter( 'cs_metabox_options', 'philosophy_page_metabox' );


function philosophy_page_upload_meta( $options ) {
	$options = array();

	$options[] = array(
		'id'        => 'philosophy_page_metabox',
		'title'     => 'Page Options',
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'page-section1',
				//'title'  => __( 'Page Settings', 'philosophy' ),
				'icon'   => 'fa fa-home',
				'fields' => array(
					array(
						'id'       => 'upload_file',
						'type'     => 'upload',
						'title'    => __( 'Page Upload Meta', 'philosophy' ),
						'settings' => array(
							'upload_type'  => 'pdf',
							'button_title' => __( 'Upload', 'philosophy' ),
							'frame_title'  => __( 'Set a PDF', 'philosophy' ),
							'insert_title' => __( 'Use This PDF', 'philosophy' ),
						)
					),
					array(
						'id'        => 'upload_image',
						'type'      => 'image',
						'title'     => __( 'Upload Image Meta', 'philosophy' ),
						'add_title' => __( 'Add An Image', 'philosophy' ),
					),

					array(
						'id'          => 'upload_gallery',
						'type'        => 'gallery',
						'title'       => __( 'Upload Gallery', 'philosophy' ),
						'add_title'   => __( 'Add Images', 'philosophy' ),
						'edit_title'  => __( 'Edit Gallery', 'philosophy' ),
						'clear_title' => __( 'Clear Gallery', 'philosophy' ),
					),
					array(
						'id'     => 'opt-fieldset-1',
						'type'   => 'fieldset',
						'title'  => 'Fieldset',
						'fields' => array(
							array(
								'id'    => 'opt-text',
								'type'  => 'text',
								'title' => 'Text',
							),
							array(
								'id'    => 'opt-textarea',
								'type'  => 'textarea',
								'title' => 'Color',
							),
						),
					),
					array(
						'id'              => 'opt-group-1',
						'type'            => 'group',
						'title'           => __( 'Group box', 'philosophy' ),
						'button_title'    => __( 'Add New', 'philosophy' ),
						'according_title' => __( 'Add New Field', 'philosophy' ),
						'fields'          => array(
							array(
								'id'         => 'featured_post',
								'type'       => 'select',
								'title'      => __( 'select a book', 'philosophy' ),
								'options'    => 'posts',
								'query_args' => array(
									'post_type'      => 'book',
									'orderby'        => 'post_date',
									'order'          => 'DESC',
									'posts_per_page' => - 1
								)
							),
						),
					),


				)
			),


		),
	);

	return $options;
}

add_filter( 'cs_metabox_options', 'philosophy_page_upload_meta' );


function philosophy_page_custom_post_type( $options ) {
	$options = array();

	$options[] = array(
		'id'        => 'philosophy_page_custom_post_type',
		'title'     => 'Page cpt type',
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'page-section1',
				//'title'  => __( 'Page Settings', 'philosophy' ),
				'icon'   => 'fa fa-home',
				'fields' => array(

					array(
						'id'      => 'cpt_type',
						'type'    => 'select',
						'title'   => __( 'select a book', 'philosophy' ),
						'options' => array(
							'none'    => 'None',
							'book'    => 'Books',
							'chapter' => 'Chapters',
						),
					),

				)
			),


		),
	);
	$post_id   = 0;
	if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
		$post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	}
	$post_meta_opt = get_post_meta( $post_id, 'philosophy_page_custom_post_type', true );
	if ( ! empty( $post_meta_opt ) && $post_meta_opt['cpt_type'] == 'book' ) {

		$options[] = array(
			'id'        => 'philosophy_page_custom_post_book',
			'title'     => 'Page cpt type book',
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'   => 'page-section1',
					//'title'  => __( 'Page Settings', 'philosophy' ),
					'icon'   => 'fa fa-home',
					'fields' => array(

						array(
							'id'    => 'cpt_type_book_text',
							'type'  => 'text',
							'title' => __( 'book text', 'philosophy' ),
						),

					)
				),


			),
		);
	}

	if ( ! empty( $post_meta_opt ) && $post_meta_opt['cpt_type'] == 'chapter' ) {
		$options[] = array(
			'id'        => 'philosophy_page_custom_post_chapter',
			'title'     => 'Page cpt type',
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => array(
				array(
					'name'   => 'page-section1',
					//'title'  => __( 'Page Settings', 'philosophy' ),
					'icon'   => 'fa fa-home',
					'fields' => array(

						array(
							'id'    => 'cpt_type_chapter',
							'type'  => 'text',
							'title' => __( 'chapter text', 'philosophy' ),
						),

					)
				),


			),
		);
	}

	return $options;
}

add_filter( 'cs_metabox_options', 'philosophy_page_custom_post_type' );


function philosophy_cs_google_map( $options ) {


	$options[]     = array(
		'name' => 'gmap',
		'title'      => 'Advanced Shortcode Examples',
		'shortcodes' => array(

			// begin: shortcode
			array(
				'name'           => 'gmap',
				'title'          => 'google map Shortcode',
				'fields'        => array(

					array(
						'id'        => 'place',
						'type'      => 'text',
						'title'     => 'place 1',
					),
					array(
						'id'        => 'height',
						'type'      => 'text',
						'title'     => 'height 1',
					),
					array(
						'id'        => 'width',
						'type'      => 'text',
						'title'     => 'width 1',
					),
					array(
						'id'        => 'zoom',
						'type'      => 'text',
						'title'     => 'zoom 1',
					),

				)
			),
		)
	);

	return $options;
}

add_filter( 'cs_shortcode_options', 'philosophy_cs_google_map' );