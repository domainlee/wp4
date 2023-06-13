<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Ambrox
 * @version   : 1.0
 * @Author    : Ambrox
 * @Author URI: https://themeforest.net/user/domainlee/portfolio
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$ambrox_layout = ambrox_meta( 'custom_page_layout' );

if( $ambrox_layout == '1' ){
	echo '<div class="ambrox-main-wrapper">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}elseif( $ambrox_layout == '2' ){
    echo '<div class="ambrox-main-wrapper">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}else{
	echo '<div class="ambrox-fluid">';
}
	echo '<div class="builder-page-wrapper">';
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	}

	echo '</div>';
if( $ambrox_layout == '1' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}elseif( $ambrox_layout == '2' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}else{
	echo '</div>';
}

//footer
get_footer();