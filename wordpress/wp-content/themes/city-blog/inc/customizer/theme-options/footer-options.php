<?php
/**
 * Footer Options
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_footer_options',
	array(
		'panel' => 'city_blog_theme_options',
		'title' => esc_html__( 'Footer Options', 'city-blog' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'city-blog' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'city_blog_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'city_blog_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'city-blog' ),
		'section'  => 'city_blog_footer_options',
		'settings' => 'city_blog_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'city_blog_scroll_top',
	array(
		'sanitize_callback' => 'city_blog_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new City_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'city_blog_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'city-blog' ),
			'section' => 'city_blog_footer_options',
		)
	)
);
