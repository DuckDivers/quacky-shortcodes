<?php 
/* Dive Sites */
function my_custom_post_site() {
	$labelssite = array(
		'name'               => _x( 'Dive Site', 'post type general name' ),
		'singular_name'      => _x( 'Dive Site', 'post type singular name' ),
		'add_new'            => _x( 'Add a Dive Site', 'book' ),
		'add_new_item'       => __( 'Create a new Dive Site' ),
		'edit_item'          => __( 'Edit Dive Site' ),
		'new_item'           => __( 'Add a Dive Site' ),
		'all_items'          => __( 'All Dive Sites' ),
		'view_item'          => __( 'View Dive Site' ),
		'search_items'       => __( 'Search Dive Sites' ),
		'not_found'          => __( 'No Dive Sites Added' ),
		'not_found_in_trash' => __( 'No Dive Sites in Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Dive Site',
	);
	$argssite = array(
		'labels'        => $labelssite,
		'description'   => 'What type of dive site this is',
		'public'        => true,
		'menu_position' => 5,
		'menu_icon' 	=> 'dashicons-sos',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
		'has_archive'   => true,
		'hierarchical'	=> true,
		'rewrite'		=> array('slug' => 'dive-sites/%site-category%','with_front' => false),
		'query_var'		=> true,
		'show_in_nav_menus'	 => TRUE,
		'show_in_menu'	=> TRUE,
		'label'			=> 'Dive Sites',
		'publicly_queryable'  => TRUE
	);
	register_post_type( 'site', $argssite );
}

add_action( 'init', 'my_custom_post_site' );

/* taxonomies for Dive Sites(category taxonomy) */
function my_taxonomies_sitetype() {
	$labelsTaxsitetype = array(
		'name'              => _x( 'Site Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Site Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Site Type' ),
		'all_items'         => __( 'All Site Types' ),
		'parent_item'       => __( 'Parent Item' ),
		'parent_item_colon' => __( 'Site Type:' ),
		'edit_item'         => __( 'Edit Site Type' ),
		'update_item'       => __( 'Update Site Type' ),
		'add_new_item'      => __( 'Add New Site Type' ),
		'new_item_name'     => __( 'New Site Type Name' ),
		'menu_name'         => __( 'Site Type' ),
	);
	$argsTaxsitetype = array(
		'labels' => $labelsTaxsitetype,
		'hierarchical' 	=> true,
		'public'		=> true,
		'query_var'		=> 'category',
		//slug for custom post type
		'rewrite'		=>  array('slug' => 'dive-site' ),
		'_builtin'		=> false,
	);
	register_taxonomy( 'site-category', 'site', $argsTaxsitetype );
}

add_action( 'init', 'my_taxonomies_sitetype', 0 );

/* Filter modifies the permalink */

add_filter('post_link', 'category_permalink', 1, 3);
add_filter('post_type_link', 'category_permalink', 1, 3);

function category_permalink($permalink, $post_id, $leavename) {
	// %category% to rewrite post type
	    if (strpos($permalink, '%site-category%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'site-category');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
        	$taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-category';

    return str_replace('%site-category%', $taxonomy_slug, $permalink);
}

?>