<?php if ( have_posts() ) : the_post(); ?>
	<h2 class="page-heading"><span><?php the_title(); ?></span></h2>
	<?php if ( is_single() ) : ?>

		<?php get_template_part('partials/content', 'default'); ?>

	<?php else: ?>

		<?php the_content(); ?>
		
	<?php endif; ?>

<?php endif; ?>