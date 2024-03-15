<?php 
/**
 *
 * Theme functions.
 *
 * @package cornus
 */

 //defining constant for theme path
 if(!defined('CORNUS_DIR_PATH')){
    define('CORNUS_DIR_PATH' , untrailingslashit(get_template_directory())); // returns the path of the main theme
 }

 //defining constant for theme url
 if(!defined('CORNUS_DIR_URI')){
  define('CORNUS_DIR_URI' , untrailingslashit(get_template_directory_uri())); // returns the uri of the main theme
 }

 //defining build path for theme url
 if(!defined('CORNUS_BUILD_URI')){
  define('CORNUS_BUILD_URI' , untrailingslashit(get_template_directory_uri()) . '/assets/build'); // returns the build uri of the main theme
 }

 //defining build path for theme 
 if(!defined('CORNUS_BUILD_PATH')){
  define('CORNUS_BUILD_PATH' , untrailingslashit(get_template_directory()) . '/assets/build'); // returns the build uri of the main theme
 }

 //defining javascript build path for theme url path
 if(!defined('CORNUS_BUILD_JS_DIR_PATH')){
  define('CORNUS_BUILD_JS_DIR_PATH' , untrailingslashit(get_template_directory()) . '/assets/build/js'); // returns the javascript built path of the main theme
 }

 //defining javascript build path for theme url
 if(!defined('CORNUS_BUILD_JS_URI')){
  define('CORNUS_BUILD_JS_URI' , untrailingslashit(get_template_directory_uri()) . '/assets/build/js'); // returns the javascript built path of the main theme
 }

 //defining build image path for theme url
 if(!defined('CORNUS_BUILD_IMG_URI')){
  define('CORNUS_BUILD_IMG_URI' , untrailingslashit(get_template_directory_uri()) . '/assets/build/src/img'); // returns the build image path of the main theme
 }

 //defining build css path for theme url path
 if(!defined('CORNUS_BUILD_CSS_DIR_PATH')){
  define('CORNUS_BUILD_CSS_DIR_PATH' , untrailingslashit(get_template_directory()) . '/assets/build/css'); // returns the build css path of the main theme
 }

 //defining build css path for theme url
 if(!defined('CORNUS_BUILD_CSS_URI')){
  define('CORNUS_BUILD_CSS_URI' , untrailingslashit(get_template_directory_uri()) . '/assets/build/css'); // returns the build css path of the main theme
 }

 require_once CORNUS_DIR_PATH . "/inc/helpers/autoloader.php";
 require_once CORNUS_DIR_PATH . "/inc/helpers/template-tags.php";

 

 function cornus_theme_get_instance(){
   \CORNUS_THEME\Inc\CORNUS_THEME::get_instance();
 }

 cornus_theme_get_instance();

 //Remove Gutenberg block lirary css from loading on the frontend
//  function ebayads_remove_block_styles(){
//   wp_dequeue_style('wp-block-library');
//   wp_dequeue_style('wp-block-library-theme');
//   wp_dequeue_style('wc-block-style'); //remove WooCommerce block css
//  }

//  add_action('wp_enqueue_scripts' , 'ebayads_remove_block_styles' , 100);



