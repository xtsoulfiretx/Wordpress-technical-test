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
    );
    register_post_type('pies', $args);
    }
    add_action('init', 'post_type_pies');
    /*Custom Pies type end*/

    /*Add description and ingredients fields */
    add_action("add_meta_boxes_{pies}", "pies_init");
    
    function pies_init(){
        add_meta_box(
        "pies_description_meta", 
        "Pie Description", 
        "pies_description", 
        "pies", 
        "normal", 
        "low");

        add_meta_box("pies_ingredients-id", "Pie Ingredients", "pies_ingredients", "pies", "normal", "low");
    }
    
    function pies_description(){
        global $post;
        $custom = get_post_custom($post->ID);
        $pies_description = $custom["pies_description"][0];
        ?>
        <label>Describe your Pie</label>
        <input name="pies_description" value="<?php echo $pies_description; ?>"/>
        <?php
    }
    
    function pies_ingredients() {
        global $post;
        $custom = get_post_custom($post->ID);
        $pies_ingredients = $custom["pies_ingredients"][0];
        ?> 
        <p><label>What goes in your pie? (Ingredients)</label><br />
        <textarea cols="50" rows="5" name="ingredients"><?php echo $pies_ingredients; ?></textarea></p>
        <?php
    }

    /*Change title placeholder text */

    function pies_change_title_text( $title ){
        $screen = get_current_screen();
      
        if  ( 'pies' == $screen->post_type ) {
             $title = 'What type of Pie are you baking?';
        }
      
        return $title;
   }
      
   add_filter( 'enter_title_here', 'pies_change_title_text' );
