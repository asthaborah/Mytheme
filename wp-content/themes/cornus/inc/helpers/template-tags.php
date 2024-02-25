<?php 
/**
 * Custom functions
 * 
 * @package Cornus
 */


 function get_the_post_custom_thumbnail($post_id , $size = 'featured-thumbnail' , $additional_attributes = []){

    $custom_thumbnail = '';

    //if the id is null
    if(null === $post_id){
        $post_id = get_the_ID();
    }
    
    //if the id is present 
    if(has_post_thumbnail($post_id)){
        $default_atttribute = [
            'loading' => 'lazy'
        ];
    }

    $attributes = array_merge($additional_attributes , $default_atttribute);

    $custom_thumbnail = wp_get_attachment_image(
        get_post_thumbnail_id($post_id) , $size , false , $attributes
    );

    

    return $custom_thumbnail;

}

function the_post_custom_thumbnail($post_id , $size = 'featured-thumbnail' , $additional_attributes = []){
    echo get_the_post_custom_thumbnail($post_id , $size , $additional_attributes);
}


function Cornus_posted_on(){
    $time_string = '<time class = "entry-date published updated" datetime = "%1$s"> %2$s </time>';

    //when post is modified
    if( get_the_time('U') !== get_the_modified_time('U')){
        $time_string = '<time class = "entry-date published" datetime = "%1$s"> %2$s</time><time class = "updated" datetime = "%3$s"> %4$s </time>';
    }

    $time_string = sprintf( $time_string , 
    esc_attr( get_the_date(DATE_W3C)) ,
    esc_attr( get_the_date()) ,
    esc_attr( get_the_modified_date(DATE_W3C)) ,
    esc_attr( get_the_modified_date()) ,
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s' , 'post date' , 'Cornus'),
        '<a href = "'  .esc_url(get_permalink()) .  '" rel = "bookmark">' . $time_string . '</a>'
    );

    echo '<span class = "posted-on text-secondary">'. $posted_on .'</span>';

}

function Cornus_posted_by(){
   $byline = sprintf(
        esc_html_x(' by %s', 'post author' , 'Cornus'),
        '<span class = "author vcard"><a href = "' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
   ); 

   echo '<span class = "byline text-secondary">' . $byline . '</span>';
}

function Cornus_the_excerpt( $trim_character_count = 0){
    if(! has_excerpt() || $trim_character_count === 0){
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt , 0 , $trim_character_count);
    
    $excerpt= substr($excerpt , 0 , strrpos($excerpt , " "));

    echo $excerpt . "[...]";
}

