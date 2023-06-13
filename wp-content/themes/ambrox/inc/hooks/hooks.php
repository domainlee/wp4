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

	/**
	* Hook for preloader
	*/
	add_action( 'ambrox_preloader_wrap', 'ambrox_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'ambrox_main_wrapper_start', 'ambrox_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'ambrox_header', 'ambrox_header_cb', 10 );

	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'ambrox_blog_start_wrap', 'ambrox_blog_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'ambrox_blog_col_start_wrap', 'ambrox_blog_col_start_wrap_cb', 10 );

	/**
	* Hook for Service Column Start Wrapper
	*/
    add_action( 'ambrox_service_col_start_wrap', 'ambrox_service_col_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'ambrox_blog_col_end_wrap', 'ambrox_blog_col_end_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'ambrox_blog_end_wrap', 'ambrox_blog_end_wrap_cb', 10 );

	/**
	* Hook for Blog Pagination
	*/
    add_action( 'ambrox_blog_pagination', 'ambrox_blog_pagination_cb', 10 );

    /**
	* Hook for Blog Content
	*/
	add_action( 'ambrox_blog_content', 'ambrox_blog_content_cb', 10 );

    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'ambrox_blog_sidebar', 'ambrox_blog_sidebar_cb', 10 );


    /**
	* Hook for Service Sidebar
	*/
	add_action( 'ambrox_service_sidebar', 'ambrox_service_sidebar_cb', 10 );

    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'ambrox_blog_details_sidebar', 'ambrox_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'ambrox_blog_details_wrapper_start', 'ambrox_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'ambrox_blog_post_meta', 'ambrox_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'ambrox_blog_details_share_options', 'ambrox_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'ambrox_blog_details_author_bio', 'ambrox_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'ambrox_blog_details_tags_and_categories', 'ambrox_blog_details_tags_and_categories_cb', 10 );
	add_action( 'ambrox_blog_details_post_navigation', 'ambrox_blog_details_post_navigation_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'ambrox_blog_details_comments', 'ambrox_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('ambrox_blog_details_col_start','ambrox_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('ambrox_blog_details_col_end','ambrox_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('ambrox_blog_details_wrapper_end','ambrox_blog_details_wrapper_end_cb');

	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('ambrox_blog_post_thumb','ambrox_blog_post_thumb_cb');

	/**
	* Hook for Blog Post Content
	*/
	add_action('ambrox_blog_post_content','ambrox_blog_post_content_cb');


	/**
	* Hook for Blog Post Excerpt And Read More Button
	*/
	add_action('ambrox_blog_postexcerpt_read_content','ambrox_blog_postexcerpt_read_content_cb');

	/**
	* Hook for footer content
	*/
	add_action( 'ambrox_footer_content', 'ambrox_footer_content_cb', 10 );

	/**
	* Hook for main wrapper end
	*/
	add_action( 'ambrox_main_wrapper_end', 'ambrox_main_wrapper_end_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'ambrox_page_start_wrap', 'ambrox_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'ambrox_page_end_wrap', 'ambrox_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'ambrox_page_col_start_wrap', 'ambrox_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'ambrox_page_col_end_wrap', 'ambrox_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'ambrox_page_sidebar', 'ambrox_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'ambrox_page_content', 'ambrox_page_content_cb', 10 );