<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>
			<?php 
				bloginfo('name');
				if ( is_home() )
					echo ' - ' . get_bloginfo('description');
				else
					wp_title('|', true);
			?>
		</title>
		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
		
		
		<?php wp_head(); ?>
	</head>
	
	<body lang="en">
	
		<header class="clearfix">
		
			<!-- top widget -->
			<div id="top-widget-holder">
				<div class="wrapper">
					<div id="top-widget">
						<div class="padding">
							<ul  class="widget-cols clearfix">
								<?php dynamic_sidebar('widgets-topo'); ?>	
							</ul>				
						</div>
					</div>
				</div>
				<a href="#" id="top-open">Menu</a>
			</div>
			<!-- ENDS top-widget -->
		
			<div class="wrapper clearfix">
				
				<a href="<?php echo home_url(); ?>" id="logo"><img  src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Zeni"></a>
				
				<?php get_template_part('partials/menu', 'topo'); ?>
				
			</div>
		</header>