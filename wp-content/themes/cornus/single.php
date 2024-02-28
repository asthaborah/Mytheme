<?php 
/**
 * Single template for all post pages
 * @package Cornus
 */

get_header();
?>

<div id="primary" style = "text-align: center;">
    <main id="main" class="site-main mt-5" role="main">

        <!-- extracting post -->
        <?php 

        if(have_posts()) :  // checks if the post is there or not 
            ?>
            <div class="container">
                <!-- getting the title of the page -->
                <?php 
                    if(is_home() && !is_front_page()){
                        ?>
                            <header class="mb-5">
                                <h1 class="page-title"> <!--screen-reader-text-->
                                    <?php single_post_title();?> <!-- to get the title of the blog -->
                                    
                                </h1>
                            </header>
                        <?php
                    }
                ?>
                    <?php
                        // loop starts here 
                        while(have_posts()) : the_post();
                        
                        get_template_part('template-parts/content');
                                   
                        endwhile;
                        ?>
                    </div>
            </div>
            <?php
        else : 
            get_template_part('template-parts/content-none');   
        endif;
        ?>
        <div class="container">
            <?php 
            // previous and next method
                // previous_post_link();
                // next_post_link();

            //numbering method

            
            ?>
        </div>
    </main>
</div>

<?php 
get_footer();
?>