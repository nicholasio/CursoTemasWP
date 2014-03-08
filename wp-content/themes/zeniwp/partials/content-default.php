<article class="format-standard">
	<div class="entry-date">
		<div class="number"><?php the_time('j'); ?></div> 
		<div class="year"><?php the_time('F, Y'); ?></div>
	</div>
	<div class="feature-image">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('post-thumb'); ?>
	</div>
	<h2  class="post-heading">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php if ( is_single() ) : ?>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
	<?php else: ?>
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="read-more">leia mais &#8594;</a>
	<?php endif; ?>
	
	<div class="meta">
		<div class="categories">
			Em 
			<?php if ( 'post' == get_post_type() ) : ?>
				<?php the_category(','); ?>
			<?php elseif ( 'projects' == get_post_type() ): ?>
				<?php the_terms( get_the_ID() , 'projects-category'); ?>
			<?php endif; ?>
			
		</div>
		<div class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('Sem comentário', 'Um comentário', '% comentários'); ?></a></div>
		<div class="user">Por <?php the_author_posts_link(); ?></div>
		<?php if ( 'projects' == get_post_type() ) : ?>
		<div class="categories">Habilidades: <?php the_terms( get_the_ID(), 'projects-tags'); ?></div>
		<?php endif; ?>
	</div>

	<?php if ( 'post' == get_post_type() && is_single() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>


</article>
