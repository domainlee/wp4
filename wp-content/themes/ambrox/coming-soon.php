<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 * Template Name: Coming Soon Page
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) ) {
        $ambroxcoming_soontitle     = crtheme_opt( 'ambrox_coming_soon_title' );
        $ambroxcoming_soonsubtitle  = crtheme_opt( 'ambrox_coming_soon_subtitle' );
        $ambroxcoming_soonbtntext   = crtheme_opt( 'ambrox_coming_soon_btn_text' );
    } else {
        $ambroxcoming_soontitle     = __( 'Website Under Construction', 'ambrox' );
        $ambroxcoming_soonsubtitle  = __( 'Website Under Construction. Work Is Going On For The Website Please Stay With Us.', 'ambrox' );
        $ambroxcoming_soonbtntext   = __( 'Return To Home', 'ambrox' );
    }


    // get header
    get_header();

    echo '<section class="vs-error-wrapper space">';
        echo '<div class="container">';
            echo '<div class="error-content text-center">';
                if( ! empty( crtheme_opt( 'ambrox_coming_soon_image', 'url' ) ) ){
                    echo '<div class="error-img">';
                        echo ambrox_img_tag( array(
                            'url'   => esc_url( crtheme_opt( 'ambrox_coming_soon_image', 'url' ) ),
                        ) );
                    echo '</div>';
                }
                echo '<div class="row justify-content-center">';
                    echo '<div class="col-xl-9">';
                        if( ! empty( $ambroxcoming_soontitle ) ){
                            echo '<h2 class="error-title">'.esc_html( $ambroxcoming_soontitle ).'</h2>';
                        }
                        if( ! empty( $ambroxcoming_soonsubtitle ) ){
                            echo '<p class="error-text px-xl-5">'.esc_html( $ambroxcoming_soonsubtitle ).'</p>';
                        }
                        echo '<a href="'.esc_url( home_url('/') ).'" class="vs-btn mask-btn"><span class="btn-text">'.esc_html( $ambroxcoming_soonbtntext ).'</span><span class="btn-text-mask">'.esc_html( $ambroxcoming_soonbtntext ).'</span></a>';

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</section>';

    //footer
    get_footer();