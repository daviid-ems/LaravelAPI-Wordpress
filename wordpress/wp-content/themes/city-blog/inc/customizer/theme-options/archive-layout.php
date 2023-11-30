<?php
/**
 * Archive Layout
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'city-blog' ),
		'panel' => 'city_blog_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'city_blog_archive_column_layout',
	array(
		'default'           => 'column-3',
		'sanitize_callback' => 'city_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'city_blog_archive_column_layout',
	array(
		'label'   => esc_html__( 'Select Column Layout', 'city-blog' ),
		'section' => 'city_blog_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'city-blog' ),
			'column-3' => __( 'Column 3', 'city-blog' ),
		),
	)
);
