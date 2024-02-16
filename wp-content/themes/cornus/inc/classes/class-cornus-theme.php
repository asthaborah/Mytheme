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
        Assets::get_instance();
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

        //adding thumbnail
        add_theme_support('post-thumbnails');

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
    }
}