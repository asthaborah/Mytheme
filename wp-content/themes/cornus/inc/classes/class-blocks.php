<?php 
/**
 * Custom blocks 
 * @package Cornus
 */

namespace CORNUS_THEME\Inc;
use CORNUS_THEME\Inc\Traits\singleton;


class Blocks{
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
        
        add_action('block_categories_all' , [$this , 'add_block_categories']);
    }

    public function add_block_categories($categories){
        $category_slugs = wp_list_pluck($categories , 'slug');

        $result =  in_array('cornus' , $category_slugs , true) ?  $categories : 
        array_merge(
            $categories,
            [
                [
                    'slug' => 'Cornus',
                    'title' => __('Cornus Blocks' , 'Cornus'),
                    'icon' => 'table-row-after'
                ]
            ]
        );

        return $result;
    }
}