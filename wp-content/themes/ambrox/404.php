<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $ambrox404title        = ambrox_opt( 'ambrox_fof_title' );
        $ambrox404subtitle     = ambrox_opt( 'ambrox_fof_subtitle' );
        $ambrox404description  = ambrox_opt( 'ambrox_fof_description' );
        $ambrox404btntext      = ambrox_opt( 'ambrox_fof_btn_text' );
    } else {
        $ambrox404title        = __( '404', 'ambrox' );
        $ambrox404subtitle     = __( 'Oops! That page can’t be found', 'ambrox' );
        $ambrox404description  = __( 'Sorry, but the page you are looking for does not existing', 'ambrox' );
        $ambrox404btntext      = __( ' Back To Home', 'ambrox');    
    }


    // get header
    get_header();

    echo '<div class="error-page-area text-center default-padding">';
        echo '<div class="container">';
            echo '<div class="row align-center">';
                echo '<div class="col-lg-8 offset-lg-2">';
                    echo '<div class="error-box">';
                        echo '<h1>'.esc_html( $ambrox404title ).'</h1>';
                        echo '<h2>'.esc_html( $ambrox404subtitle ).'</h2>';
                        echo '<p>'.esc_html( $ambrox404description ).'</p>';
                        echo '<a class="btn circle btn-theme effect btn-md mt-15" href="'.esc_url( home_url('/') ).'">'.esc_html( $ambrox404btntext ).'</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    //footer
    get_footer();