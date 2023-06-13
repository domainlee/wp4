<?php
/**
 * Template Name: Service Single
 * Description: The template file for displaying service single pages
 *
 * @package Ambrox
 */

if('ambrox_tab_builder' == $post->post_type ){
get_header(); } ?>
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            
            <div class="modal-body">

                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

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
    </div> 
<?php 
if('ambrox_tab_builder' == $post->post_type ){
get_footer();
}