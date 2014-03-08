<div id="slider-holder" class="clearfix">
	
	<!-- slider -->
    <div class="flexslider home-slider">
	  
	  <ul class="slides">

	  	<?php 
	  		$slider = new WP_Query( 
	  						array(
	  							'category_name' => 'slider',
	  							'posts_per_page' => 4
	  						)
	  					 );
	  		while( $slider->have_posts() ) : $slider->the_post();
	  	?>
		    <li>
		    	<?php if ( has_post_thumbnail() ) : ?>
		    		<?php the_post_thumbnail('post-slider'); ?>
		    	<?php else: ?>
		      		<img src="<?php bloginfo('template_url'); ?>/img/slides/02.jpg" alt="alt text" />
		      	<?php endif; ?>
		      	<p class="flex-caption"><?php the_title(); ?></p>
		    </li>
		<?php endwhile; ?>

	  </ul>

	</div>
	<!-- ENDS slider -->
	
	<div class="home-slider-clearfix "></div>
	
	<!-- Headline -->
	<div id="headline">
		<h1><?php echo get_option( 'slider_textbox_title'); ?></h1>
		<p><?php echo get_option( 'slider_textbox_desc'); ?></p>
		<em id="corner"></em>
	</div>
	<!-- ENDS headline -->
	
	
</div>
<!-- ENDS slider holder -->