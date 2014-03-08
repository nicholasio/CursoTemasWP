<?php

add_action('pre_get_posts', 'alterar_query');

function alterar_query( $query ) {
	if ( $query->is_main_query() && ! is_admin() ) {
		$query->set('category_name', 'politica');	
	} 
	
}

add_action('wp_print_scripts', 'load_scripts');

function load_scripts() {
	echo "<link type='text/css' rel='stylesheet' href='teste.css' />";
}

add_filter('the_content', 'filter_the_content');

function filter_the_content( $content ) {
	return $content . "<br /> Todos os direitos reservados à Nícholas André";
} 