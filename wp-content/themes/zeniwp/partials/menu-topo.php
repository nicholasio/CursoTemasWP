<!--<nav>
	<ul id="nav" class="sf-menu">
		<li class="current-menu-item"><a href="index.html">HOME</a></li>
		<li><a href="blog.html">BLOG</a></li>
		<li><a href="page.html">ABOUT</a>
			<ul>
				<li><a href="#">Submenu</a></li>
				<li><a href="#">Submenu</a></li>
				<li><a href="#">Submenu</a></li>
			
			</ul>
		</li>
		<li><a href="portfolio.html">WORK</a></li>
		<li><a href="contact.html">CONTACT</a></li>
		<li><a href="http://www.mojo-themes.com/item/zeni-wordpress-theme/?r=ansimuz">WORDPRESS VERSION</a></li>
	</ul>
	<div id="combo-holder"></div>
</nav> -->

<nav>
	<?php 
		wp_nav_menu(
			array(
				'theme-location' => 'menu-primario',
				'container' => '',
				'menu_id' => 'nav',
				'menu_class' => 'sf-menu'
			)
		);
	?>
	<div id="combo-holder"></div>
</nav>