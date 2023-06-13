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
    exit;
}

function crtheme_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $crtheme_sidebar_widget_title_heading_tag = crtheme_opt('ambrox_sidebar_widget_title_heading_tag');
    } else {
        $crtheme_sidebar_widget_title_heading_tag = 'h4';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'crtheme' ),
        'id'            => 'crtheme-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'crtheme' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><'.esc_attr($crtheme_sidebar_widget_title_heading_tag).'>',
        'after_title'   => '</'.esc_attr($crtheme_sidebar_widget_title_heading_tag).'></div>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'crtheme' ),
        'id'            => 'crtheme-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'crtheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><h4>',
        'after_title'   => '</h4></div>',
    ) );

    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 1', 'crtheme' ),
           'id'            => 'crtheme-footer-1',
           'before_widget' => '<div class="col-lg-4 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 2', 'crtheme' ),
           'id'            => 'crtheme-footer-2',
           'before_widget' => '<div class="col-lg-2 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 3', 'crtheme' ),
           'id'            => 'crtheme-footer-3',
           'before_widget' => '<div class="col-lg-3 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 4', 'crtheme' ),
           'id'            => 'crtheme-footer-4',
           'before_widget' => '<div class="col-lg-3 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Service Widgets Area', 'crtheme' ),
           'id'            => 'crtheme-service-area',
           'before_widget' => '<div class="single-widget"><div id="%1$s" class="services-sidebar %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
    }

}

add_action( 'widgets_init', 'crtheme_widgets_init' );