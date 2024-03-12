<?php 
/**
 * Block Patterns
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;


class Block_Patterns{
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
        add_action('init' , [$this , 'register_block_patterns']);
        add_action('init' , [$this , 'register_block_patterns_categories']);
    }

    // custom function for block patterns
    public function register_block_patterns(){
        // since this is a new feature and for backward compatibility we are checking this
        if(function_exists('register_block_pattern')){
            register_block_pattern(
                'Cornus/cover',
                [
                    'title' => __( 'Cornus Cover' , 'Cornus' ),
                    'description' => __('Cornus Cover Block with image and text' , 'Cornus'),
                    'categories' => ['cover'],
                    'content' => '<!-- wp:cover {"url":"http://localhost:8080/Mytheme/wp-content/uploads/2024/03/singapore-1990959_1280.jpg","id":135,"dimRatio":50,"focalPoint":{"x":0.66,"y":0.43},"align":"full","layout":{"type":"constrained"}} -->
                    <div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-135" alt="" src="http://localhost:8080/Mytheme/wp-content/uploads/2024/03/singapore-1990959_1280.jpg" style="object-position:66% 43%" data-object-fit="cover" data-object-position="66% 43%"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"large"} -->
                    <h1 class="wp-block-heading has-text-align-center has-large-font-size"><strong>Never let your memories be greater than your dreams</strong></h1>
                    <!-- /wp:heading -->
                    
                    <!-- wp:heading {"textAlign":"center","level":4,"fontSize":"medium"} -->
                    <h4 class="wp-block-heading has-text-align-center has-medium-font-size">A mind that is stretched by a new experience can never go back to its old dimensions.</h4>
                    <!-- /wp:heading -->
                    
                    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
                    <div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"gradient":"linear-gradient(135deg,rgb(20,8,8) 0%,rgb(155,81,224) 100%)"}},"className":"is-style-outline"} -->
                    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background wp-element-button" style="background:linear-gradient(135deg,rgb(20,8,8) 0%,rgb(155,81,224) 100%)">Blogs</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div></div>
                    <!-- /wp:cover -->'
                ]
            );
        }
    }

    public function register_block_patterns_categories(){
        $pattern_categories = [
            'cover' => __('Cover' , 'Cornus'),
            'carousel' => __('Caraosel' , 'Cornus'),
        ];

        if(!empty($pattern_categories) && is_array($pattern_categories)){
            foreach($pattern_categories as $pattern_category => $pattern_category_label){
                register_block_pattern_category(
                    $pattern_category ,
                    ['label' => $pattern_category_label]
                );
            }
        }
    }


}