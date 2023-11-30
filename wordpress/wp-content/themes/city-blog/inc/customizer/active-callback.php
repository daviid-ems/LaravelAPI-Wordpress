<?php

/**
 * Active Callbacks
 *
 * @package City_Blog
 */

// Theme Options.
function city_blog_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'city_blog_enable_pagination' )->value() );
}
function city_blog_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'city_blog_enable_breadcrumb' )->value() );
}

// Check if static home page is enabled.
function city_blog_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}

// Banner Slider Section.
function city_blog_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'city_blog_enable_banner_section' )->value() );
}
function city_blog_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'city_blog_banner_slider_content_type' )->value();
	return ( city_blog_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function city_blog_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'city_blog_banner_slider_content_type' )->value();
	return ( city_blog_is_banner_slider_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Categories Section.
function city_blog_is_categories_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'city_blog_enable_categories_section' )->value() );
}

// Grid List Section.
function city_blog_is_grid_list_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'city_blog_enable_grid_list_section' )->value() );
}
function city_blog_is_grid_list_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'city_blog_grid_list_content_type' )->value();
	return ( city_blog_is_grid_list_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function city_blog_is_grid_list_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'city_blog_grid_list_content_type' )->value();
	return ( city_blog_is_grid_list_section_enabled( $control ) && ( 'page' === $content_type ) );
}
