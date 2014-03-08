<?php get_header(); ?>

<!-- MAIN -->
<div id="main">	
 <div class="wrapper clearfix">
        <h2 class="page-heading"><span>Projetos</span></h2>    


        <!-- thumbs -->
        <div class="portfolio-thumbs clearfix" >

            <?php 

                while( have_posts() ) : the_post(); 
            ?>
                <?php get_template_part('partials/content', 'projects'); ?>

            <?php endwhile; ?>

            <?php echo zeniwp_pagination(); ?>

            <!-- ou -->
            <?php 
                /*if ( function_exists('wp_pagenavi') ) 
                    wp_pagenavi();*/
            ?>
            
        </div>
        <!-- ends thumbs-->

        
    </div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>