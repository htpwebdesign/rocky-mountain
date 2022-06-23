<?php

function rmf_register_custom_post_types() {
//Register Musician CPT 
 $labels = array(
        'name'                  => _x( 'Musician', 'post type general name' ),
        'singular_name'         => _x( 'Musician', 'post type singular name'),
        'menu_name'             => _x( 'Musicians', 'admin menu' ),
        'name_admin_bar'        => _x( 'Musician', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Musician' ),
        'add_new_item'          => __( 'Add New Musician' ),
        'new_item'              => __( 'New Musician' ),
        'edit_item'             => __( 'Edit Musician' ),
        'view_item'             => __( 'View Musician' ),
        'all_items'             => __( 'All Musicians' ),
        'search_items'          => __( 'Search Musicians' ),
        'parent_item_colon'     => __( 'Parent Musician:' ),
        'not_found'             => __( 'No Musicians found.' ),
        'not_found_in_trash'    => __( 'No Musicians found in Trash.' ),
        'archives'              => __( 'Musicians Archives'),
        'insert_into_item'      => __( 'Insert into Musician'),
        'uploaded_to_this_item' => __( 'Uploaded to this Musician'),
        'filter_item_list'      => __( 'Filter Musician list'),
        'items_list_navigation' => __( 'Musician list navigation'),
        'items_list'            => __( 'Musicians list'),
        'featured_image'        => __( 'Musician featured image'),
        'set_featured_image'    => __( 'Set Musician featured image'),
        'remove_featured_image' => __( 'Remove Musician featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'musician' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 3,
        'menu_icon'          => 'dashicons-microphone',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'rmf-musician', $args );

// Register Vendor CPT 
$labels = array(
        'name'                  => _x( 'Vendor', 'post type general name' ),
        'singular_name'         => _x( 'Vendor', 'post type singular name'),
        'menu_name'             => _x( 'Vendors', 'admin menu' ),
        'name_admin_bar'        => _x( 'Vendor', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Vendor' ),
        'add_new_item'          => __( 'Add New Vendor' ),
        'new_item'              => __( 'New Vendor' ),
        'edit_item'             => __( 'Edit Vendor' ),
        'view_item'             => __( 'View Vendor' ),
        'all_items'             => __( 'All Vendors' ),
        'search_items'          => __( 'Search Vendors' ),
        'parent_item_colon'     => __( 'Parent Vendor:' ),
        'not_found'             => __( 'No Vendors found.' ),
        'not_found_in_trash'    => __( 'No Vendors found in Trash.' ),
        'archives'              => __( 'Vendors Archives'),
        'insert_into_item'      => __( 'Insert into Vendor'),
        'uploaded_to_this_item' => __( 'Uploaded to this Vendor'),
        'filter_item_list'      => __( 'Filter Vendor list'),
        'items_list_navigation' => __( 'Vendor list navigation'),
        'items_list'            => __( 'Vendors list'),
        'featured_image'        => __( 'Vendor featured image'),
        'set_featured_image'    => __( 'Set Vendor featured image'),
        'remove_featured_image' => __( 'Remove Vendor featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'vendor' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-drumstick',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'rmf-vendor', $args );

    // Register Workshop CPT 
$labels = array(
        'name'                  => _x( 'Workshop', 'post type general name' ),
        'singular_name'         => _x( 'Workshop', 'post type singular name'),
        'menu_name'             => _x( 'Workshops', 'admin menu' ),
        'name_admin_bar'        => _x( 'Workshop', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'Workshop' ),
        'add_new_item'          => __( 'Add New Workshop' ),
        'new_item'              => __( 'New Workshop' ),
        'edit_item'             => __( 'Edit Workshop' ),
        'view_item'             => __( 'View Workshop' ),
        'all_items'             => __( 'All Workshops' ),
        'search_items'          => __( 'Search Workshops' ),
        'parent_item_colon'     => __( 'Parent Workshop:' ),
        'not_found'             => __( 'No Workshops found.' ),
        'not_found_in_trash'    => __( 'No Workshops found in Trash.' ),
        'archives'              => __( 'Workshops Archives'),
        'insert_into_item'      => __( 'Insert into Workshop'),
        'uploaded_to_this_item' => __( 'Uploaded to this Workshop'),
        'filter_item_list'      => __( 'Filter Workshop list'),
        'items_list_navigation' => __( 'Workshops list navigation'),
        'items_list'            => __( 'Workshops list'),
        'featured_image'        => __( 'Workshop featured image'),
        'set_featured_image'    => __( 'Set Workshop featured image'),
        'remove_featured_image' => __( 'Remove Workshop featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'workshop' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-games',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'rmf-workshop', $args );

// Register FAQ CPT 
$labels = array(
        'name'                  => _x( 'FAQ', 'post type general name' ),
        'singular_name'         => _x( 'FAQ', 'post type singular name'),
        'menu_name'             => _x( 'FAQs', 'admin menu' ),
        'name_admin_bar'        => _x( 'FAQ', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'FAQ' ),
        'add_new_item'          => __( 'Add New FAQ' ),
        'new_item'              => __( 'New FAQ' ),
        'edit_item'             => __( 'Edit FAQ' ),
        'view_item'             => __( 'View FAQ' ),
        'all_items'             => __( 'All FAQs' ),
        'search_items'          => __( 'Search FAQs' ),
        'parent_item_colon'     => __( 'Parent FAQ:' ),
        'not_found'             => __( 'No FAQs found.' ),
        'not_found_in_trash'    => __( 'No FAQs found in Trash.' ),
        'archives'              => __( 'FAQs Archives'),
        'insert_into_item'      => __( 'Insert into FAQs'),
        'uploaded_to_this_item' => __( 'Uploaded to this FAQs'),
        'filter_item_list'      => __( 'Filter FAQ list'),
        'items_list_navigation' => __( 'FAQs list navigation'),
        'items_list'            => __( 'FAQs list'),
        'featured_image'        => __( 'FAQ featured image'),
        'set_featured_image'    => __( 'Set FAQ featured image'),
        'remove_featured_image' => __( 'Remove FAQ featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'faq' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-yes',
        'supports'           => array( 'title' ),
    );

    register_post_type( 'rmf-faq', $args );
}
add_action( 'init', 'rmf_register_custom_post_types' );


//Flush Permalinks
function crog_rewrite_flush() {
    c_rog_register_custom_post_types();
    flush_rewrite_rules();
    crog_register_taxonomies();
}
add_action( 'after_switch_theme', 'crog_rewrite_flush' );