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
            /**
             * Cover Pattern
             */
            $cover_content = $this->get_pattern_content('template-parts/patterns/cover');

            register_block_pattern(
                'Cornus/cover',
                [
                    'title' => __( 'Cornus Cover' , 'Cornus' ),
                    'description' => __('Cornus Cover Block with image and text' , 'Cornus'),
                    'categories' => ['cover'],
                    'content' => $cover_content,
                ]
            );

            /**
             * Two Column Pattern
             */
            $cover_content = $this->get_pattern_content('template-parts/patterns/two-columns');

            register_block_pattern(
                'Cornus/two-columns',
                [
                    'title' => __( 'Cornus Two Columns' , 'Cornus' ),
                    'description' => __('Cornus two columns Block with heading and text' , 'Cornus'),
                    'categories' => ['two-columns'],
                    'content' => $cover_content,
                ]
            );
        }
    }

    public function get_pattern_content($template_path){
        ob_start();

        get_template_part($template_path);

        $pattern_content = ob_get_contents();

        ob_end_clean();

        return $pattern_content;
    }

    public function register_block_patterns_categories(){
        $pattern_categories = [
            'cover' => __('Cover' , 'Cornus'),
            'two-columns' => __('Two-columns' , 'Cornus'),
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