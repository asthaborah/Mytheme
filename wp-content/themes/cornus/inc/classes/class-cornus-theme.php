<?php
/**
 * Bootstraps the Theme
 *
 * Add basic functionalities of the theme
 *
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;




class CORNUS_THEME{
    use singleton;
    protected function __construct(){
        //load class
        Sidebars::get_instance();
        Menus::get_instance();
        Assets::get_instance();
        Meta_Boxes::get_instance();
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */

        add_action('after_setup_theme' , [$this , 'setup_theme']);
    }

    public function setup_theme(){
        //dynamically add site title in the wordpress theme
        add_theme_support('title-tag');

        //dynamically add custom logo in the wordpress theme
        add_theme_support('custom-logo' , [
            'header-text' => ['site-title' , 'site-description'], 
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true
        ]);

        //dynamically adding the background image
        add_theme_support('custom-background' , [
            'default-color' => '#fff',
            'default-image' => '',
            'default-repeat' => 'no-repeat',
        ]);

        /**
         * adding thumbail
         */
        add_theme_support('post-thumbnails');

        /**
         * Registering image sizes
         */

        add_image_size('featured-thumbnail' , 350 , 233, true);

        //selective refresh
        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support('html5' , [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ]);
        /**
         * Loads the editor styles in the gutenberg editor
         * 
         * Editor styles allow you to provide the css used by wordpress so that it can match the frontend styling
         * If we don't add this , the editor styles will only load in the classic editor (Tiny mice)
         */
        add_theme_support('edior-styles');

        /**
         * It allows you to link a custom stylesheet file to the tinyMCE edior within the post edit screen
         * 
         * Add Path to our custom editor style.
         * 
         * Since we are not passing any paramter to the function
         * It will by default, link the editor-style.css file located directly under the current thme directory
         * You can add 'editor.css' if you like to support TinyMCE editor styles
         * 
         *
         */
        add_editor_style('assets/build/css/editor.css');

        add_theme_support('wp-block-styles');

        add_theme_support('align-wide');

        //for setting max-width of the content
        global $content_width;

        if(!isset($content_width)){
            $content_width = 1240;
        }
    }
}