<?php 
/**
 * Meta boxes
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;


class Meta_Boxes{
    use singleton;
    protected function __construct()
    {
        //load class
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        
        add_action('add_meta_boxes' , [$this , 'add_custom_meta_box']);
    }

    public function add_custom_meta_box(){
        $screens = ['post']; //which post type it is available
        foreach($screens as $screen){
            add_meta_box(
                'hide-page-title', //unique id
                __('Hide page title' , 'Cornus') , //Box title
                [$this , 'custom_meta_box_html'], //content callback
                $screen, // Post type
                'side', // context
            );
        }
    }

    public function custom_meta_box_html($post){
        $value = get_post_meta($post->ID , '_hide_page_title' , true);
        ?>
        <label for="Cornus-field"><?php esc_html_e('Hide the page title' , 'Cornus');?></label>
	    <select name="Cornus_field" id="Cornus-field" class="postbox">
		    <option value=""><?php esc_html_e('Select' , 'Cornus'); ?></option>
		    <option value="yes" <?php selected($value , 'yes'); ?>>
                <?php esc_html_e('Yes' , 'Cornus'); ?>
            </option>
		    <option value="no" <?php selected($value , 'no'); ?>>
                <?php esc_html_e('No' , 'Cornus'); ?>
            </option>
	    </select>
        <?php
    }
}