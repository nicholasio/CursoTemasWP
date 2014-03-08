<footer>
		<div class="wrapper">
		
			<ul  class="widget-cols clearfix">
				<!--<li class="first-col">
					
					<div class="widget-block">
						<h4>Recent posts</h4>
						<div class="recent-post">
							<a href="#" class="thumb"><img src="<?php bloginfo('template_url'); ?>/img/dummies/54x54.gif" alt="Post" /></a>
							<div class="post-head">
								<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
							</div>
						</div>
						<div class="recent-post">
							<a href="#" class="thumb"><img src="<?php bloginfo('template_url'); ?>/img/dummies/54x54.gif" alt="Post" /></a>
							<div class="post-head">
								<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
							</div>
						</div>
						<div class="recent-post">
							<a href="#" class="thumb"><img src="<?php bloginfo('template_url'); ?>/img/dummies/54x54.gif" alt="Post" /></a>
							<div class="post-head">
								<a href="#">Pellentesque habitant morbi senectus</a><span> March 12, 2011</span>
							</div>
						</div>
					</div>
				</li>
				
				<li class="second-col">
					
					<div class="widget-block">
						<h4>Zeni Template</h4>
						<p>Hope you find this template useful you are free to use it on personal and commercial projects. See the full license at this <a href="http://luiszuno.com/blog/license" >link</a></p>
					</div>
					
				</li>
				
				<li class="third-col">
					
					<div class="widget-block">
						<div id="tweets" class="footer-col tweet">
	         				<h4>Twitter widget</h4>
	         			</div>
	         		</div>
	         		
				</li>
				
				<li class="fourth-col">
					
					<div class="widget-block">
						<h4>Placeholder images</h4>
						<p>Thanks to <a href="http://www.thebeaststudio.com/" >Moe Pike</a> for sharing his work as place holder images for this preview. Visit his <a href="http://www.thebeaststudio.com/" >website</a> and find more of his awesome work.</p>
					</div>
	         		
				</li>-->
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