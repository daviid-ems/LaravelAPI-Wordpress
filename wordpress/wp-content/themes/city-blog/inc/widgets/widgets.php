<?php

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Post Slider Widgets.
require get_template_directory() . '/inc/widgets/posts-slider-widget.php';

// Trending Posts Widgets.
require get_template_directory() . '/inc/widgets/trending-posts-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function city_blog_register_widgets() {

	register_widget( 'City_Blog_Author_Info_Widget' );

	register_widget( 'City_Blog_Posts_Slider_Widget' );

	register_widget( 'City_Blog_Trending_Posts_Widget' );

	register_widget( 'City_Blog_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'city_blog_register_widgets' );
