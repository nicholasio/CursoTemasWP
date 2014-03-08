<figure>
    <figcaption>
        <strong><?php the_title(); ?></strong>
        <span><?php the_excerpt(); ?></span>
        <em><?php the_time('j \d\e F \d\e Y'); ?></em>
        <a href="<?php the_permalink(); ?>" class="opener"></a>
    </figcaption>

    </figcaption>
    
    <a href="<?php the_permalink(); ?>"  class="thumb">
        <?php the_post_thumbnail('post-projeto-big'); ?>    
    </a>
</figure>