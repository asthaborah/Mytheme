<?php 
/**
 * Template for entry header
 * 
 */

$get_post_id = get_the_ID();
$hide_title = get_post_meta($get_post_id , '_hide_page_title',true);
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
    ?>
</header>

