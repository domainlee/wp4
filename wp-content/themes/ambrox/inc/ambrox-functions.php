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
    exit;
}

 // theme option callback
function crtheme_opt( $id = null, $url = null ){
    global $ambrox_opt;

    if( $id && $url ){

        if( isset( $ambrox_opt[$id][$url] ) && $ambrox_opt[$id][$url] ){
            return $ambrox_opt[$id][$url];
        }
    }else{
        if( isset( $ambrox_opt[$id] )  && $ambrox_opt[$id] ){
            return $ambrox_opt[$id];
        }
    }
}


// theme logo withour moble device

function ambrox_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= ambrox_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !crtheme_opt('ambrox_text_title') && crtheme_opt('ambrox_site_logo', 'url' )  ){

        $siteLogo = '<img class="logo" src="'.esc_url( crtheme_opt('ambrox_site_logo', 'url' ) ).'" alt="'.esc_attr( get_bloginfo('name') ).'" />';
        return '<a class="navbar-brand" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';
    }elseif( crtheme_opt('ambrox_text_title') ){
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( crtheme_opt('ambrox_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// theme logo for mobile device
function ambrox_mobile_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= ambrox_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !crtheme_opt('ambrox_text_title') && crtheme_opt('ambrox_site_logo', 'url' )  ){

        $siteLogo = '<img class="logo" src="'.esc_url( crtheme_opt('ambrox_site_logo', 'url' ) ).'" alt="'.esc_attr( get_bloginfo('name') ).'" />';
        return '<a class="mob-logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';
    }elseif( crtheme_opt('ambrox_text_title') ){
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( crtheme_opt('ambrox_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="logo-text"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}
// custom meta id callback
function ambrox_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_ambrox_'.$id, true );
    return $value;
}


// Blog Date Permalink
function ambrox_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function ambrox_iframe_match() {
    $audio_content = ambrox_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function ambrox_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function ambrox_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ambrox' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ambrox' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}

// image alt tag
function ambrox_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function ambrox_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function ambrox_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'ambrox_pingback_header' );


// Excerpt More
function ambrox_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'ambrox_excerpt_more' );


// ambrox comment template callback
function ambrox_comment_callback( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment; ?>

    <div class="comment-item" id="comment-<?php comment_ID(); ?>"> 
        <?php if ( $avarta = get_avatar( $comment ) ) :
            printf( '<div class="avatar">%1$s</div>', $avarta );
        endif; ?>
        <div class='content'>
            <div class="title">
                <?php 
                    if ( $comment->user_id != '0' ) {
                        printf( '<h5>%1$s</h5>', get_user_meta( $comment->user_id, 'nickname', true ) );
                    } else {
                        printf( '<h5>%1$s</h5>', get_comment_author_link() );
                    }
                ?>
                <span><?php echo get_comment_date(); ?></span>
                <span><?php $edit_reply_text = esc_html__( 'Edit', 'ambrox' ); edit_comment_link( '<i class="fal fa-pencil"></i>'.$edit_reply_text, '  ', '' ); ?></span>
            </div>    
           
            <?php comment_text() ?>
            <div class='comments-info'>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'ambrox' ); ?></span>
                <?php endif; ?>
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text' => '<i class="fa fa-reply"></i>Reply' ) ) ) ?>
            </div>
            
        </div>
    </div>
<?php
}

//body class
add_filter( 'body_class', 'ambrox_body_class' );
function ambrox_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $ambrox_blog_single_sidebar = crtheme_opt('ambrox_blog_single_sidebar');


        if(is_active_sidebar('ambrox-blog-sidebar')){
            if($ambrox_blog_single_sidebar == '2'){
                $classes[] = 'left-sidebar';
            }elseif($ambrox_blog_single_sidebar == '3'){
                $classes[] = 'right-sidebar';
            }else{
                $classes[] = 'blog-standard';
            }
        }else{
           $classes[] = 'blog-standard'; 
        }
        if( !empty( ambrox_meta('page_style_settings') ) ) {

            if(ambrox_meta('page_style_settings') == 'dark'){
                $new_body_class  = 'custom-page-bg bg-fixed dark-layout';
            }elseif(ambrox_meta('page_style_settings') == 'light'){
                $new_body_class  = 'custom-page-bg bg-fixed';
            }elseif(ambrox_meta('page_style_settings') == 'animated'){
                $new_body_class  = 'custom-page-bg animated-home';
            }else{
                $new_body_class  = 'custom-page-bg';
            }

            $new_class = is_page() ? $new_body_class : null;

            if ( $new_class ) {
                $classes[] .= $new_class;
            }
        }

    } else {
        if( !is_active_sidebar('ambrox-blog-sidebar') ) {
            $classes[] = 'blog-standard';
        }else{
            $classes[] = 'right-sidebar';
        }
    }
    return $classes;
}


