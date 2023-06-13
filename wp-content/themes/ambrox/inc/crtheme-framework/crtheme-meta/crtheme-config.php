<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function crtheme_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'crtheme_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function crtheme_register_metabox() {

	$prefix = '_crtheme_';

	$prefixpage = '_crthemepage_';
	
	$crtheme_service_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'service_page_control',
		'title'         => esc_html__( 'Service Page Controller', 'crtheme' ),
		'object_types'  => array( 'carvis_service' ), // Post type
		'closed'        => true
	) );
	$crtheme_service_meta->add_field( array(
		'name' => esc_html__( 'Write Flaticon Class', 'crtheme' ),
	   	'desc' => esc_html__( 'Write Flaticon Class For The Icon', 'crtheme' ),
	   	'id'   => $prefix . 'flat_icon_class',
		'type' => 'text',
    ) );
	
	$crtheme_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'crtheme' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );
	$crtheme_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Video', 'crtheme' ),
		'desc' => esc_html__( 'Use This Field When Post Format Video', 'crtheme' ),
		'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );
	$crtheme_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'crtheme' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'crtheme' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$crtheme_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'crtheme' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'crtheme' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );


	
	$crtheme_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Metas', 'crtheme' ),
		'object_types'  => array( 'page' ), // Post type
        'closed'        => true,
    ) );

    $crtheme_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'crtheme' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'crtheme' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','crtheme'),
            '2'     => esc_html__('Hide','crtheme'),
        )
    ) );


    $crtheme_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'crtheme' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__( 'Global Settings', 'crtheme' ),
            'page'     => esc_html__( 'Page Settings', 'crtheme' ),
        )
	) );
	
	$crtheme_page_meta->add_field( array(
	    'name'    => esc_html__( 'Breadcumb Image', 'crtheme' ),
	    'desc'    => esc_html__( 'Upload an image or enter an URL.', 'crtheme' ),
	    'id'      => $prefix . 'breadcumb_image',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => __( 'Add File', 'crtheme' ) // Change upload button text. Default: "Add or Upload File"
	    ),
	    'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );
	
    $crtheme_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'crtheme' ),
		'desc' => esc_html__( 'check to display Page Title.', 'crtheme' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   	=> esc_html__( 'Show','crtheme'),
            '2'     => esc_html__( 'Hide','crtheme'),
        )
	) );

    $crtheme_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'crtheme' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','crtheme'),
            'custom'  => esc_html__('Custom Title','crtheme'),
        ),
        'default'   => 'default'
    ) );

    $crtheme_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'crtheme' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $crtheme_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'crtheme' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'crtheme' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => crtheme_set_checkbox_default_for_new_post( true ),
    ) );



    $crtheme_page_mode = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_mood_section',
		'title'         => esc_html__( 'Page Type', 'crtheme' ),
		'object_types'  => array( 'page' ), // Post type
        'closed'        => true,
    ) );



    $crtheme_page_mode->add_field( array(
	    'name'    => esc_html__( 'Page Background Image', 'crtheme' ),
	    'desc'    => esc_html__( 'Upload an image or enter an URL.', 'crtheme' ),
	    'id'      => $prefix . 'page_bg_image',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => __( 'Add image', 'crtheme' ) // Change upload button text. Default: "Add or Upload File"
	    ),
	    'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

    $crtheme_page_mode->add_field( array(
		'name' => esc_html__( 'Page Style', 'crtheme' ),
		'id'   => $prefix . 'page_style_settings',
        'type' => 'select',
        'options'   => array(
            'dark'  => esc_html__('Dark Mode','crtheme'),
            'light'  => esc_html__('Light mode','crtheme'),
            'normal'  => esc_html__('Normal mode','crtheme'),
            'animated'  => esc_html__('Animated Home','crtheme'),
        ),
        'default'   => 'light'
    ) );

    






    $crtheme_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'crtheme' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$crtheme_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'crtheme' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'crtheme' ),
            '2' => esc_html__( 'Container Fluid', 'crtheme' ),
            '3' => esc_html__( 'Fullwidth', 'crtheme' ),
        ),
	) );

	$crtheme_product_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'product_meta_section',
		'title'         => esc_html__( 'Swap Image', 'crtheme' ),
		'object_types'  => array( 'product' ), // Post type
		'closed'        => true,
		'context'		=> 'side',
		'priority'		=> 'default'
	) );

	$crtheme_product_meta->add_field( array(
		'name' 		=> esc_html__( 'Product Swap Image', 'crtheme' ),
		'desc' 		=> esc_html__( 'Set Product Swap Image', 'crtheme' ),
		'id'   		=> $prefix.'product_swap_image',
		'type'    	=> 'file',
		// Optional:
		'options' 	=> array(
			'url' 		=> false, // Hide the text input for the url
		),
		'text'    	=> array(
			'add_upload_file_text' => __( 'Add Swap Image', 'crtheme' ) // Change upload button text. Default: "Add or Upload File"
		),
	) );
}

add_action( 'cmb2_admin_init', 'ambrox_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function ambrox_register_taxonomy_metabox() {

    $prefix = '_ambrox_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$crtheme_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'crtheme' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$crtheme_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'crtheme' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$crtheme_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'crtheme' ),
		'desc' => esc_html__( 'Set Category Image', 'crtheme' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','crtheme') // Change upload button text. Default: "Add or Upload File"
		),
	) );


	/**
	 * Metabox for the user profile screen
	 */
	$crtheme_user = new_cmb2_box( array(
		'id'               => $prefix.'user_edit',
		'title'            => esc_html__( 'User Profile Metabox', 'crtheme' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );
	$crtheme_user->add_field( array(
		'name'     => esc_html__( 'Social Profile', 'crtheme' ),
		'id'       => $prefix.'user_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );

	$group_field_id = $crtheme_user->add_field( array(
        'id'          => $prefix .'social_profile_group',
        'type'        => 'group',
        'description' => __( 'Social Profile', 'crtheme' ),
        'options'     => array(
            'group_title'       => __( 'Social Profile {#}', 'crtheme' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Social Profile', 'crtheme' ),
            'remove_button'     => __( 'Remove Social Profile', 'crtheme' ),
            'closed'         => true
        ),
    ) );

    $crtheme_user->add_group_field( $group_field_id, array(
        'name'        => __( 'Select Icon', 'crtheme' ),
        'id'          => $prefix .'social_profile_icon',
        'type'        => 'fontawesome_icon', // This field type
    ) );

    $crtheme_user->add_group_field( $group_field_id, array(
        'desc'       => esc_html__( 'Set social profile link.', 'crtheme' ),
        'id'         => $prefix . 'lawyer_social_profile_link',
        'name'       => esc_html__( 'Social Profile link', 'crtheme' ),
        'type'       => 'text'
    ) );
}