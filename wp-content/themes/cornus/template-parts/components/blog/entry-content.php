<?php 
/**
 * template for content 
 * 
 * @package Cornus
 */

?>
<!-- Adding excerpt -->
<div class="entry-content" style="text-align:justify;">
    <?php 
        //if you are in the posts page
        if(is_single()){
            the_content(sprintf(
                /**
                 * Used to filter out html tags
                 */
                wp_kses(__("Continue reading %s <span class = 'meta-nav'>&rarr;</span>" , "Cornus") ,
                [
                    'span' => [
                        'class' => []
                    ]
                ]),

                /**
                 * Fetches the title of the post
                 */
                the_title('<span class = "screen-text-reader">"' , '"</span>' , false))

            );
            wp_link_pages([
                'before' => '<div class = "page-links">' . esc_html('Pages:' , 'Cornus'),
                'after'  => '</div>',
            ]);
        }else{
            // if you are in the blog page
            Cornus_the_excerpt(400);
            echo Cornus_read_more();
        }
    ?>
</div>