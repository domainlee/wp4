<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Header Widget .
 *
 */
class Ambrox_Header_v2 extends Widget_Base {

	public function get_name() {
		return 'ambroxheaderv2';
	}

	public function get_title() {
		return __( 'Header V2', 'ambrox' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'ambrox_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'logo_image',
			[
				'label' 		=> __( 'Upload Logo Light Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
        $this->add_control(
			'logo_link',
			[
				'label' 		=> __( 'Logo Link', 'ambrox' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'ambrox' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'chat_box',
			[
				'label' 	=> __( 'Chat Label', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Chat Now', 'ambrox' )
			]
        );
        $this->add_control(
			'chat_url',
			[
				'label' 		=> __( 'Chat Link', 'ambrox' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'ambrox' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$this->add_control(
			'show_offcanvas',
			[
				'label' 		=> __( 'Show Offcanvas ?', 'ambrox' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'ambrox' ),
				'label_off' 	=> __( 'Hide', 'ambrox' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'logo_offcanvas',
			[
				'label' 		=> __( 'Upload Logo Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'menu_name',
			[
				'label' 	=> __( 'Menu Name', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Menu 1', 'ambrox' )
			]
        );
        $repeater->add_control(
			'menu_url',
			[
				'label' 	=> __( 'Menu URL', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '#', 'ambrox' )
			]
        );
		$this->add_control(
			'menus_peramiter',
			[
				'label' 		=> __( 'Menus', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'menu_name'    => __( 'Home', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ menu_name }}}',
				'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'adress_label',
			[
				'label' 	=> __( 'Address Label', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Address', 'ambrox' ),
                'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
        );
        $this->add_control(
			'adress',
			[
				'label' 	=> __( 'Address', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'California, TX 70240', 'ambrox' ),
                'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
        );

        $this->add_control(
			'email_label',
			[
				'label' 	=> __( 'Email Label', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Email', 'ambrox' ),
                'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
        );
        $this->add_control(
			'email',
			[
				'label' 	=> __( 'Email', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'support@validtheme.com', 'ambrox' ),
                'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
        );

        $this->add_control(
			'phone_label',
			[
				'label' 	=> __( 'Phone Label', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Phone', 'ambrox' ),
                'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
        );
        $this->add_control(
			'phone',
			[
				'label' 	=> __( 'Phone', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '+44-20-7328-4499', 'ambrox' ),
                'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
        );

        $this->add_control(
			'show_newslatter',
			[
				'label' 		=> __( 'Show Newslatter ?', 'ambrox' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'ambrox' ),
				'label_off' 	=> __( 'Hide', 'ambrox' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'newslatter_title',
			[
				'label' 	=> __( 'Newslatter Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Get Subscribed!', 'ambrox' ),
                'condition'		=> [ 'show_newslatter' => [ 'yes' ] ],
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'ambrox' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'ambrox' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'ambrox' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','ambrox' ),
					],
				],
				'condition'		=> [ 'show_offcanvas' => [ 'yes' ] ],
			]
		);

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<header>';
	        echo '<!-- Start Navigation -->';
	        echo '<nav class="navbar navbar-icon-menu mobile-sidenav attr-border navbar-sticky navbar-default validnavs navbar-fixed white no-background">';


	            echo '<div class="container d-flex justify-content-between align-items-center">            ';

	            	if( ! empty( $settings['logo_image']['url'] ) ){
		                echo '<!-- Start Header Navigation -->';
		                echo '<div class="navbar-header">';
		                    echo '<a class="navbar-brand logo-icon" href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                        echo ambrox_img_tag( array(
									'url'	=> esc_url( $settings['logo_image']['url'] ),
									'class' => 'logo'
								) );
		                    echo '</a>';
		                echo '</div>';
		                echo '<!-- End Header Navigation -->';
		            }


	                echo '<div class="attr-right">';
	                    echo '<!-- Start Atribute Navigation -->';
	                    echo '<div class="attr-nav attr-box multi">';
	                        echo '<ul>';
	                        	if( $settings['show_offcanvas'] == 'yes' ){
		                            echo '<li class="side-menu">';
		                                echo '<a href="#"><span class="bar-1"></span><span class="bar-2"></span><span class="bar-3"></span></a>';
		                            echo '</li>';
		                        }
		                        if( !empty( $settings['chat_box'] ) ) {
		                            echo '<li class="btn-trend">';
		                                echo '<a href="'.esc_url( $settings['chat_url']['url'] ).'"><i class="fas fa-comments-alt"></i> '.esc_html( $settings['chat_box'] ).'</a>';
		                            echo '</li>';
		                        }

	                        echo '</ul>';
	                    echo '</div>';
	                    echo '<!-- End Atribute Navigation -->';
	                echo '</div>';

	                if( $settings['show_offcanvas'] == 'yes' ){
		                echo '<!-- Start Side Menu -->';
		                echo '<div class="side">';
		                   echo ' <a href="#" class="close-side"><i class="icon_close"></i></a>';
		                    echo '<div class="widget">';
		                    	if( ! empty( $settings['logo_offcanvas']['url'] ) ){
			                        echo '<div class="logo">';
			                           echo ambrox_img_tag( array(
											'url'	=> esc_url( $settings['logo_offcanvas']['url'] ),
										) );
			                        echo '</div>';
			                    }

		                        echo '<ul class="side-nav">';
		                        	foreach( $settings['menus_peramiter'] as $single_data ){
		                        		$url = ($single_data['menu_url']) ? $single_data['menu_url'] : '#';
			                            echo '<li><a href="'.esc_html($url).'">'.esc_html($single_data['menu_name']).'</a></li>';
			                        }
		                           
		                        echo '</ul>';
		                    echo '</div>';
		                    echo '<div class="widget address">';
		                        echo '<div>';
		                            echo '<ul>';
		                            	if( ! empty( $settings['adress_label'] ) ){
			                                echo '<li>';
			                                    echo '<div class="content">';
			                                        echo '<p>'.esc_html( $settings['adress_label'] ).'</p> ';
			                                        echo '<strong>'.esc_html( $settings['adress'] ).'</strong>';
			                                    echo '</div>';
			                                echo '</li>';
			                            }
			                            if( ! empty( $settings['email_label'] ) ){
			                                echo '<li>';
			                                    echo '<div class="content">';
			                                        echo '<p>'.esc_html( $settings['email_label'] ).'</p> ';
			                                        echo '<strong>'.esc_html( $settings['email'] ).'</strong>';
			                                    echo '</div>';
			                                echo '</li>';
			                            }
			                            if( ! empty( $settings['phone_label'] ) ){
			                                echo '<li>';
			                                    echo '<div class="content">';
			                                        echo '<p>'.esc_html( $settings['phone_label'] ).'</p> ';
			                                        echo '<strong>'.esc_html( $settings['phone'] ).'</strong>';
			                                    echo '</div>';
			                                echo '</li>';
			                            }
		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                    if( $settings['show_newslatter'] == 'yes' ){
			                    echo '<div class="widget newsletter">';
			                    	if( ! empty( $settings['newslatter_title'] ) ){
				                        echo '<h4 class="title">'.esc_html( $settings['newslatter_title'] ).'</h4>';
				                    }

			                        echo '<form action="#" class="newsletter-form">';
			                            echo '<div class="input-group stylish-input-group">';
			                                echo '<input type="email" placeholder="Enter your e-mail" class="form-control" name="email">';
			                                echo '<span class="input-group-addon">';
			                                    echo '<button type="submit">';
			                                        echo '<i class="arrow_right"></i>';
			                                    echo '</button>  ';
			                               echo ' </span>';
			                            echo '</div>';
			                        echo '</form>';
			                    echo '</div>';
			                }
			                if( ! empty( $settings['social_icon_list'] ) ){
			                    echo '<div class="widget social">';
			                        echo '<ul class="link">';
			                        	foreach( $settings['social_icon_list'] as $social_icon ){
			                        		$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
				                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

				                            echo '<li><a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

				                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

				                          	echo '</a></li>';
				                        }
			                            
			                        echo '</ul>';
			                    echo '</div>';
			                }

		                echo '</div>';
		                echo '<!-- End Side Menu -->';
		            }

	                echo '<!-- Main Nav -->';
	            echo '</div>   ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu -->';
	        echo '</nav>';
	        echo '<!-- End Navigation -->';
	    echo '</header>';
	}

}