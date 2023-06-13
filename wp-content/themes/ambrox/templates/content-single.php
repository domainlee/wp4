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
    ambrox_setPostViews( get_the_ID() );
    ?>
    <div <?php post_class(); ?> >
        <div class="blog-item-box">
        <?php
            if( class_exists('ReduxFramework') ) {
                $ambrox_post_details_title_position = crtheme_opt('ambrox_post_details_title_position');
            } else {
                $ambrox_post_details_title_position = 'header';
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

            // Blog Post Thumbnail
            do_action( 'ambrox_blog_post_thumb' );

            if( $ambrox_post_details_title_position != 'header' ) {
                echo '<h3>'.wp_kses( get_the_title(), $allowhtml ).'</h3>';
            }
            echo '<div class="info">';
                // Blog Post Meta
                do_action( 'ambrox_blog_post_meta' );

                if( get_the_content() ){
                    echo '<div class="blog-content">';
                        the_content();
                        // Link Pages
                        ambrox_link_pages();
                    echo '</div>';
                }
            echo '</div>';        
        echo '</div>';
    echo '</div>';
    /**
    *
    * Hook for Blog Details Author Bio
    *
    * Hook ambrox_blog_details_author_bio
    *
    * @Hooked ambrox_blog_details_author_bio_cb 10
    *
    */
    do_action( 'ambrox_blog_details_author_bio' );

    $ambrox_post_tag = get_the_tags();
    if( class_exists('ReduxFramework') ) {
        $ambrox_post_details_share_options = crtheme_opt('ambrox_post_details_share_options');
        $ambrox_show_post_tag = crtheme_opt( 'ambrox_display_post_tags' );
    } else {
        $ambrox_show_post_tag = true;
        $ambrox_post_details_share_options = false;
    }

    if( ! empty( $ambrox_post_tag ) && $ambrox_show_post_tag || $ambrox_post_details_share_options ){
        echo '<div class="post-tags share">';
            if( $ambrox_show_post_tag  && is_array( $ambrox_post_tag ) && ! empty( $ambrox_post_tag ) ){
                if( count( $ambrox_post_tag ) > 1 ){
                    $tag_text = __( 'Tags: ', 'ambrox' );
                }else{
                    $tag_text = __( 'Tag: ', 'ambrox' );
                }
                echo '<div class="tags">';
                    echo '<h4>'.esc_html( $tag_text ).'</h4>';
                    foreach( $ambrox_post_tag as $tags ){
                        echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a> ';
                    }
                echo '</div>';
            }
            /**
            *
            * Hook for Blog Social Share Options
            *
            * Hook ambrox_blog_details_share_options
            *
            * @Hooked ambrox_blog_details_share_options_cb 10
            *
            */
            do_action( 'ambrox_blog_details_share_options' );
            
        echo '</div>';
        
    }

    /**
    *
    * Hook for Blog Navigation
    *
    * Hook ambrox_blog_details_post_navigation
    *
    * @Hooked ambrox_blog_details_post_navigation_cb 10
    *
    */
    do_action( 'ambrox_blog_details_post_navigation' );

    /**
    *
    * Hook for Blog Details Comments
    *
    * Hook ambrox_blog_details_comments
    *
    * @Hooked ambrox_blog_details_comments_cb 10
    *
    */
    do_action( 'ambrox_blog_details_comments' );