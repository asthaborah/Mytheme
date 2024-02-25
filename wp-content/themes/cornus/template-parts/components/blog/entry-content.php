<?php 
/**
 * template for content 
 * 
 * @package Cornus
 */

?>

<div class="entry-content" style="text-align: center;">
    <?php 
        if(is_single()){
            sprintf(
                wp_kses(__("Continue reading %s <span class = 'meta-nav'>&rarr;</span>" , "Cornus") ,
                [
                    'span' => [
                        'class' => []
                    ]
                ]),

                the_title('<span class = "screen-reader-text">"' , '"</span>' , false)

            );
        }else{
            Cornus_the_excerpt(400);
        }
    ?>
</div>