<?php
function philosophy_customizer($wp_customize){
	$wp_customize->add_panel("philosophy_options", array(
		'title' => __("Philosophy Options", "philosophy"),
		'description' => __("Philosophy Theme Customizer Options", "philosophy"),
		'priority' => 40,

	));

	// Header social link section
	$wp_customize->add_section('philosophy_header_social', array(
		'title' => __('Header Social', 'philosophy'),
		'priority' => 30,
		'panel' => 'philosophy_options'
	));

	// Header social settings
	$wp_customize->add_setting('philosophy_header_fb_url', array(
		'default' => '',
		'transport' => 'refresh',  // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_setting('philosophy_header_twitter_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_setting('philosophy_header_instagram_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_setting('philosophy_header_pinterest_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));


	// footer social control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'header_facebook_url_input',
			array(
				'label' => __('Facebook URL', 'philosophy'),
				'section' => 'philosophy_header_social',
				'settings' => 'philosophy_header_fb_url',
				'type' => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'header_twitter_url_input',
			array(
				'label' => __('Twitter URL', 'philosophy'),
				'section' => 'philosophy_header_social',
				'settings' => 'philosophy_header_twitter_url',
				'type' => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'header_instagram_url_input',
			array(
				'label' => __('Instagram URL', 'philosophy'),
				'section' => 'philosophy_header_social',
				'settings' => 'philosophy_header_instagram_url',
				'type' => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'header_pinterest_url_input',
			array(
				'label' => __('Pinterest URL', 'philosophy'),
				'section' => 'philosophy_header_social',
				'settings' => 'philosophy_header_pinterest_url',
				'type' => 'url'
			)
		)
	);



	// footer social link section
	// footer social link section
	// footer social link section
	$wp_customize->add_section('philosophy_footer_social', array(
		'title' => __('Footer Social', 'philosophy'),
		'priority' => 30,
		'panel' => 'philosophy_options'
	));

	// footer social settings
	$wp_customize->add_setting('philosophy_footer_fb_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_setting('philosophy_footer_twitter_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_setting('philosophy_footer_instagram_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_setting('philosophy_footer_pinterest_url', array(
		'default' => '',
		'transport' => 'refresh', // postMessage
		'sanitize_callback' => 'esc_url_raw'
	));


	// footer social control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_facebook_url_input',
			array(
				'label' => __('Facebook URL', 'philosophy'),
				'section' => 'philosophy_footer_social',
				'settings' => 'philosophy_footer_fb_url',
				'type' => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_twitter_url_input',
			array(
				'label' => __('Twitter URL', 'philosophy'),
				'section' => 'philosophy_footer_social',
				'settings' => 'philosophy_footer_twitter_url',
				'type' => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_instagram_url_input',
			array(
				'label' => __('Instagram URL', 'philosophy'),
				'section' => 'philosophy_footer_social',
				'settings' => 'philosophy_footer_instagram_url',
				'type' => 'url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_pinterest_url_input',
			array(
				'label' => __('Pinterest URL', 'philosophy'),
				'section' => 'philosophy_footer_social',
				'settings' => 'philosophy_footer_pinterest_url',
				'type' => 'url'
			)
		)
	);


}
add_action("customize_register", "philosophy_customizer");