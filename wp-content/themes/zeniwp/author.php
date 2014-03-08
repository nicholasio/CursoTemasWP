<?php get_header(); ?>

<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
	
	
		<!-- posts list -->
    	<div id="posts-list">
    	
    		<?php the_post(); ?>

    		<h2 class="page-heading"><span>Posts de <?php echo get_the_author_meta('first_name'); ?></span></h2>

    		<div id="author-avatar">
    			<?php echo get_avatar( get_the_author_meta('user_email') ); ?>
    			<p><?php echo get_the_author_meta('description'); ?></p>
    		</div>
    		
    		<?php rewind_posts(); ?>
 
			<?php get_template_part('partials/loop', 'main'); ?>
			
		</div>
    		
    		
    	</div>
    	<!-- ENDS posts list -->

		<?php get_sidebar(); ?>
    	
	</div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>