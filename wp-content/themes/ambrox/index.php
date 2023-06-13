<?php
/**
 * @Packge     : CRTheme
 * @Version    : 1.0
 * @Author     : CRTheme
 * @Author URI : https://themeforest.net/user/domainlee/portfolio
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}   
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper
    *
    * Hook ambrox_blog_start_wrap
    *
    * @Hooked ambrox_blog_start_wrap_cb 10
    *  
    */
    do_action( 'ambrox_blog_start_wrap' );
    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook ambrox_blog_col_start_wrap
    *
    * @Hooked ambrox_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'ambrox_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook ambrox_blog_content
    *
    * @Hooked ambrox_blog_content_cb 10
    *  
    */
    do_action( 'ambrox_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook ambrox_blog_pagination
    *
    * @Hooked ambrox_blog_pagination_cb 10
    *  
    */
    do_action( 'ambrox_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook ambrox_blog_col_end_wrap
    *
    * @Hooked ambrox_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'ambrox_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook ambrox_blog_sidebar
    *
    * @Hooked ambrox_blog_sidebar_cb 10
    *  
    */
    do_action( 'ambrox_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook ambrox_blog_end_wrap
    *
    * @Hooked ambrox_blog_end_wrap_cb 10
    *  
    */
    do_action( 'ambrox_blog_end_wrap' );

    //footer
    get_footer();