function ambrox_footer_global_option(){

    // Ambrox Footer Bottom Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $ambrox_footer_bottom_active = crtheme_opt( 'ambrox_disable_footer_bottom' );
    }else{
        $ambrox_footer_bottom_active = '1';
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
    );       
    echo '<footer class="bg-dark text-light footer-custom-style">';
        if( ( is_active_sidebar( 'ambrox-footer-1' ) || is_active_sidebar( 'ambrox-footer-2' ) || is_active_sidebar( 'ambrox-footer-3' ) || is_active_sidebar( 'ambrox-footer-4' ) )) {
            echo '<div class="container">';
                echo '<div class="f-items default-padding">';
                    echo '<div class="row">';
                    if( is_active_sidebar( 'ambrox-footer-1' )){
                       dynamic_sidebar( 'ambrox-footer-1' ); 
                    }
                    if( is_active_sidebar( 'ambrox-footer-2' )){
                       dynamic_sidebar( 'ambrox-footer-2' ); 
                    }
                    if( is_active_sidebar( 'ambrox-footer-3' )){
                       dynamic_sidebar( 'ambrox-footer-3' ); 
                    } 
                    if( is_active_sidebar( 'ambrox-footer-4' )){
                       dynamic_sidebar( 'ambrox-footer-4' ); 
                    }  
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        if( $ambrox_footer_bottom_active == '1' ){
            if( ! empty( crtheme_opt( 'ambrox_copyright_text' ) ) ){
                echo '<!-- Start Footer Bottom -->';
                echo '<div class="footer-bottom">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            if( has_nav_menu( 'footer-menu' ) ){
                                $col_class = 6;
                                $allign_class = 'text-start';
                            }else{
                                $col_class = 12;
                                $allign_class = 'text-center';
                            }
                            echo '<div class="col-lg-'.esc_attr($col_class).'">';
                                echo '<p class="'.esc_attr($allign_class).'">'.wp_kses( crtheme_opt( 'ambrox_copyright_text' ), $allowhtml ).'</p>';
                            echo '</div>';
                            if( has_nav_menu( 'footer-menu' ) ){
                                echo '<div class="col-lg-6 text-end link">';
                                    wp_nav_menu( array(
                                        'theme_location'  => 'footer-menu',
                                    ) );

                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<!-- End Footer Bottom -->';
            }
        }
    echo '</footer>';
}

function ambrox_social_icon(){
    $ambrox_social_icon = crtheme_opt( 'ambrox_social_links' );
    if( ! empty( $ambrox_social_icon ) && isset( $ambrox_social_icon ) ){
        foreach( $ambrox_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i>'.esc_html( $social_icon['description'] ).'</a>';
            }
        }
    }
}

