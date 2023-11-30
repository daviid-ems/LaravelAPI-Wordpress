<?php
/**
 * Color Option
 *
 * @package City_Blog
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#d82926',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'city-blog' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
