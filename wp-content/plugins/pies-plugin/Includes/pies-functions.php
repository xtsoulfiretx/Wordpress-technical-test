<?php 

// Link style sheet
function pies_enqueue_style() {
    wp_enqueue_style('pies_style', plugin_dir_url(__FILE__) . '../assets/style.css' );
}

add_action('wp_enqueue_scripts', 'pies_enqueue_style');

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

add_action( 'init', 'create_posttype' );
/* Custom Post Type End */

/*Custom Pies post type start*/
function post_type_pies() {
    $supports = array(
    'title', // Post title
    'editor', // post content
    'thumbnail', // featured images
    'custom-fields',
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
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_admin_bar' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    );
    register_post_type('pies', $args);
    }
    add_action('init', 'post_type_pies');
    /*Custom Pies post type end*/

    // Add meta boxes
    function add_pies_meta_boxes() {
        add_meta_box('pies_meta_box', 'Pie Details', 'display_pies_meta_box', 'pies', 'normal', 'high');
    }
    add_action('add_meta_boxes', 'add_pies_meta_boxes');

    // Display the meta box
    function display_pies_meta_box($post) {
        $pie_type = get_post_meta($post->ID, 'pie_type', true);
        $description = get_post_meta($post->ID, 'description', true);
        $ingredients = get_post_meta($post->ID, 'ingredients', true);
        ?>
        <label for="pie_type">Pie Type:</label>
        <input type="text" name="pie_type" value="<?php echo esc_attr($pie_type); ?>" class="widefat" /><br/><br/>

        <label for="description">Description:</label>
        <textarea name="description" class="widefat"><?php echo esc_textarea($description); ?></textarea><br/><br/>

        <label for="ingredients">Ingredients:</label>
        <textarea name="ingredients" class="widefat"><?php echo esc_textarea($ingredients); ?></textarea>
        <?php
    }

    // Save the meta box data
    function save_pies_meta_box($post_id) {
        // Check the user's permissions.
        if ('pies' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }

        // Sanitize user input.
        $pie_type = sanitize_text_field($_POST['pie_type']);
        $description = sanitize_textarea_field($_POST['description']);
        $ingredients = sanitize_textarea_field($_POST['ingredients']);

        // Update the meta field in the database.
        update_post_meta($post_id, 'pie_type', $pie_type);
        update_post_meta($post_id, 'description', $description);
        update_post_meta($post_id, 'ingredients', $ingredients);
    }
    add_action('save_post', 'save_pies_meta_box');

    /*Change title placeholder text */
    function pies_change_title_text( $title ){
        $screen = get_current_screen();
      
        if  ( 'pies' == $screen->post_type ) {
             $title = 'What type of Pie are you baking?';
        }
      
        return $title;
   }
      
   add_filter( 'enter_title_here', 'pies_change_title_text' );

    // Shortcode
    if (!function_exists('pies_shortcode')) {
    
    function pies_shortcode($atts) {
        // Define default attributes.
        $atts = shortcode_atts(
            array(
                'lookup' => '',
            ),
            $atts,
            'pies'
        );

        // Extract the 'lookup' attribute.
        $lookup = sanitize_text_field($atts['lookup']);

        // Sample data for pies.
        $pie_type = array(
            'apple' => 'Apple Pie',
            'cherry' => 'Cherry Pie',
            'pumpkin' => 'Pumpkin Pie',
            'blueberry' => 'Blueberry Pie',
        );

        $output = '';

        // If 'lookup' is provided and exists in sample data, return the corresponding pie.
        if ($lookup && array_key_exists($lookup, $pie_type)) {
            $output = '<div>' . esc_html($pie_type[$lookup]) . '</div>';
        } else {
            // If 'lookup' is not provided or does not exist, return all pie types.
            $output .= '<div>Available pie types:</div><ul>';
            foreach ($pie_type as $key => $pie) {
                $output .= '<li>' . esc_html($pie) . '</li>';
            }
            $output .= '</ul>';
        }

        return $output;
    }

    add_shortcode('pies', 'pies_shortcode');
}