// global header
function ambrox_global_header_option() {

    echo '<header>';
        if( class_exists( 'ReduxFramework' ) ){
            $ambrox_btn      = crtheme_opt( 'ambrox_btn_text' );
            $ambrox_btn_url  = crtheme_opt( 'ambrox_btn_url' );
        }else{
            $ambrox_btn      = '';
            $ambrox_btn_url  = '';
        }
        echo '<nav class="navbar mobile-sidenav navbar-common navbar-default validnavs">';


            echo '<div class="container d-flex justify-content-between align-items-center">';            

                echo '<!-- Start Header Navigation -->';
                echo '<div class="navbar-header">';
                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>';
                   echo ambrox_theme_logo();
                echo '</div>';
                echo '<!-- End Header Navigation -->';

                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
                echo '<div class="collapse navbar-collapse" id="navbar-menu">';
                    echo ambrox_mobile_theme_logo();
                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-times"></i></button>';
                    if( has_nav_menu('primary-menu') ) {
                        wp_nav_menu( array(
                            'theme_location'  => 'primary-menu',
                            'container'       => 'ul',
                            'menu_class'      => 'nav navbar-nav navbar-right',
                            'fallback_cb'     => 'Ambrox_Bootstrap_Navwalker::fallback',
                            'items_wrap'      => '<ul data-in="fadeInDown" data-out="fadeOutUp" class="%2$s" id="%1$s">%3$s</ul>',
                            'walker'          => new Ambrox_Bootstrap_Navwalker(),
                        ) );
                    }
                    
                echo '</div><!-- /.navbar-collapse -->';
                if( $ambrox_btn ){
                    echo '<div class="attr-right">';
                       echo ' <!-- Start Atribute Navigation --><div class="attr-nav"><ul><li class="button"><a href="'.esc_url(crtheme_opt( 'ambrox_btn_url' )).'">'.esc_html(crtheme_opt( 'ambrox_btn_text' )).'</a></li></ul></div>';
                    echo '</div>';
                        echo '<!-- End Atribute Navigation -->';
                }

                echo '<!-- Main Nav -->';
            echo '</div> ';  
            echo '<!-- Overlay screen for menu -->';
            echo '<div class="overlay-screen"></div>';
            echo '<!-- End Overlay screen for menu -->';
        echo '</nav>';
    echo '</header>';
}

//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'ambrox_remove_tagcloud_inline_style',10,1 );
function ambrox_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

function ambrox_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function ambrox_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'ambrox' );
    }
    return $count;
}

// password protected form
add_filter('the_password_form','ambrox_password_form',10,1);
function ambrox_password_form( $output ) {
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post"><div class="theme-input-group">
        <input name="post_password" type="password" class="theme-input-style" placeholder="'.esc_attr__( 'Enter Password','ambrox' ).'">
        <button type="submit" class="submit-btn btn-fill">'.esc_html__( 'Enter','ambrox' ).'</button></div></form>';
    return $output;
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'ambrox_cat_count_span' );
function ambrox_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'ambrox_archive_count_span' );
function ambrox_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">(', $links);
    $links = str_replace(')', ')</span>', $links);
	return $links;
}


if( ! function_exists( 'ambrox_blog_category' ) ){
    function ambrox_blog_category(){
        if( class_exists( 'ReduxFramework' ) ){
            $ambrox_display_post_category =  crtheme_opt('ambrox_display_post_category');
        }else{
            $ambrox_display_post_category = '1';
        }

        if( $ambrox_display_post_category ){
            $ambrox_post_categories = get_the_category();
            if( is_array( $ambrox_post_categories ) && ! empty( $ambrox_post_categories ) ){
                if( crtheme_opt( 'ambrox_blog_style' ) == '2' ){
                    $padding_class = 'mb-20';
                }else{
                    $padding_class = '';
                }
                echo '<div class="blog-category '.esc_attr( $padding_class ).'">';
                    echo ' <a href="'.esc_url( get_term_link( $ambrox_post_categories[0]->term_id ) ).'">'.esc_html( $ambrox_post_categories[0]->name ).'</a> ';
                echo '</div>';
            }
        }
    }
}

// Add Extra Class On Comment Reply Button
function ambrox_custom_comment_reply_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'ambrox_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function ambrox_custom_edit_comment_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'ambrox_custom_edit_comment_link', 99);


function ambrox_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        if( ! is_single() ){
            if( crtheme_opt( 'ambrox_blog_style' ) == '3' ){
                $classes[] = "item grid-wide";
            }else{
                $classes[] = "single-item";
            }
        }else{
            $classes[] = "item";
        }
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }

    return $classes;
}
add_filter( 'post_class', 'ambrox_post_classes', 10, 3 );
add_filter('wpcf7_autop_or_not', '__return_false');