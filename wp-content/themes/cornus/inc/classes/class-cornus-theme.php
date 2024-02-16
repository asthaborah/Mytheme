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
        add_theme_support('custom-logo' , [
            'header-text' => ['site-title' , 'site-description'], 
            'height' => 100,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true
        ]);
    }
}