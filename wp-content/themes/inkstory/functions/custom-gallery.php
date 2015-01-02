<?php
// creating gallery 
add_action('init', 'gallery_register');
 
function gallery_register() {
 
	$labels = array(
		'name' => esc_html__('Gallery', "inkstory"),
		'singular_name' => esc_html__('Gallery Item', "inkstory"),
		'add_new' => esc_html__('Add New', "inkstory"),
		'add_new_item' => esc_html__('Add New Gallery Item', "inkstory"),
		'edit_item' => esc_html__('Edit Gallery Item', "inkstory"),
		'new_item' => esc_html__('New Gallery Item', "inkstory"),
		'view_item' => esc_html__('View Gallery Item', "inkstory"),
		'search_items' => esc_html__('Search Gallery', "inkstory"),
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
 
	register_post_type( 'gallery' , $args );
}

?>