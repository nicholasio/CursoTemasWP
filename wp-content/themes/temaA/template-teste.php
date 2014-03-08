<?php 
/*
	Template Name: Teste
*/
get_header(); ?>

<h1>Isto aqui é um template</h1>

<div class="template-teste">
	<?php if ( have_posts() ) : the_post(); ?>
		
		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>

	<?php endif; ?>
</div>

<?php get_footer(); ?>