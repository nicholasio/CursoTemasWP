<?php get_header(); ?>

<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
    	
		<!-- page content -->
    	<div id="page-content" class="clearfix">
			
			
			
			<!-- floated content -->
			<div class="floated-content">

				<?php get_template_part('partials/loop', 'pages'); ?>
				
			</div>
			<!-- ends floated content -->
			
			<?php get_sidebar(); ?>
			
		</div>	        	
    	<!--  page content-->
    	
    	

    	
	</div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>