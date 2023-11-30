<?php
/**
 * City Blog Theme Customizer
 *
 * @package City_Blog
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function city_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'city_blog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'city_blog_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new City_Blog_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'City Blog Pro', 'city-blog' ),
				'button_text'      => __( 'Buy Pro', 'city-blog' ),
				'url'              => 'https://ascendoor.com/themes/city-blog-pro/',
				'background_color' => '#d82926',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Colors.
	require get_template_directory() . '/inc/customizer/colors.php';

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'city_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function city_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function city_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function city_blog_customize_preview_js() {
	wp_enqueue_script( 'city-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), CITY_BLOG_VERSION, true );
}
add_action( 'customize_preview_init', 'city_blog_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function city_blog_custom_control_scripts() {

	wp_enqueue_style( 'city-blog-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'city-blog-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'city_blog_custom_control_scripts' );
