<?php
// creating Sidebars 
add_action('init', 'Sidebars_register');
 
function Sidebars_register() { 
	$labels = array(
		'name' => esc_html__('Sidebars', "inkstory"),
		'singular_name' => esc_html__('Sidebars Item', "inkstory"),
		'add_new' => esc_html__('Add New', "inkstory"),
		'add_new_item' => esc_html__('Add New Sidebars Item', "inkstory"),
		'edit_item' => esc_html__('Edit Sidebars Item', "inkstory"),
		'new_item' => esc_html__('New Sidebars Item', "inkstory"),
		'view_item' => esc_html__('View Sidebars Item', "inkstory"),
		'search_items' => esc_html__('Search Sidebars', "inkstory"),
		'not_found' =>  esc_html__('Nothing found', "inkstory"),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', "inkstory"),
		'parent_item_colon' => ''
	);	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail', 'custom-fields')
	  ); 
 
	register_post_type( 'sidebars' , $args );
}
?>