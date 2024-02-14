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

 require_once CORNUS_DIR_PATH . "/inc/helpers/autoloaders.php";
 function wp_enqueue_scripts(){

 }

