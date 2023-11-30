<?php
if ( ! get_theme_mod( 'city_blog_enable_grid_list_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'city_blog_grid_list_content_type', 'post' );

for ( $i = 1; $i <= 7; $i++ ) {
	$content_ids[] = get_theme_mod( 'city_blog_grid_list_content_' . $content_type . '_' . $i );
}

$args = array(
	'post_type'           => $content_type,
	'posts_per_page'      => absint( 7 ),
	'ignore_sticky_posts' => true,
);

if ( ! empty( array_filter( $content_ids ) ) ) {
	$args['post__in'] = array_filter( $content_ids );
	$args['orderby']  = 'post__in';
} else {
	$args['orderby'] = 'date';
}

$args = apply_filters( 'city_blog_grid_list_section_args', $args );

city_blog_render_grid_list_section( $args );

/**
 * Render Grid List Section.
 */
function city_blog_render_grid_list_section( $args ) {
	$section_title = get_theme_mod( 'city_blog_grid_list_title', __( 'Grid List', 'city-blog' ) );
	?>

	<section id="city_blog_grid_list_section" class="city-blog-frontpage-section city-blog-grid-list-section style-2">
		<?php
		if ( is_customize_preview() ) :
			city_blog_section_link( 'city_blog_grid_list_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_title ) ) : ?>
				<div class="section-header">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<span class="section-title-icon">
						<?php require get_template_directory() . '/assets/svg-icon.svg'; ?>
					</span>
				</div>
				<?php
			endif;
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				?>
				<div class="city-blog-section-body">
					<div class="city-blog-grid-list-section-wrapper">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image <?php echo esc_attr( $i === 1 ? '' : 'list-design' ); ?>">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'post-thumbnail' ); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category">
										<?php city_blog_categories_list(); ?>
									</div>
									<h3 class="mag-post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="mag-post-meta">
										<span class="post-author">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
										</span>
										<span class="post-date">
											<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
										</span>
									</div>
									<?php if ( $i === 1 ) { ?>
									<div class="mag-post-excerpt">
										<p><?php the_excerpt(); ?></p>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
