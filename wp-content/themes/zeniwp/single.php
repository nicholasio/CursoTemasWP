<?php get_header(); ?>

<div id="main">	
	<div class="wrapper clearfix">
	
	
		<!-- posts list -->
    	<div id="posts-list" class="single-post">
    		
    		<?php get_template_part('partials/loop', 'pages'); ?>
			
    	</div>
    	<!-- ENDS posts list -->

		<?php get_sidebar(); ?>
    	
	</div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>