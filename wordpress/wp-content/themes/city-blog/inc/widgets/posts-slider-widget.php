<?php
if ( ! class_exists( 'City_Blog_Posts_Slider_Widget' ) ) {
	/**
	 * Adds City_Blog_Posts_Slider_Widget Widget.
	 */
	class City_Blog_Posts_Slider_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$city_blog_posts_slider_widget_ops = array(
				'classname'   => 'ascendoor-widget city-blog-post-slider-section',
				'description' => __( 'Retrive Posts Slider Widgets', 'city-blog' ),
			);
			parent::__construct(
				'city_blog_posts_slider_widget',
				__( 'Ascendoor Posts Slider Widget', 'city-blog' ),
				$city_blog_posts_slider_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$slider_title    = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$slider_title    = apply_filters( 'widget_title', $slider_title, $instance, $this->id_base );
			$slider_category = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$slider_orderby  = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$slider_order    = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'asc';

			echo $args['before_widget'];
			?>
			<?php if ( ! empty( $slider_title ) ) { ?>
			<div class="section-header">
				<?php echo $args['before_title'] . esc_html( $slider_title ) . $args['after_title']; ?>
			</div>
			<?php } ?>
			<div class="city-blog-section-body">
				<div class="city-blog-post-slider-section-wrapper post-slider city-blog-carousel-slider-navigation">
					<?php
					$slider_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( 3 ),
						'orderby'        => $slider_orderby,
						'order'          => $slider_order,
						'cat'            => absint( $slider_category ),
					);
					$query               = new WP_Query( $slider_widgets_args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image tile-design">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category with-background">
										<?php city_blog_categories_list( true ); ?>
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
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$slider_title    = isset( $instance['title'] ) ? $instance['title'] : '';
			$slider_category = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$slider_orderby  = isset( $instance['orderby'] ) && in_array( $instance['orderby'], array( 'title', 'date' ) ) ? $instance['orderby'] : 'date';
			$slider_order    = isset( $instance['order'] ) && in_array( $instance['order'], array( 'asc', 'desc' ) ) ? $instance['order'] : 'asc';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'city-blog' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'city-blog' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="3" value="<?php echo absint( 3 ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'city-blog' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = city_blog_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $slider_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<p>
				<label><?php esc_html_e( 'Order By:', 'city-blog' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="date" <?php checked( 'date', $slider_orderby ); ?> /> 
								<?php esc_html_e( 'Published Date', 'city-blog' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" type="radio" value="title" <?php checked( 'title', $slider_orderby ); ?> /> 
								<?php esc_html_e( 'Alphabetical Order', 'city-blog' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<p>
				<label><?php esc_html_e( 'Sort By:', 'city-blog' ); ?></label>
				<ul>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="asc" <?php checked( 'asc', $slider_order ); ?> /> 
								<?php esc_html_e( 'Ascending Order', 'city-blog' ); ?>
						</label>
					</li>
					<li>
						<label>
							<input id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" type="radio" value="desc" <?php checked( 'desc', $slider_order ); ?> /> 
								<?php esc_html_e( 'Descending Order', 'city-blog' ); ?>
						</label>
					</li>
				</ul>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance             = $old_instance;
			$instance['title']    = sanitize_text_field( $new_instance['title'] );
			$instance['number']   = (int) $new_instance['number'];
			$instance['category'] = (int) $new_instance['category'];
			$instance['orderby']  = wp_strip_all_tags( $new_instance['orderby'] );
			$instance['order']    = wp_strip_all_tags( $new_instance['order'] );
			return $instance;
		}

	}
}
