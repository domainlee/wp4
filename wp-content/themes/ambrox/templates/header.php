<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') || is_page_template('home-slider-version.php') ) {
            $ambrox_post_id = get_the_ID();

            // Get the page settings manager
            $ambrox_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $ambrox_page_settings_model = $ambrox_page_settings_manager->get_model( $ambrox_post_id );

            // Retrieve the color we added before
            $ambrox_header_style = $ambrox_page_settings_model->get_settings( 'ambrox_header_style' );
            $ambrox_header_builder_option = $ambrox_page_settings_model->get_settings( 'ambrox_header_builder_option' );

            if( $ambrox_header_style == 'header_builder'  ) {

                if( !empty( $ambrox_header_builder_option ) ) {
                    $ambroxheader = get_post( $ambrox_header_builder_option );
                    
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $ambroxheader->ID );
                    
                }
            } else {
                // global options
                $ambrox_header_builder_trigger = crtheme_opt('ambrox_header_options');
                if( $ambrox_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $ambrox_global_header_select = get_post( crtheme_opt( 'ambrox_header_select_options' ) );
                    $header_post = get_post( $ambrox_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    ambrox_global_header_option();
                }
            }
        } else {
            $ambrox_header_options = crtheme_opt('ambrox_header_options');
            if( $ambrox_header_options == '1' ) {
                ambrox_global_header_option();
            } else {
                $ambrox_header_select_options = crtheme_opt('ambrox_header_select_options');
                $ambroxheader = get_post( $ambrox_header_select_options );
                echo '<header>';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $ambroxheader->ID );
                echo '</header>';
            }
        }
    } else {
        ambrox_global_header_option();
    }