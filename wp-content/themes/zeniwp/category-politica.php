<?php get_header(); ?>

<!-- MAIN -->
<div id="main">	
	<div class="wrapper clearfix">
	
		

		<!-- posts list -->
    	<div id="posts-list">
    	
    		<h2 class="page-heading">
    			<span>Categoria: <?php single_cat_title(); ?></span>
    		</h2>	
    	   <p>Acompanhe todas as notícias sobre política</p>
 
			<?php get_template_part('partials/loop', 'main'); ?>
			
		</div>
    		
    		
    	</div>
    	<!-- ENDS posts list -->

		<?php get_sidebar(); ?>
    	
	</div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>