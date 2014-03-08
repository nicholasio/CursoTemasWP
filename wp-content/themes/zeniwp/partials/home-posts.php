<!-- home-block -->
<div class="home-block" >
	<h2 class="home-block-heading"><span>POSTS EM DESTAQUE</span></h2>
	<div class="one-third-thumbs clearfix" >

        <?php 
            $posts_em_destaque = new WP_Query(
                                    array(
                                        'post__in' => get_option('sticky_posts'),
                                        'posts_per_page' => 3,
                                        'ignore_sticky_posts' => 1
                                    )
                                 );

            $i = 1;
            while( $posts_em_destaque->have_posts() ) : $posts_em_destaque->the_post();
            $class = '';
            if ( $i == 3 ) {
                $class = "last";
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
                    <?php the_post_thumbnail('post-mini'); ?>
                <?php else: ?>
                    <img src="<?php bloginfo('template_url'); ?>/img/dummies/featured-1.jpg" alt="Alt text" />
                <?php endif; ?>
            </a>
		</figure>
        <?php endwhile; ?>
		
		
	</div>
</div>
<!-- ENDS home-block -->