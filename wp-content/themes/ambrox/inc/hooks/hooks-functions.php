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


    // preloader hook function
    if( ! function_exists( 'ambrox_preloader_wrap_cb' ) ) {
        function ambrox_preloader_wrap_cb() {
            $preloader_display  =  ambrox_opt('ambrox_display_preloader');

            if( class_exists('ReduxFramework') ){
                if( $preloader_display ){
                    
                    if( ! empty( ambrox_opt( 'ambrox_preloader_text' ) ) ){

                        $str = ambrox_opt( 'ambrox_preloader_text' );
                        $chars = str_split($str);
                        echo '<div id="preloader">';
                            echo '<div id="ambrox-preloader" class="ambrox-preloader">';
                                echo '<div class="animation-preloader">';
                                    echo '<div class="spinner"></div>';
                                    echo '<div class="txt-loading">';
                                        foreach ($chars as $char) {
                                            echo '<span data-text-preloader="'.esc_attr($char).'" class="letters-loading"> '.esc_html($char).' </span>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="loader">';
                                    echo '<div class="row">';
                                        echo '<div class="col-3 loader-section section-left"><div class="bg"></div></div>';
                                        echo '<div class="col-3 loader-section section-left"><div class="bg"></div></div>';
                                        echo '<div class="col-3 loader-section section-right"><div class="bg"></div></div>';
                                        echo '<div class="col-3 loader-section section-right"><div class="bg"></div></div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
            }
        }
    }

    // Header Hook function
    if( !function_exists('ambrox_header_cb') ) {
        function ambrox_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('ambrox_blog_start_wrap_cb') ) {
        function ambrox_blog_start_wrap_cb() {

            echo '<div class="blog-area right-sidebar full-blog default-padding">';
                echo '<div class="container">';
                    echo '<div class="blog-items">';
                        echo '<div class="row">';
        }
    }

    // Blog End Wrapper Function
    if( !function_exists('ambrox_blog_end_wrap_cb') ) {
        function ambrox_blog_end_wrap_cb() {
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('ambrox_blog_col_start_wrap_cb') ) {
        function ambrox_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $ambrox_blog_sidebar = ambrox_opt('ambrox_blog_sidebar');
                $ambrox_blog_grid = ambrox_opt('ambrox_blog_grid');
                if( $ambrox_blog_sidebar == '2' && is_active_sidebar('ambrox-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12 order-lg-last">';
                } elseif( $ambrox_blog_sidebar == '3' && is_active_sidebar('ambrox-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    if( $ambrox_blog_grid != '1' ) {
                        echo '<div class="blog-content col-md-12">';
                    }else{
                        echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                    }
                }
            } else {
                if( is_active_sidebar('ambrox-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('ambrox_blog_col_end_wrap_cb') ) {
        function ambrox_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('ambrox_blog_sidebar_cb') ) {
        function ambrox_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_blog_sidebar = ambrox_opt('ambrox_blog_sidebar');
            } else {
                $ambrox_blog_sidebar = 2;
            }
            if( $ambrox_blog_sidebar != 1 && is_active_sidebar('ambrox-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('ambrox_blog_details_sidebar_cb') ) {
        function ambrox_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_blog_single_sidebar = ambrox_opt('ambrox_blog_single_sidebar');
            } else {
                $ambrox_blog_single_sidebar = 4;
            }
            if( $ambrox_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('ambrox_blog_pagination_cb') ) {
        function ambrox_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('ambrox_blog_content_cb') ) {
        function ambrox_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_blog_grid = ambrox_opt('ambrox_blog_grid');
            } else {
                $ambrox_blog_grid = '1';
            }

            if( $ambrox_blog_grid == '1' ) {
                $ambrox_blog_grid_class = 'col-lg-12';
            } elseif( $ambrox_blog_grid == '2' ) {
                $ambrox_blog_grid_class = 'col-lg-6 col-md-6 single-item';
            } else {
                $ambrox_blog_grid_class = 'col-lg-4 col-md-6 single-item';
            }
            if( $ambrox_blog_grid == '1' ) {
                echo '<div class="blog-item-box">';
                    if( have_posts() ) {
                        while( have_posts() ) {
                            the_post();
                            echo '<div class="single-item">';
                                echo '<div class="'.esc_attr($ambrox_blog_grid_class).'">';
                                    get_template_part('templates/content',get_post_format());
                                echo '</div>';
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    } else{
                        get_template_part('templates/content','none');
                    }
                echo '</div>';
            }else{
                echo '<div class="row">';
                    if( have_posts() ) {
                        while( have_posts() ) {
                            the_post();
                            echo '<div class="'.esc_attr($ambrox_blog_grid_class).'">';
                                get_template_part('templates/content',get_post_format());
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    } else{
                        get_template_part('templates/content','none');
                    }
                echo '</div>'; 
            }
            
        }
    }

    // footer content Function
    if( !function_exists('ambrox_footer_content_cb') ) {
        function ambrox_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') || is_page_template('home-slider-version.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'ambrox_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'ambrox_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'ambrox_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $ambrox_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $ambrox_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $ambrox_footer_builder_trigger = ambrox_opt('ambrox_footer_builder_trigger');
                            if( $ambrox_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $ambrox_global_footer_select = get_post( ambrox_opt( 'ambrox_footer_builder_select' ) );
                                $footer_post = get_post( $ambrox_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                ambrox_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $ambrox_footer_builder_trigger = ambrox_opt('ambrox_footer_builder_trigger');
                    if( $ambrox_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $ambrox_global_footer_select = get_post( ambrox_opt( 'ambrox_footer_builder_select' ) );
                        $footer_post = get_post( $ambrox_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        ambrox_footer_global_option();
                    }
                }
            } else {
                    echo '<footer class="footer-bottom bg-dark">';
                        echo '<div class="container">';
                            echo '<p class="text-center text-white">'.esc_html__( 'Copyright', 'ambrox' ).' <i class="fal fa-copyright"></i> '.esc_html( date('Y') ).' <a href="'.esc_url( '#' ).'">'.esc_html( 'Ambrox', 'ambrox' ).'</a>'.esc_html__( ' All Rights Reserved by', 'ambrox' ).' <a href="'.esc_url('#').'">'.esc_html__( 'Validthemes', 'ambrox' ).'</a></p>';
                        echo '</div>';
                    echo '</footer>';
            }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('ambrox_blog_details_wrapper_start_cb') ) {
        function ambrox_blog_details_wrapper_start_cb( ) {
            echo '<section class="blog-area single full-blog right-sidebar full-blog default-padding">';
                echo '<div class="container">';
                    echo '<div class="blog-items">';
                        echo '<div class="row">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('ambrox_blog_details_col_start_cb') ) {
        function ambrox_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_blog_single_sidebar = ambrox_opt('ambrox_blog_single_sidebar');
                if( $ambrox_blog_single_sidebar == '2' && is_active_sidebar('ambrox-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12 order-last">';
                } elseif( $ambrox_blog_single_sidebar == '3' && is_active_sidebar('ambrox-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                }

            } else {
                if( is_active_sidebar('ambrox-blog-sidebar') ) {
                    echo '<div class="blog-content col-lg-8 col-md-12">';
                } else {
                    echo '<div class="blog-content col-lg-10 offset-lg-1 col-md-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('ambrox_blog_post_meta_cb') ) {
        function ambrox_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_display_post_date      =  ambrox_opt('ambrox_display_post_date');
                $ambrox_display_post_admin     =  ambrox_opt('ambrox_display_admin');
                $ambrox_display_post_views     =  ambrox_opt('ambrox_display_post_views');

            } else {
                $ambrox_display_post_date      = '1';
                $ambrox_display_post_admin     = '1';
                $ambrox_display_post_views     = '';
            }

            echo '<!-- Blog Meta -->';
            echo '<div class="meta">';

                echo '<ul>';
                    if( $ambrox_display_post_date ){
                        echo '<li>';
                            echo '<a href="'.esc_url( ambrox_blog_date_permalink() ).'"><i class="fas fa-calendar-alt"></i><time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time></a>';
                        echo '</li>';
                    }
                    if( $ambrox_display_post_admin ){
                        echo '<li>';
                            echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fas fa-user-circle"></i><span>'.esc_html(  get_the_author() ).'</span></a>';
                        echo '</li>';
                    }
                    if( $ambrox_display_post_views ){
                        echo '<li>';
                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fal fa-eye"></i>';
                        echo '<span>';
                        echo ambrox_getPostViews( get_the_ID() );
                        echo esc_html__( ' Views', 'ambrox' );
                        echo '</span>';
                        echo '</a>';
                        echo '</li>';
                    }
                echo '</ul>';
            echo '</div>';

        }
    }
    // Blog Details Post Navigation hook function
    if( !function_exists( 'ambrox_blog_details_post_navigation_cb' ) ) {
        function ambrox_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_post_details_post_navigation = ambrox_opt('ambrox_post_details_post_navigation');
            } else {
                $ambrox_post_details_post_navigation = true;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( $ambrox_post_details_post_navigation && ! empty( $prevpost ) || !empty( $nextpost ) ) {

                echo '<div class="post-pagi-area">';
                    if( ! empty( $prevpost ) ) {
                        echo '<div class="post-previous">';
                            echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'"><div class="icon"><i class="fas fa-angle-double-left"></i></div><div class="nav-title">'.esc_html__( ' Previus Post', 'ambrox' ).'<h5>'.wp_trim_words( wp_kses( get_the_title( $prevpost->ID ), $allowhtml ), '2', '' ).'</h5></div></a>';
                        echo '</div>';
                    }
                    if( ! empty( $nextpost ) ) {
                        echo '<div class="post-next">';
                            echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'"><div class="nav-title">'.esc_html__( 'Next Post ', 'ambrox' ).'<h5>'.wp_trim_words( wp_kses( get_the_title( $nextpost->ID ), $allowhtml ), '2', '' ).'</h5></div> <div class="icon"><i class="fas fa-angle-double-right"></i></div></a>';
                        echo '</div>';
                    }
                echo '</div>';
            }
        }
    }

    // blog details share options hook function
    if( !function_exists('ambrox_blog_details_share_options_cb') ) {
        function ambrox_blog_details_share_options_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_post_details_share_options = ambrox_opt('ambrox_post_details_share_options');
            } else {
                $ambrox_post_details_share_options = false;
            }
            if( function_exists( 'ambrox_social_sharing_buttons' ) && $ambrox_post_details_share_options ) {
                echo '<div class="social">';
                    echo '<h4>'.esc_html__('Share:','ambrox').'</h4>';
                    echo '<ul>';
                        echo ambrox_social_sharing_buttons();
                    echo '</ul>';
                    echo '<!-- End Social Share -->';
                echo '</div>';
            }
        }
    }

    // blog details author bio hook function
    if( !function_exists('ambrox_blog_details_author_bio_cb') ) {
        function ambrox_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  ambrox_opt( 'ambrox_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if( !empty( get_the_author_meta('description')  ) && $postauthorbox == '1' ) {
                echo '<!-- Start Post Author -->';
                echo '<div class="post-author">';
                    echo '<div class="thumb">';
                        echo ambrox_img_tag( array(
                            "url"   => esc_url( get_avatar_url( get_the_author_meta('ID'), array(
                            "size"  => 150
                            ) ) ),
                        ) );
                    echo '</div>';
                    echo '<div class="info">';
                        echo ambrox_heading_tag( array(
                            "tag"   => "h4",
                            "text"  => ambrox_anchor_tag( array(
                                "text"  => esc_html( ucwords( get_the_author() ) ),
                                "url"   => esc_url( get_author_posts_url( get_the_author_meta('ID') ) ),
                            ) ),
                        ) );
                        if( ! empty( get_the_author_meta('description') ) ) {
                            echo '<p>';
                                echo esc_html( get_the_author_meta('description') );
                            echo '</p>';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<!-- Ebd Post Author -->';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('ambrox_blog_details_comments_cb') ) {
        function ambrox_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo ambrox_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'ambrox' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('ambrox_blog_details_col_end_cb') ) {
        function ambrox_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('ambrox_blog_details_wrapper_end_cb') ) {
        function ambrox_blog_details_wrapper_end_cb( ) {
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('ambrox_page_start_wrap_cb') ) {
        function ambrox_page_start_wrap_cb( ) {
            echo '<section class="default-padding">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('ambrox_page_end_wrap_cb') ) {
        function ambrox_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('ambrox_page_col_start_wrap_cb') ) {
        function ambrox_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_page_sidebar = ambrox_opt('ambrox_page_sidebar');
            }else {
                $ambrox_page_sidebar = '1';
            }
            if( $ambrox_page_sidebar == '2' && is_active_sidebar('ambrox-page-sidebar') ) {
                echo '<div class="col-lg-8 order-last">';
            } elseif( $ambrox_page_sidebar == '3' && is_active_sidebar('ambrox-page-sidebar') ) {
                echo '<div class="col-lg-8">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('ambrox_page_col_end_wrap_cb') ) {
        function ambrox_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('ambrox_page_sidebar_cb') ) {
        function ambrox_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $ambrox_page_sidebar = ambrox_opt('ambrox_page_sidebar');
            }else {
                $ambrox_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $ambrox_page_layoutopt = ambrox_opt('ambrox_page_layoutopt');
            }else {
                $ambrox_page_layoutopt = '3';
            }

            if( $ambrox_page_layoutopt == '1' && $ambrox_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $ambrox_page_layoutopt == '2' && $ambrox_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('ambrox_page_content_cb') ) {
        function ambrox_page_content_cb( ) {
            
            echo '<div class="page--content clearfix">';
                the_content();
                // Link Pages
                ambrox_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    if( !function_exists('ambrox_blog_post_thumb_cb') ) {
        function ambrox_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $ambrox_post_slider_thumbnail = ambrox_meta( 'post_format_slider' );

            if( !empty( $ambrox_post_slider_thumbnail ) ){
                echo '<div class="thumb">';
                    echo '<div class="blog-slider owl-carousel owl-theme">';
                        foreach( $ambrox_post_slider_thumbnail as $single_image ){
                            if( ! is_single() ){
                                echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                            }
                                echo ambrox_img_tag( array(
                                    'url'   => esc_url( $single_image )
                                ) );
                            if( ! is_single() ){
                                echo '</a>';
                            }
                        }
                    echo '</div>';
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="thumb">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }
                        the_post_thumbnail();
                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && !empty ( ambrox_meta( 'post_format_video' ) ) ){
                    echo '<div class="thumb responsive-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( ambrox_meta( 'post_format_video' ) ).'">';
                          echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo ambrox_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $ambrox_audio = ambrox_meta( 'post_format_audio' );
                if( !empty( $ambrox_audio ) ){
                    echo '<div class="thumb audio-post">';
                        echo wp_oembed_get( $ambrox_audio );
                    echo '</div>';
                }elseif( !is_single() ){
                    echo '<div class="blog-audio blog-img">';
                        echo ambrox_embedded_media( array( 'audio', 'iframe' ) );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists( 'ambrox_blog_post_content_cb' ) ) {
        function ambrox_blog_post_content_cb( ) {
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
                'sup'       => array(),
                'sub'       => array(),
            );

            // Blog Post Meta
            do_action( 'ambrox_blog_post_meta' );
        }
    }

    if( ! function_exists( 'ambrox_blog_postexcerpt_read_content_cb') ) {
        function ambrox_blog_postexcerpt_read_content_cb( ) {
            if( class_exists( 'ReduxFramework' ) ) {
                $ambrox_excerpt_length = ambrox_opt('ambrox_blog_postExcerpt');
            } else {
                $ambrox_excerpt_length = '24';
            }
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( class_exists( 'ReduxFramework' ) ) {
                $ambrox_blog_admin = ambrox_opt( 'ambrox_blog_post_author' );

                $ambrox_blog_readmore_setting_val = ambrox_opt('ambrox_blog_readmore_setting');
                if( $ambrox_blog_readmore_setting_val == 'custom' ) {
                    $ambrox_blog_readmore_setting = ambrox_opt('ambrox_blog_custom_readmore');
                } else {
                    $ambrox_blog_readmore_setting = __( 'Read More', 'ambrox' );
                }
            } else {
                $ambrox_blog_readmore_setting = __( 'Read More', 'ambrox' );
                $ambrox_blog_admin = true;
            }

            echo '<div class="content">';
                echo '<h3><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h3>';
                echo '<!-- Post Summary -->';
                    echo ambrox_paragraph_tag( array(
                        "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $ambrox_excerpt_length, '' ), $allowhtml ),
                    ) );
                echo '<!-- End Post Summary -->';
                if( $ambrox_blog_admin || !empty( $ambrox_blog_readmore_setting ) ){
                    if( !empty( $ambrox_blog_readmore_setting ) ){
                        echo '<!-- Button -->';
                            echo '<a href="'.esc_url( get_permalink() ).'" class="btn btn-theme effect btn-md">'.esc_html( $ambrox_blog_readmore_setting ).'</a>';
                        echo '<!-- End Button -->';
                    }
                }
            echo '</div>';        
        }
    }