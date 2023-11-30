<?php
if ( ! get_theme_mod( 'city_blog_enable_categories_section', false ) ) {
	return;
}
$section_content = array();
$content_ids     = array();
for ( $i = 1; $i <= 4; $i++ ) {
	$content_post_id = get_theme_mod( 'city_blog_categories_content_category_' . $i );
	if ( ! empty( $content_post_id ) ) {
		$content_ids[] = $content_post_id;
	}
}
$args = array(
	'taxonomy'   => 'category',
	'number'     => 4,
	'include'    => array_filter( $content_ids ),
	'orderby'    => 'include',
	'hide_empty' => false,
);

	$terms = get_terms( $args );
	$i     = 1;
foreach ( $terms as $value ) {
	$data['title']         = $value->name;
	$data['permalink']     = get_term_link( $value->term_id );
	$data['thumbnail_url'] = get_theme_mod( 'city_blog_category_category_image_' . $i, '' );
	array_push( $section_content, $data );
	$i++;
}

	$section_content = apply_filters( 'city_blog_categories_section_content', $section_content );

	city_blog_render_categories_section( $section_content );

/**
 * Render Categories Section
 */
function city_blog_render_categories_section( $section_content ) {

	$categories_title = get_theme_mod( 'city_blog_categories_title', __( 'Categories', 'city-blog' ) );
	?>

	<section id="city_blog_categories_section" class="city-blog-frontpage-section city-blog-categories-section categories-style-1 column-4">
		<?php
		if ( is_customize_preview() ) :
			city_blog_section_link( 'city_blog_categories_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $categories_title ) ) : ?>
				<div class="section-header">
					<h3 class="section-title"><?php echo esc_html( $categories_title ); ?></h3>
					<span class="section-title-icon">
						<?php require get_template_directory() . '/assets/svg-icon.svg'; ?>
					</span>
				</div>
			<?php endif; ?>
			<div class="categories-wrapper">
				<?php foreach ( $section_content as $content ) : ?>
					<div class="category-single">
						<div class="category-img">
							<?php if ( ! empty( $content['thumbnail_url'] ) ) : ?>
								<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
							<?php endif; ?>
						</div>
						<a href="<?php echo esc_url( $content['permalink'] ); ?>">
							<span class="title"><?php echo esc_html( $content['title'] ); ?></span>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>	

	<?php
}
