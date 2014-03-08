<?php 
/*
	Template Name: Teste 2
*/
get_header(); ?>

<h1>Estou exibindo uma página pelo template teste 2</h1>

<?php if ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

<?php endif; ?>

<?php get_footer(); ?>