<?php

/**
 * Dynamic CSS
 */
function city_blog_dynamic_css() {

	$primary_color         = get_theme_mod( 'primary_color', '#d82926' );
	$site_title_font       = get_theme_mod( 'city_blog_site_title_font', 'Playfair Display' );
	$site_description_font = get_theme_mod( 'city_blog_site_description_font', 'Raleway' );
	$header_font           = get_theme_mod( 'city_blog_header_font', 'Playfair Display' );
	$body_font             = get_theme_mod( 'city_blog_body_font', 'Raleway' );

	$custom_css  = '';
	$custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$custom_css .= '
    /* Typograhpy */
    :root {
        --font-heading: "' . esc_attr( $header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont,"' . esc_attr( $body_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea {
        font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
        font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}
    
	.site-description {
        font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}
    ';

	wp_add_inline_style( 'city-blog-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'city_blog_dynamic_css', 99 );
