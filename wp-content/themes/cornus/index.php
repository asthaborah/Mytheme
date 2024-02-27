<?php 
/**
 * Main template
 * @package Cornus
 */

get_header();
?>

<div id="primary">
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
                    <!-- adding grid -->
                    <div class="row">
                        <?php
                        $index = 0;
                        $no_of_columns = 3;
                        // loop starts here 
                        while(have_posts()) : the_post();
                        //checking if the remainder is 0 then only print column
                        if(0 === $index % $no_of_columns){
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">    
                            <?php 
                        }
                        get_template_part('template-parts/content');
                                   
                        $index++;
                        if(0 !== $index && 0 === $index % $no_of_columns){ //index is not 0 but it's remainder is getting 0 then end the div
                            ?>
                            </div>
                            <?php
                        }
                        endwhile;
                        ?>
                    </div>
            </div>
            <?php
        else : 
            get_template_part('template-parts/content-none');   
        endif;
        ?>
    </main>
</div>

<?php 
get_footer();
?>