<?php
/**
 * Sidebar Position
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'city-blog' ),
		'panel' => 'city_blog_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'city_blog_sidebar_position',
	array(
		'sanitize_callback' => 'city_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'city_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'city-blog' ),
		'section' => 'city_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'city-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'city-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'city-blog' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'city_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'city_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'city_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'city-blog' ),
		'section' => 'city_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'city-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'city-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'city-blog' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'city_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'city_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'city_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'city-blog' ),
		'section' => 'city_blog_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'city-blog' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'city-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'city-blog' ),
		),
	)
);
