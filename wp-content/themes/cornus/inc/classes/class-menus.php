<?php 
/**
 * Menus
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;


class Menus{
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
        add_action('init', [$this , 'register_menus']);
    }

    public function register_menus(){
        // This function is used to register menus
        register_nav_menus([
            'cornus-header-menu' => esc_html__('Header Menu' , 'cornus'),
            'cornus-footer-menu' => esc_html__('Footer Menu' , 'cornus'),
        ]);
    }

    public function get_menu_id($location){
        //get all the locations of the menus
        $locations = get_nav_menu_locations();
        
        //get the id by the theme location
        $menu_id = $locations[$location];

        return !empty ($menu_id) ? $menu_id : '';

        
    }
    
}