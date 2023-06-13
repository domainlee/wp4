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

/**
 * Admin Custom Login Logo
 */
function ambrox_custom_login_logo() {
  $logo = ! empty( crtheme_opt( 'ambrox_admin_login_logo', 'url' ) ) ? crtheme_opt( 'ambrox_admin_login_logo', 'url' ) : '' ;
  if( isset( $logo ) && !empty( $logo ) )
      echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
}
add_action( 'login_enqueue_scripts', 'ambrox_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'ambrox_admin_styles' );

function ambrox_admin_styles() {
  // $ambrox_admin_custom_css = ! empty( crtheme_opt( 'ambrox_theme_admin_custom_css' ) ) ? crtheme_opt( 'ambrox_theme_admin_custom_css' ) : '';
  if ( ! empty( $ambrox_admin_custom_css ) ) {
      $ambrox_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $ambrox_admin_custom_css);
      echo '<style rel="stylesheet" id="ambrox-admin-custom-css" >';
              echo esc_html( $ambrox_admin_custom_css );
      echo '</style>';
  }
}

 // share button code
 function ambrox_social_sharing_buttons( ) {

  // Get page URL
  $URL = get_permalink();
  $Sitetitle = get_bloginfo('name');

  // Get page title
  $Title = str_replace( ' ', '%20', get_the_title());


  // Construct sharing URL without using any script

  $twitterURL = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
  $pinteresturl = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
  $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );


  // Add sharing button at the end of page/page content
$content = '';

  $content .= '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
  $content .= '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
  $content .= '<li><a class="pinterest" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
  $content .= '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
  return $content;
};

//add SVG to allowed file uploads
function ambrox_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svgz+xml';
  $mimes['exe'] = 'program/exe';
  $mimes['dwg'] = 'image/vnd.dwg';
  return $mimes;
}
add_filter('upload_mimes', 'ambrox_mime_types');

function ambrox_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );
}
add_filter('wp_check_filetype_and_ext','ambrox_wp_check_filetype_and_ext',10,4);

if( ! function_exists('ambrox_get_user_role_name') ){
    function ambrox_get_user_role_name( $user_ID ){
        global $wp_roles;

        $user_data      = get_userdata( $user_ID );
        $user_role_slug = $user_data->roles[0];
        return translate_user_role( $wp_roles->roles[$user_role_slug]['name'] );
    }
}


add_action( 'init','ambrox_service', 0 );


function ambrox_service(){

    $labels = array(

        'name'               => esc_html__( 'Services', 'post Category general name', 'ambrox' ),
        'singular_name'      => esc_html__( 'Service', 'post Category singular name', 'ambrox' ),
        'menu_name'          => esc_html__( 'Services', 'admin menu', 'ambrox' ),
        'name_admin_bar'     => esc_html__( 'Service', 'add new on admin bar', 'ambrox' ),
        'add_new'            => esc_html__( 'Add New', 'Service', 'ambrox' ),
        'add_new_item'       => esc_html__( 'Add New Service', 'ambrox' ),
        'new_item'           => esc_html__( 'New Service', 'ambrox' ),
        'edit_item'          => esc_html__( 'Edit Service', 'ambrox' ),
        'view_item'          => esc_html__( 'View Service', 'ambrox' ),
        'all_items'          => esc_html__( 'All Services', 'ambrox' ),
        'search_items'       => esc_html__( 'Search Services', 'ambrox' ),
        'parent_item_colon'  => esc_html__( 'Parent Services:', 'ambrox' ),
        'not_found'          => esc_html__( 'No Services found.', 'ambrox' ),
        'not_found_in_trash' => esc_html__( 'No Services found in Trash.', 'ambrox' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'ambrox' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-index-card',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'elementor' ),
        'rewrite'            => array( 'slug' => 'all-services' ),
    );

    register_post_type( 'ambrox_service', $args );

  }


  //project cpt

  add_action( 'init','ambrox_project', 0 );


  function ambrox_project(){

    $labels = array(

        'name'               => esc_html__( 'Projects', 'post Category general name', 'ambrox' ),
        'singular_name'      => esc_html__( 'Project', 'post Category singular name', 'ambrox' ),
        'menu_name'          => esc_html__( 'Projects', 'admin menu', 'ambrox' ),
        'name_admin_bar'     => esc_html__( 'Project', 'add new on admin bar', 'ambrox' ),
        'add_new'            => esc_html__( 'Add New', 'Project', 'ambrox' ),
        'add_new_item'       => esc_html__( 'Add New Project', 'ambrox' ),
        'new_item'           => esc_html__( 'New Project', 'ambrox' ),
        'edit_item'          => esc_html__( 'Edit Project', 'ambrox' ),
        'view_item'          => esc_html__( 'View Project', 'ambrox' ),
        'all_items'          => esc_html__( 'All Projects', 'ambrox' ),
        'search_items'       => esc_html__( 'Search Projects', 'ambrox' ),
        'parent_item_colon'  => esc_html__( 'Parent Projects:', 'ambrox' ),
        'not_found'          => esc_html__( 'No Projects found.', 'ambrox' ),
        'not_found_in_trash' => esc_html__( 'No Projects found in Trash.', 'ambrox' ),
    );



    $args = array(

        'labels'             => $labels,
        'description'        => esc_html__( 'Description.', 'ambrox' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-index-card',
        'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt', 'elementor' ),
        'rewrite'            => array( 'slug' => 'all-projects' ),
    );

    register_post_type( 'ambrox_project', $args );

  }

add_image_size( 'ambrox_80X80', 80, 80, true );
add_image_size( 'ambrox_432x324', 432, 324, true );
// add_image_size( 'ambrox_372X279', 372, 279, true );
// add_image_size( 'ambrox_800X600', 800, 600, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );