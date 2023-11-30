<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package City_Blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single">
		<div class="mag-post-img">
			<?php city_blog_post_thumbnail(); ?>
		</div>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php city_blog_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			<div class="mag-post-meta">
				<?php
				city_blog_posted_by();
				city_blog_posted_on();
				?>
			</div>
			<div class="mag-post-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>	
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
