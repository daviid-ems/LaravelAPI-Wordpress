<?php
/**
 * Breadcrumb
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'city-blog' ),
		'panel' => 'city_blog_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'city_blog_enable_breadcrumb',
	array(
		'sanitize_callback' => 'city_blog_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new City_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'city_blog_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'city-blog' ),
			'section' => 'city_blog_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'city_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'city_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'city-blog' ),
		'active_callback' => 'city_blog_is_breadcrumb_enabled',
		'section'         => 'city_blog_breadcrumb',
	)
);
