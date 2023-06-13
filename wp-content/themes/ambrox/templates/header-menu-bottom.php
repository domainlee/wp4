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

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( ambrox_meta('page_breadcrumb_area') ) ) {
            $ambrox_page_breadcrumb_area  = ambrox_meta('page_breadcrumb_area');
        } else {
            $ambrox_page_breadcrumb_area = '1';
        }
    }else{
        $ambrox_page_breadcrumb_area = '1';
    }

    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );

    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $ambrox_page_breadcrumb_area == '1' ) {
            if( class_exists( 'ReduxFramework' )  ){
                $class = '';
            }else{
                $class = 'thumb-less';
            }
            echo '<!-- Page title -->';
            echo '<div class="breadcrumb-area custom-breadcrumb shadow dark bg-cover text-center text-light '.esc_attr($class).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        echo '<div class="col-lg-12 col-md-12">';
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                                if( ambrox_meta('page_breadcrumb_settings') == 'page' ) {
                                    $ambrox_page_title_switcher = ambrox_meta('page_title');
                                } elseif( ambrox_opt('ambrox_page_title_switcher') == true ) {
                                    $ambrox_page_title_switcher = ambrox_opt('ambrox_page_title_switcher');
                                }else{
                                    $ambrox_page_title_switcher = '1';
                                }
                            } else {
                                $ambrox_page_title_switcher = '1';
                            }

                            if( $ambrox_page_title_switcher == '1' ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $ambrox_page_title_tag    = ambrox_opt('ambrox_page_title_tag');
                                }else{
                                    $ambrox_page_title_tag    = 'h1';
                                }

                                if( defined( 'CMB2_LOADED' )  ){
                                    if( !empty( ambrox_meta('page_title_settings') ) ) {
                                        $ambrox_custom_title = ambrox_meta('page_title_settings');
                                    } else {
                                        $ambrox_custom_title = 'default';
                                    }
                                }else{
                                    $ambrox_custom_title = 'default';
                                }

                                if( $ambrox_custom_title == 'default' ) {
                                    echo ambrox_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $ambrox_page_title_tag ),
                                            "text"  => esc_html( get_the_title( ) ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    echo ambrox_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $ambrox_page_title_tag ),
                                            "text"  => esc_html( ambrox_meta('custom_page_title') ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }

                            }
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                                if( ambrox_meta('page_breadcrumb_settings') == 'page' ) {
                                    $ambrox_breadcrumb_switcher = ambrox_meta('page_breadcrumb_trigger');
                                } else {
                                    $ambrox_breadcrumb_switcher = ambrox_opt('ambrox_enable_breadcrumb');
                                }

                            } else {
                                $ambrox_breadcrumb_switcher = '1';
                            }

                            if( $ambrox_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                ambrox_breadcrumbs(
                                    
                                );
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
        }
    } else {
        if( class_exists( 'ReduxFramework' )  ){
            $class = '';
        }else{
            $class = 'thumb-less';
        }
        echo '<!-- Page title -->';
        echo '<div class="breadcrumb-area shadow dark bg-cover text-center text-light '.esc_attr($class).'">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-lg-12 col-md-12">';
                        if( class_exists( 'ReduxFramework' )  ){
                            $ambrox_page_title_switcher  = ambrox_opt('ambrox_page_title_switcher');
                        }else{
                            $ambrox_page_title_switcher = '1';
                        }

                        if( $ambrox_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $ambrox_page_title_tag    = ambrox_opt('ambrox_page_title_tag');
                            }else{
                                $ambrox_page_title_tag    = 'h1';
                            }
                            if ( is_archive() ){
                                echo ambrox_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $ambrox_page_title_tag ),
                                        "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif ( is_home() ){
                                $ambrox_blog_page_title_setting = ambrox_opt('ambrox_blog_page_title_setting');
                                $ambrox_blog_page_title_switcher = ambrox_opt('ambrox_blog_page_title_switcher');
                                $ambrox_blog_page_custom_title = ambrox_opt('ambrox_blog_page_custom_title');
                                if( class_exists('ReduxFramework') ){
                                    if( $ambrox_blog_page_title_switcher ){
                                        echo ambrox_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $ambrox_page_title_tag ),
                                                "text"  => !empty( $ambrox_blog_page_custom_title ) && $ambrox_blog_page_title_setting == 'custom' ? esc_html( $ambrox_blog_page_custom_title) : esc_html__( 'Blog', 'ambrox' ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }else{
                                    echo ambrox_heading_tag(
                                        array(
                                            "tag"   => "h1",
                                            "text"  => esc_html__( 'Blog', 'ambrox' ),
                                            'class' => 'breadcumb-title',
                                        )
                                    );
                                }
                            }elseif( is_search() ){
                                echo ambrox_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $ambrox_page_title_tag ),
                                        "text"  => esc_html__( 'Search Result', 'ambrox' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }elseif( is_404() ){
                                echo ambrox_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $ambrox_page_title_tag ),
                                        "text"  => esc_html__( '404 PAGE', 'ambrox' ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }else{
                                $posttitle_position  = ambrox_opt('ambrox_post_details_title_position');
                                $postTitlePos = false;
                                if( is_single() ){
                                    if( class_exists( 'ReduxFramework' ) ){
                                        if( $posttitle_position && $posttitle_position != 'header' ){
                                            $postTitlePos = true;
                                        }
                                    }else{
                                        $postTitlePos = false;
                                    }
                                }
                                if( $postTitlePos != true ){
                                    echo ambrox_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $ambrox_page_title_tag ),
                                            "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    if( class_exists( 'ReduxFramework' ) ){
                                        $ambrox_post_details_custom_title  = ambrox_opt('ambrox_post_details_custom_title');
                                    }else{
                                        $ambrox_post_details_custom_title = __( 'Blog Details','ambrox' );
                                    }

                                    if( !empty( $ambrox_post_details_custom_title ) ) {
                                        echo ambrox_heading_tag(
                                            array(
                                                "tag"   => esc_attr( $ambrox_page_title_tag ),
                                                "text"  => wp_kses( $ambrox_post_details_custom_title, $allowhtml ),
                                                'class' => 'breadcumb-title'
                                            )
                                        );
                                    }
                                }
                            }
                        }
                        if( class_exists('ReduxFramework') ) {
                            $ambrox_breadcrumb_switcher = ambrox_opt( 'ambrox_enable_breadcrumb' );
                        } else {
                            $ambrox_breadcrumb_switcher = '1';
                        }
                        if( $ambrox_breadcrumb_switcher == '1' ) {
                            ambrox_breadcrumbs(
                                array(
                                    'breadcrumbs_classes' => 'nav',
                                )
                            );
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }