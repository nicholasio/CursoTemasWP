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
            
        </div>
        <!-- ends thumbs-->

        
    </div>
</div>
<!-- ENDS MAIN -->

<?php get_footer(); ?>