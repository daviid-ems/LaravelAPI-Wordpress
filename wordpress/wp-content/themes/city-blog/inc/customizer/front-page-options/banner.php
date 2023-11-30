<?php
/**
 * Banner Section
 *
 * @package City_Blog
 */

$wp_customize->add_section(
	'city_blog_banner_section',
	array(
		'panel'    => 'city_blog_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'city-blog' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'city_blog_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'city_blog_sanitize_switch',
	)
);

$wp_customize->add_control(
	new City_Blog_Toggle_Switch_Custom_Control(
		$wp_customize,
		'city_blog_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'city-blog' ),
			'section'  => 'city_blog_banner_section',
			'settings' => 'city_blog_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'city_blog_enable_banner_section',
		array(
			'selector' => '#city_blog_banner_section .section-link',
			'settings' => 'city_blog_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'city_blog_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'city_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'city_blog_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'city-blog' ),
		'section'         => 'city_blog_banner_section',
		'settings'        => 'city_blog_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'city_blog_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'city-blog' ),
			'post' => esc_html__( 'Post', 'city-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'city_blog_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'city_blog_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'city-blog' ), $i ),
			'section'         => 'city_blog_banner_section',
			'settings'        => 'city_blog_banner_slider_content_post_' . $i,
			'active_callback' => 'city_blog_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => city_blog_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'city_blog_banner_slider_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'city_blog_banner_slider_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'city-blog' ), $i ),
			'section'         => 'city_blog_banner_section',
			'settings'        => 'city_blog_banner_slider_content_page_' . $i,
			'active_callback' => 'city_blog_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => city_blog_get_page_choices(),
		)
	);

}
