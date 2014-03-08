<?php

class Zeniwp_Widget_Recent_Posts extends WP_Widget {

	function __construct() {
		$widgets_ops = array(
				'classname' => 'Zeniwp_Widget_Recent_Posts',
				'description' => 'Exibe os posts recentes'
			);
		parent::__construct('Zeniwp_Widget_Recent_Posts', '[Zeniwp] Posts Recentes', $widgets_ops);
	}

    function form( $instance ) {
      $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number' => 4 ) );
      $title = $instance['title'];
      $number = $instance['number'];
      ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('number'); ?>">Qtd: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>
      <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		return $instance;
	}

	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

		if ( !empty($title) ) 
			echo $before_title . $title . $after_title;

		$number = isset($instance['number']) && !empty($instance['number']) ? $instance['number'] : 4;
		$recent_posts = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => $number
							)
						);
		while( $recent_posts->have_posts() ) : $recent_posts->the_post();
		?>
			<div class="recent-post">
				<a href="<?php the_permalink(); ?>" class="thumb">
					<?php the_post_thumbnail('post-widget-mini'); ?>
				</a>
				<div class="post-head">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?></a>
						<span><?php the_time('j \d\e F \d\e Y'); ?></span>
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();

		echo $after_widget;

	}
}