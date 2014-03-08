<!-- home-block -->
<div class="home-block">
	<h2 class="home-block-heading"><span>ÚLTIMOS PROJETOS</span></h2>
	<div class="one-fourth-thumbs clearfix">
		
        <?php
            $projetos = new WP_Query( 
                                array(
                                    'post_type' => 'projects',
                                    'posts_per_page' => 4
                                )
                            );
            $i = 1;
            while( $projetos->have_posts() ) : $projetos->the_post();
                $class = '';
                if ( $i == 4) {
                    $class =  "last";
                    $i = 1;
                }
                $i++;
        ?>
        <figure class="<?php echo $class; ?>">
            <figcaption>
                <strong><?php the_title(); ?></strong>
                <span><?php the_excerpt(); ?></span>
                <em><?php the_time('j \d\e F \d\e Y'); ?></em>
                <a href="<?php the_permalink(); ?>" class="opener"></a>
            </figcaption>
            
            <a href="<?php the_permalink(); ?>"  class="thumb">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail('post-projeto'); ?>
                <?php else: ?>
                    <img src="<?php bloginfo('template_url'); ?>/img/dummies/featured-7.jpg" alt="Alt text" />
                <?php endif; ?>
		  </figure>
        <?php endwhile; ?>
		
		
		
		<a href="<?php echo get_post_type_archive_link('projects'); ?>" class="more-link right">Todos os projetos  &#8594;</a>
		
		
		
	</div>
	
	
</div>
<!-- ENDS home-block -->