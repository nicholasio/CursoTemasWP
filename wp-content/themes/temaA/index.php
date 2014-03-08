<?php get_header(); ?>

<h2>Meu primeiro Tema</h2>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

<?php endwhile;
endif; ?>

<br />

<h2>Query Secundária</h2>
<?php 
	$noticias = new WP_Query( array('posts_per_page' => '3', 'category_name' => 'noticias') );
	while ( $noticias->have_posts() ) : $noticias->the_post(); ?>
	
	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>

<?php endwhile;?>

<?php get_footer(); ?>