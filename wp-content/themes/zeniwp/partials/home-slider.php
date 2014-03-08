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
		<h1>RESPONSIVE, FREE AND SLEEK</h1>
		<p>Zeni is a FREE Responsive HTML 5 Template.</p>
		<p>Visit my <a href="http://www.luiszuno.com">site</a> for more freebies</p>
		<em id="corner"></em>
	</div>
	<!-- ENDS headline -->
	
	
</div>
<!-- ENDS slider holder -->