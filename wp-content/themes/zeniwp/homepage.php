<?php 
	/*
		Template Name: HomePage
	*/
	get_header();
?>
<div id="main">	
	<div class="wrapper">

        <?php get_template_part('partials/home', 'slider'); ?>

        <?php get_template_part('partials/home', 'posts'); ?>

        <?php get_template_part('partials/home', 'projects'); ?>
    		        	
	</div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>