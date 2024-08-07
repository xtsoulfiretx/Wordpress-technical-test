<!-- Plugin for technical challenge for Lawgistics -->

## Plugin info
## Name: Pies-plugin
## Version: 0.5
## Alexi Lambrou

## Description
This plugin registers a custom post type called "Pies" and is intended 
to provide a shortcode capable of displaying a list of pies based on 
their pie type. This requires no other plugins or additions to function.

## Installation and Activation

## Step 1: Compress the Plugin Folder
- Compress the `pies-plugin` folder into a ZIP file.

## Step 2: Upload and Install the Plugin
1. **Log in to your WordPress admin dashboard**.
2. **Navigate to Plugins > Add New**.
3. **Click on the "Upload Plugin" button** at the top of the page.
4. **Click on "Choose File"**, select your new `pies-plugin.zip` file, and click "Install Now".
5. **Once the plugin is uploaded, click "Activate Plugin"**.

## Step 3: Verify Plugin is working
1. **Confirm the new Pies post type is registered**
    - This new Post type should be immediately visible within the admin dashboard upon activation.
    - If visible then plugin has been activated correctly and ready for use.

2. **Bake a Pie**
    - Click on the "Pies" tab inside the admin dashboard and then click the "Add new" button.
    - You should see the new post type in action with the custom fields "Pie Type", "Description" 
    and "Ingredients".

3. **Test Shortcode**
    - Create or edit a page or post, and add the `[pies]` shortcode to display the list of pies.
    - Current functionality does not add new pie types based on pies in database but on a predefined
    list.

## Testing
- **Shortcode**: `[pies]`
- Use this shortcode in any post or page to display a list of available pie types.

**Using the Lookup in Shortcode E.g.**: `[pies lookup='cherry']`
The `lookup` attribute in the shortcode allows you to filter pies by their type.
However currently will only work with example list "apple, cherry, pumpkin and blueberry".

## Missing functionality
- **True Lookup**
- Whilst able to technically create a lookup based on an array i would have liked the lookup
to be based on existing pies inside the database. This was not achieved due to lack of experience
with wordpress' backend functionality.

- **Pagination**
- No Pagination was included in this task due to lack of time in completing the rest of this task.
Whilst having experience with pagination in Drupal and basic usage in wordpress this was provided
with a plugin which i did not include during this challenge.

- **Plugins**
- Personally i would have added some additional plugins to handle some of this functionality however,
The wording of the task made me feel as if i should try to handle this challenge without them. 
## Note: This may have been my own misunderstanding or slight miscommunication provided by recruitment agent. 

## Repo
**https://github.com/xtsoulfiretx/Wordpress-technical-test**