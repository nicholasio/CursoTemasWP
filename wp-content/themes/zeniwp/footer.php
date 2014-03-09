<footer>
		<div class="wrapper">
		
			<ul  class="widget-cols clearfix">
				<?php dynamic_sidebar('widgets-rodape'); ?>	
			</ul>				
			
			
			<div class="footer-bottom">
				<div class="left"><?php echo get_option('footer_textbox_desc'); ?></div>
				<div class="right">
					<ul id="social-bar">
						<li><a href="<?php echo get_option('social_media_facebook'); ?>"  title="Become a fan" class="poshytip"><img src="<?php bloginfo('template_url'); ?>/img/social/facebook.png"  alt="Facebook" /></a></li>
						<li><a href="<?php echo get_option('social_media_twitter'); ?>" title="Follow my tweets" class="poshytip"><img src="<?php bloginfo('template_url'); ?>/img/social/twitter.png"  alt="twitter" /></a></li>
						<li><a href="<?php echo get_option('social_media_google_plus'); ?>"  title="Add to the circle" class="poshytip"><img src="<?php bloginfo('template_url'); ?>/img/social/plus.png" alt="Google plus" /></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
	
</html>