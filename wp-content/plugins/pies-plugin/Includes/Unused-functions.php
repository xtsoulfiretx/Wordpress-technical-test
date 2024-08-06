/*Add description and ingredients fields */
    add_action("admin_init", "pies_meta_boxes_setup");
    
    function pies_meta_boxes_setup(){
        echo "Test";
        add_action('add_meta_boxes', 'pies_add_meta_boxes');
    }

    function pies_add_meta_boxes(){

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
        $pies_description = $custom['pies_description'][0] ?? '';
        ?>
        <label>Describe your Pie</label><br />
        <textarea cols="50" rows="5" name="pies_description"><?php echo $pies_description; ?></textarea></p>
        <?php
    }
    
    function pies_ingredients() {
        global $post;
        $custom = get_post_custom($post->ID);
        $pies_ingredients = $custom['pies_ingredients'][0] ?? '';
        ?> 
        <p><label>What goes in your pie? (Ingredients)</label><br />
        <textarea cols="50" rows="5" name="pies_ingredients"><?php echo $pies_ingredients; ?></textarea></p>
        <?php
    }

    /*Save Post */
    add_action('save_post', 'save_pie');

    function save_pie() {
        global $post;

        update_post_meta($post->ID, 'pies_description', $_POST['pies_description']);
        update_post_meta($post->ID, 'pies_ingredients', $_POST['pies_ingredients']);
    }