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
                    __('<p style = "border: 1px solid green">Hide page title</p>', 'Cornus'), //Box title
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
        if (array_key_exists('Cornus_hide_title_field', $_POST)) {
            update_post_meta(
                $post_id, //id for the post
                '_hide_page_title', //key for the metabox
                $_POST['Cornus_hide_title_field'] //value for the metabox
            );
        }
    }
}