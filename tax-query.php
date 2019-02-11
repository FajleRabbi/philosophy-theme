<?php

/**
 * Template Name: Tax Query
 */

$philosophy_post_arguments = array(
	'post_type'      => 'book',
	'posts_per_page' => - 1,
	'tax_query'      => array(
		'relation' => 'AND',
		array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'language',
				'field'    => 'slug',
				'terms'    => array( 'english' )
			),
			array(
				'taxonomy' => 'language',
				'field'    => 'slug',
				'terms'    => array( 'french', 'spanish' ),
				'operator' => 'NOT IN'
			)
		),
		array(
			'taxonomy' => 'genre',
			'field'    => 'slug',
			'terms'    => array( 'thrilar' ),
			'operator' => 'IN'
		)
	)
);
$philosophy_post           = new WP_Query( $philosophy_post_arguments );

while ( $philosophy_post->have_posts() ) {
	$philosophy_post->the_post();
	the_title();
	echo "<br>";
}
wp_reset_query();