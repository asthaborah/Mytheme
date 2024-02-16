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

        // add_action('after-')
    }

    public function setup_theme(){

    }
}