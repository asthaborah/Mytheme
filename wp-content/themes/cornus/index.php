<?php 
/**
 * Main template file
 * 
 * @package Cornus
 */

// Include header
get_header();
?>

<div id="primary">
    <main id="main" class="site-main mt-5" role="main">

        <?php 
        // Check if there are posts available
        if (have_posts()) :  
            ?>
            <div class="container">
                <?php 
                // Display page title if on the home page but not the front page
                if (is_home() && !is_front_page()) {
                    ?>
                    <header class="mb-5">
                        <h1 class="page-title screen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                }
                ?>
                
                <div class="row">
                    <?php
                    $index = 0; // Initialize post counter
                    $no_of_columns = 3; // Number of columns per row
                    
                    // Start the loop to display posts
                    while (have_posts()) : the_post();
                    
                        // Start a new row every 3rd post
                        if ($index % $no_of_columns === 0) {
                            echo '<div class="row">';
                        }
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">    
                            <?php 
                            // Include template part for displaying post content
                            get_template_part('template-parts/content');
                            ?>
                        </div>
                        <?php
                        $index++; // Increment post counter
                        
                        // Close the row after every 3rd post
                        if ($index % $no_of_columns === 0) {
                            echo '</div>'; // Close row
                        }
                        
                    endwhile;
                    
                    // Close the last row if it's not already closed
                    if ($index % $no_of_columns !== 0) {
                        echo '</div>'; // Close row
                    }
                    ?>
                </div> <!-- .row -->

            </div> <!-- .container -->

            <?php
        else : 
            // If no posts found, include template part for no content message
            get_template_part('template-parts/content-none');   
        endif;
        ?>
        
        <div class="container">
            <?php 
            // Include pagination function
            Cornus_pagination(); 
            ?>
        </div>
        
    </main>
</div>

<?php 
// Include footer
get_footer();
?>
