<?php 

/* Custom Post Type Start */

function create_posttype() {
register_post_type( 'news',

// CPT Options

array( 'labels' => array (
        'name' => __( 'Pies' ),
        'singular_name' => __( 'Pie' )
    ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'pies'),
    ));
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/* Custom Post Type End */
