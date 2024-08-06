<?php 

/* Custom Post Type Start */

function create_posttype() {
register_post_type( 'pies',

// CPT Options

array( 'labels' => array (
        'name' => __( 'pies' ),
        'singular_name' => __( 'pie' )
    ),
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'pies'),
    ));
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
/* Custom Post Type End */

/*Custom Pies type start*/
function post_type_pies() {
    $supports = array(
    'title', // Post title
    'editor', // post content
    'thumbnail', // featured images
    );
    $labels = array(
    'name' => _x('Pies', 'plural'),
    'singular_name' => _x('Pie', 'singular'),
    'menu_name' => _x('Pies', 'admin menu'),
    'name_admin_bar' => _x('Pies', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Bake a new Pie'),
    'new_item' => __('Bake a Pie'),
    'edit_item' => __('Edit Pie'),
    'view_item' => __('View Pie'),
    'all_items' => __('All Pies'),
    'search_items' => __('Search Pies'),
    'not_found' => __('No pies baked recently.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'pies'),
    'has_archive' => true,
    'hierarchical' => false,
    'show_in_rest' => true,
    // 'template' => array(
    //     array(
    //         'core/group',
    //         array(
    //             'align' => 'full',
    //         ),
    //     ),
    //     array(
    //         'core/heading',
    //         array(
    //             'textAlign' => 'center',
    //             'level' => 1,
    //             'placeholder' => __('Describe your pie.', )
    //         )
    //     )
    // )
    );
    register_post_type('pies', $args);
    }
    add_action('init', 'post_type_pies');
    /*Custom Pies type end*/



    /*Change title placeholder text */

    function pies_change_title_text( $title ){
        $screen = get_current_screen();
      
        if  ( 'pies' == $screen->post_type ) {
             $title = 'What type of Pie are you baking?';
        }
      
        return $title;
   }
      
   add_filter( 'enter_title_here', 'pies_change_title_text' );
