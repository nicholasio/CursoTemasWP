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
add_image_size('post-widget-mini', 54,54, true);

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
/*
	Baseado na função odin_pagination
	https://github.com/nicholasio/odin/blob/master/core/helpers.php
*/
function zeniwp_pagination() {
	global $wp_query, $wp_rewrite;

	$total_pages = $wp_query->max_num_pages;


	if ( $total_pages > 1 ) {
		$current_page = max( 1, get_query_var( 'paged' ) );
		$url_base = $wp_rewrite->pagination_base;
		$big = 999999999; // Need an unlikely integer.

		// Sets the URL format.
		if ( $wp_rewrite->permalink_structure ) {
			$format = '?paged=%#%';
		} else {
			$format = '/' . $url_base . '/%#%';
		}

		
		$arguments =array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => $format,
				'current' => $current_page,
				'total' => $total_pages,
				'show_all' => true,
				'type' => 'list',
				'prev_text' => '<<',
				'next_text' => '>>',
			);
		

		$pagination = '<div class="pagination-wrap">' . paginate_links( $arguments ) . '</div>';

		
		if ( $url_base ) {
			$pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
		}

		return $pagination;
	}
}

/***** Criando Widgets *****/
include_once( get_template_directory() . '/inc/widgets/widget_recent_posts.php' );
add_action('widgets_init', 'zeniwp_register_widgets');
function zeniwp_register_widgets() {
	register_widget( 'Zeniwp_Widget_Recent_Posts' );
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
		'id' => 'widgets-topo',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
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

add_action( 'customize_register', 'zeniwp_customize_register' );

function zeniwp_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'slider_text',
		array(
			'title' => 'Texto do Slider',
			'capability' => 'edit_theme_options',
			'priority' => 25,
			'description' => 'Permite você configurar o texto que deverá aparecer ao lado do slider'
		)
	);
	$wp_customize->add_setting(
		'slider_textbox_title',
		array(
			'default' => '',
			'type' => 'option'
		)
	);

	$wp_customize->add_control(
	    'slider_textbox_title',
	    array(
	        'label' => 'Título',
	        'section' => 'slider_text',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting(
		'slider_textbox_desc',
		
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	
	$wp_customize->add_control(
	    'slider_textbox_desc',
	    array(
	        'label' => 'Descrição',
	        'section' => 'slider_text',
	        'type' => 'text',
	    )
	);

	$wp_customize->add_section(
		'footer_text',
		array(
			'title' => 'Texto do rodapé',
			'capability' => 'edit_theme_options',
			'priority' => 35,
			'description' => 'Permite você configurar o texto que deverá no rodapé'
		)
	);

	$wp_customize->add_setting(
		'footer_textbox_desc',
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		'footer_textbox_desc',
		array(
			'label' => 'Texto do Rodapé',
			'section' => 'footer_text',
			'type' => 'text'
		)
	);

	$wp_customize->add_section(
		'social_media',
		array(
			'title' => 'Links para as redes sociais',
			'capability' => 'edit_theme_options',
			'priority' => 45,
			'description' => 'Permite você configurar os link para as redes sociais'
		)
	);

	$wp_customize->add_setting(
		'social_media_google_plus',
		array(
			'default' => '',
			'type' => 'option'
		)
	);

	$wp_customize->add_control(
		'social_media_google_plus',
		array(
			'label' => 'Link para Google +',
			'section' => 'social_media',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'social_media_twitter',
		array(
			'default' => '',
			'type' => 'option'
		)
	);

	$wp_customize->add_control(
		'social_media_twitter',
		array(
			'label' => 'Link para Twitter',
			'section' => 'social_media',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'social_media_facebook',
		array(
			'default' => '',
			'type' => 'option'
		)
	);

	$wp_customize->add_control(
		'social_media_facebook',
		array(
			'label' => 'Link para Facebook',
			'section' => 'social_media',
			'type' => 'text'
		)
	);
}

// ACF
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_metabox-teste',
		'title' => 'Metabox - Teste',
		'fields' => array (
			array (
				'key' => 'field_531b392ea615f',
				'label' => 'URL do projeto',
				'name' => 'url_do_projeto',
				'type' => 'text',
				'instructions' => 'Insira a url do projeto',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'projects',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
