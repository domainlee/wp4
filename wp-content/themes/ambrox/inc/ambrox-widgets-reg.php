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

function ambrox_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $ambrox_sidebar_widget_title_heading_tag = ambrox_opt('ambrox_sidebar_widget_title_heading_tag');
    } else {
        $ambrox_sidebar_widget_title_heading_tag = 'h4';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'ambrox' ),
        'id'            => 'ambrox-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'ambrox' ),
        'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><'.esc_attr($ambrox_sidebar_widget_title_heading_tag).'>',
        'after_title'   => '</'.esc_attr($ambrox_sidebar_widget_title_heading_tag).'></div>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'ambrox' ),
        'id'            => 'ambrox-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'ambrox' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title"><h4>',
        'after_title'   => '</h4></div>',
    ) );

    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 1', 'ambrox' ),
           'id'            => 'ambrox-footer-1',
           'before_widget' => '<div class="col-lg-4 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 2', 'ambrox' ),
           'id'            => 'ambrox-footer-2',
           'before_widget' => '<div class="col-lg-2 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 3', 'ambrox' ),
           'id'            => 'ambrox-footer-3',
           'before_widget' => '<div class="col-lg-3 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 4', 'ambrox' ),
           'id'            => 'ambrox-footer-4',
           'before_widget' => '<div class="col-lg-3 col-md-6 item"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="title">',
           'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Service Widgets Area', 'ambrox' ),
           'id'            => 'ambrox-service-area',
           'before_widget' => '<div class="single-widget"><div id="%1$s" class="services-sidebar %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h4 class="widget-title">',
           'after_title'   => '</h4>',
        ) );
    }

}

add_action( 'widgets_init', 'ambrox_widgets_init' );