<?php 
/*
**
*@package cornus
**
*/ 

get_header();
?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">

        <!-- extracting post -->
        <?php 

        if(have_posts()){ // checks if the post is thereor not 
            ?>
            <div class="container">
                <!-- getting the title of the page -->
                <?php 
                    if(is_home() && !is_front_page()){
                        ?>
                            <header class="mb-5">
                                <h1 class="page-title screen-reader-text">
                                    <?php single_post_title();?>
                                </h1>
                            </header>
                        <?php
                    }
                ?>
                <?php                 
                    while(have_posts()) : the_post();
                    the_title(); //set the post data in the title template
                    the_content(); //set the post data in the content template
                    endwhile;
                ?>
            </div>
            <?php
        }
        
        ?>
    </main>
</div>

<?php 
get_footer();
?>