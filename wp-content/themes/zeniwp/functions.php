<?php

add_action('init', 'zeniwp_init');

function zeniwp_init() {
	zeniwp_register_menus();
	zeniwp_register_post_types();
	zeniwp_register_taxonomies();
}

function zeniwp_register_menus(){
	register_nav_menu('menu-primario', 'Menu Principal ( Topo )');
}

function zeniwp_register_post_types() {
	register_post_type('projects',
		array(
			'labels' => array(
				'name' => 'Projetos',
				'singular_name' => 'Projeto',
				'add_new' => 'Adicionar Projeto',
				'edit_item' => 'Editar Projeto'
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail')
		)
	);
}

function zeniwp_register_taxonomies() {
	register_taxonomy('projects-category', 'projects', 
		array(
			'labels' => array(
				'name' => 'Categoria de Projeto',
				'menu_name' => 'Categorias'
			),
			'public' => true,
			'hierarchical' => true
		)
	);

	register_taxonomy('projects-tags', 'projects', 
		array(
			'labels' => array(
				'name' => 'Habilidades',
			),
			'public' => true,
			'hierarchical' => false
		)
	);

}

add_action('wp_enqueue_scripts', 'zeniwp_enqueue_scripts');

function zeniwp_enqueue_scripts() {
	wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/css/style.css');
	wp_enqueue_style('jq.tweet', get_stylesheet_directory_uri()    . '/css/jquery.tweet.css');
	wp_enqueue_style('superfish', get_stylesheet_directory_uri()   . '/css/superfish.css'); 
	wp_enqueue_style('prettyPhoto', get_stylesheet_directory_uri() . '/js/prettyPhoto/css/prettyPhoto.css');
	wp_enqueue_style('poshytip', get_stylesheet_directory_uri()    . '/js/poshytip-1.1/src/jquery.poshytip.min.js');   
	wp_enqueue_style('flexslider', get_stylesheet_directory_uri()  . '/css/flexslider.css' );
	wp_enqueue_style('less', get_stylesheet_directory_uri() 		. '/css/lessframework.css');
	wp_enqueue_style('skin', get_stylesheet_directory_uri()        . '/css/skin.css');


	wp_enqueue_script('css3mediaqueries', 
			get_stylesheet_directory_uri() . '/js/css3-mediaqueries.js', array('jquery'));

	wp_enqueue_script('custom', get_stylesheet_directory_uri()           . '/js/custom.js');

	
	wp_enqueue_script('tabs', get_stylesheet_directory_uri()   		  . '/js/tabs.js');

	wp_enqueue_script('jq.tweet-js', get_stylesheet_directory_uri() 	  . '/js/tweet/jquery.tweet.js');
	wp_enqueue_script('hoverintent', get_stylesheet_directory_uri()      . '/js/superfish-1.4.8/js/hoverIntent.js');
	wp_enqueue_script('superfish', get_stylesheet_directory_uri()        . '/js/superfish-1.4.8/js/superfish.js');   
	wp_enqueue_script('supersubs', get_stylesheet_directory_uri()        . '/js/superfish-1.4.8/js/supersubs.js');
	wp_enqueue_script('jsPrettyPhoto', get_stylesheet_directory_uri()    . '/js/prettyPhoto/js/jquery.prettyPhoto.js');
	wp_enqueue_script('jsposhytip', get_stylesheet_directory_uri()    . '/js/poshytip-1.1/src/jquery.poshytip.min.js');
	wp_enqueue_script('jsflexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js'); 
	wp_enqueue_script('modernizr', get_stylesheet_directory_uri()    . '/js/modernizr.js');
}

add_image_size('post-thumb', 540, 266, true);
add_image_size('post-slider', 620, 305, true);
add_image_size('post-projeto', 220, 137, true);
add_image_size('post-projeto-big', 300, 168, true);
add_image_size('post-mini', 300, 168, true);

add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video' ) );

add_filter( 'excerpt_length', 'zeniwp_excerpt_length' );

function zeniwp_excerpt_length( $length ) {
	return 15;
}




add_shortcode('zeniwp_twitter', 'zeniwp_fn_twitter');

function zeniwp_fn_twitter( $atts, $content ) {

	$twitter_link = "http://www.twitter.com/";

	$perfil = '';
	if ( ! empty($content) )
		$perfil = $content;
	else if ( isset($atts['name']) && ! empty($atts['name']) )
		$perfil = $atts['name'];

	$perfil = esc_attr($perfil);
	$twitter_link .= $perfil;

	return "<a href='{$twitter_link}' target='_blank'>{$perfil}</a> <br />";

} 

register_sidebar( 
	array(	
		'name' => 'Barra Lateral',
		'id' => 'barra-lateral',
		'desription' => 'Widgets nesta área serão exibidos na barra lateral',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	) 
);

register_sidebar(
	array(
		'name' => 'Widgets Topo',
		'id' => 'widgets-topo'
	)
);

register_sidebar(
	array(
		'name' => 'Widgets Rodapé',
		'id' => 'widgets-rodapé',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	)
);