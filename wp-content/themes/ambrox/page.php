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
    
    //header
    get_header();

    /**
    * 
    * Hook for Page Start Wrapper
    *
    * Hook ambrox_page_start_wrap
    *
    * @Hooked ambrox_page_start_wrap_cb 10
    *  
    */
    do_action( 'ambrox_page_start_wrap' );

    /**
    * 
    * Hook for Column Start Wrapper
    *
    * Hook ambrox_page_col_start_wrap
    *
    * @Hooked ambrox_page_col_start_wrap_cb 10
    *  
    */
    do_action( 'ambrox_page_col_start_wrap' );

    if( have_posts() ){
      while( have_posts() ){
        the_post();
        // Post Contant
        get_template_part( 'templates/content', 'page' );
      }
      // Reset Data
      wp_reset_postdata();
    }else{
      get_template_part( 'templates/content', 'none' );
    }

    /**
    * 
    * Hook for Column End Wrapper
    *
    * Hook ambrox_page_col_end_wrap
    *
    * @Hooked ambrox_page_col_end_wrap_cb 10
    *  
    */
    do_action( 'ambrox_page_col_end_wrap' );

    /**
    * 
    * Hook for Page Sidebar
    *
    * Hook ambrox_page_sidebar
    *
    * @Hooked ambrox_page_sidebar_cb 10
    *  
    */
    do_action( 'ambrox_page_sidebar' );

    /**
    * 
    * Hook for Page End Wrapper
    *
    * Hook ambrox_page_end_wrap
    *
    * @Hooked ambrox_page_end_wrap_cb 10
    *  
    */
    do_action( 'ambrox_page_end_wrap' );

    //footer
    get_footer();