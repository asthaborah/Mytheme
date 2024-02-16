<?php 
/**
 *
 * Theme functions.
 *
 * @package cornus
 */

 //defining cosntant for theme path
 if(!defined('CORNUS_DIR_PATH')){
    define('CORNUS_DIR_PATH' , untrailingslashit(get_template_directory())); // returns the path of the main theme
 }

 //defining cosntant for theme url
 if(!defined('CORNUS_DIR_URI')){
   define('CORNUS_DIR_URI' , untrailingslashit(get_template_directory_uri())); // returns the uri of the main theme
 }

 require_once CORNUS_DIR_PATH . "/inc/helpers/autoloader.php";

 

 function cornus_theme_get_instance(){
   \CORNUS_THEME\Inc\CORNUS_THEME::get_instance();
 }

 cornus_theme_get_instance();



