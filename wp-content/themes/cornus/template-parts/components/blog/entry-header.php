<?php 
/**
 * Template for entry header
 * 
 */

$get_post_id = get_the_ID();
$hide_title = get_post_meta($get_post_id , '_hide_page_title',true);
$heading_class = !empty ($hide_title) && 'yes' == $hide_title ? 'hide' : ''; 
$has_post_thumbnail = get_the_post_thumbnail($get_post_id);
?>

<header class="entry-header">
    <?php 
    //featured image
        if($has_post_thumbnail){
            ?>
            <div class="entry-image">
                <a href="<?php echo esc_url(get_permalink())?>">
                    <?php 
                    the_post_custom_thumbnail(
                        $get_post_id,
                        'featured-thumbnail',
                        [
                            'sizes' => '(max-width:350px) 350px , 233px',
                            'class' => 'attachment-featured-large size-featured-image'
                        ]
                    ) ?>
                </a>
            </div>
            <?php
        }

        //Title
        if(is_single() || is_page()){ // if we are on the post page or any other page
            printf(
                '<h1 class = "page-title text-dark %1$s">%2$s</h1>',
                esc_attr($heading_class), // adding hide class to the h1 tag
                wp_kses_post(get_the_title()) // restricting use of any other html tags as nothing is mentioned here 
            );
        }else{ // if we are on the blog page
            printf(
                '<h2 style = "font-weight:500; text-align:center;" class = "entry-title mb-3 mt-3"><a class = "text-dark" href ="%1$s" > %2$s </a> </h2>',
                esc_url(get_the_permalink()), //gets the link for the single post
                wp_kses_post(get_the_title()) //retrieves the title 
            );
        }
    ?>

</header>

