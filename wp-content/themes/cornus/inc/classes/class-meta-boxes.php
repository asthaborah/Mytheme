<?php
/**
 * Meta boxes
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;

use CORNUS_THEME\Inc\Traits\singleton;


class Meta_Boxes
{
    use singleton;
    protected function __construct()
    {
        //load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions.
         */

        //adding meta boxes
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        //saving the value of the metaboxes
        add_action('save_post', [$this, 'save_post_meta_data']);
    }

    public function add_custom_meta_box()
    {
        $screens = ['post']; // in only post type screen it is available
        foreach ($screens as $screen) {
            ?>
                <?php      
                add_meta_box(
                    'hide-page-title', //unique id of the div
                    __('<p style = "border: 1px solid green;" class = "mt-5">Hide page title</p>', 'Cornus'), //Box title
                    [$this, 'custom_meta_box_html'], //content callback
                    $screen, // Post type
                    'advanced', // context
                    'low'
                );
                ?>
            <?php
        }
    }

    public function custom_meta_box_html($post)
    {
        /**
         * Create a nonce
         */

        wp_nonce_field( plugin_basename(__FILE__) , 'hide_title_meta_box_name');
        $value = get_post_meta($post->ID, '_hide_page_title', true); // retrieves the value for the specified post id and key 
        ?>
        <label for="Cornus-field">
            <?php esc_html_e('Hide the page title', 'Cornus'); ?>
        </label>
        <select name="Cornus_hide_title_field" id="Cornus-field" class="postbox">
            <option value="">
                <?php esc_html_e('Select', 'Cornus'); ?>
            </option>
            <option value="yes" <?php selected($value, 'yes'); ?>>
                <?php esc_html_e('Yes', 'Cornus'); ?>
            </option>
            <option value="no" <?php selected($value, 'no'); ?>>
                <?php esc_html_e('No', 'Cornus'); ?>
            </option>
        </select>
        <?php
    }

    //saving the meta data in the database
    public function save_post_meta_data($post_id)
    {
        /**
         * When the post is saved or updated we will verify the nonce 
         * check if the current user is authorized
         */

        //checking if the user can edit a post
        if(! current_user_can('edit_post' , $post_id)){
            return; 
        }

        /**
         * check if the nonce value we recieved is the same we created
         */

        if(!isset($_POST['hide_title_meta_box_name']) || ! wp_verify_nonce(plugin_basename(__FILE__) , $_POST['hide_title_meta_box_name'])){
            return;
        }

        if (array_key_exists('Cornus_hide_title_field', $_POST)) {
            update_post_meta(
                $post_id, //id for the post
                '_hide_page_title', //key for the metabox
                $_POST['Cornus_hide_title_field'] //value for the metabox
            );
        }
    }
}