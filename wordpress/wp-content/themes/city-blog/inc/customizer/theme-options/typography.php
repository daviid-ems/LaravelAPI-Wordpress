<?php
/**
 * Typography
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_typography',
	array(
		'panel' => 'city_blog_theme_options',
		'title' => esc_html__( 'Typography', 'city-blog' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'city_blog_site_title_font',
	array(
		'default'           => 'Playfair Display',
		'sanitize_callback' => 'city_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'city_blog_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'city-blog' ),
		'section'  => 'city_blog_typography',
		'settings' => 'city_blog_site_title_font',
		'type'     => 'select',
		'choices'  => city_blog_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'city_blog_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'city_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'city_blog_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'city-blog' ),
		'section'  => 'city_blog_typography',
		'settings' => 'city_blog_site_description_font',
		'type'     => 'select',
		'choices'  => city_blog_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'city_blog_header_font',
	array(
		'default'           => 'Playfair Display',
		'sanitize_callback' => 'city_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'city_blog_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'city-blog' ),
		'section'  => 'city_blog_typography',
		'settings' => 'city_blog_header_font',
		'type'     => 'select',
		'choices'  => city_blog_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'city_blog_body_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'city_blog_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'city_blog_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'city-blog' ),
		'section'  => 'city_blog_typography',
		'settings' => 'city_blog_body_font',
		'type'     => 'select',
		'choices'  => city_blog_get_all_google_font_families(),
	)
);
