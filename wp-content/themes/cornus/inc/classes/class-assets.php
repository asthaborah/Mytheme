<?php 
/**
 * Assets 
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;


class Assets{
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
        add_action('wp_enqueue_scripts', [$this , 'register_styles']);
        add_action('wp_enqueue_scripts', [$this , 'register_scripts']);
    }

    public function register_styles(){
        //Register styles
        wp_register_style('style-css' , get_stylesheet_uri() , [] , filemtime(CORNUS_DIR_PATH . '/style.css') , 'all');
        wp_register_style('bootstrap-css' , CORNUS_DIR_URI . '/assets/src/Library/css/bootstrap.min.css', [] , false , 'all');

        // Enqueue styles
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts(){
        // Registering scripts 
        wp_register_script('main-js', CORNUS_DIR_URI . '/assets/src/js/main.js', ['jquery'], filemtime(CORNUS_DIR_PATH . '/assets/src/js/main.js'), true);
        wp_script_add_data('main-js', 'type', 'module');
        wp_register_script('bootstrap-js', CORNUS_DIR_URI . '/assets/src/Library/js/bootstrap.min.js', ['jquery'], false, true);

        // Enqueue scripts
        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}