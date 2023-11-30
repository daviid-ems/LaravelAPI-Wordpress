<?php
/**
 * Pagination
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_pagination',
	array(
		'panel' => 'city_blog_theme_options',
		'title' => esc_html__( 'Pagination', 'city-blog' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'city_blog_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'city_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new City_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'city_blog_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'city-blog' ),
			'section'  => 'city_blog_pagination',
			'settings' => 'city_blog_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'city_blog_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'city_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'city_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'city-blog' ),
		'section'         => 'city_blog_pagination',
		'settings'        => 'city_blog_pagination_type',
		'active_callback' => 'city_blog_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'city-blog' ),
			'numeric' => __( 'Numeric', 'city-blog' ),
		),
	)
);
