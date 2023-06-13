<?php
get_header();?>
	
    <div class="default-padding">
        <div class="container">
            <div class="services-single-content">
                <?php
                 while ( have_posts() ) : the_post();

        			the_content();

        			// If comments are open or we have at least one comment, load up the comment template.
        			if ( comments_open() || get_comments_number() ) :
        				comments_template();
        			endif;

        		endwhile; // End of the loop.
        		?>
                
            </div>
        </div>
    </div>

<?php 
get_footer();