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
class Ambrox_Header extends Widget_Base {

	public function get_name() {
		return 'ambroxheader';
	}

	public function get_title() {
		return __( 'Header', 'ambrox' );
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
			'logo_icon',
			[
				'label' 		=> __( 'Upload Logo Icon Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'logo_link',
			[
				'label' 		=> __( 'Logo Link', 'sasoft' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'sasoft' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater = new Repeater();

        $repeater->add_control(
			'menu_name',
			[
				'label' 	=> __( 'Menu Name', 'digalu' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Menu 1', 'digalu' )
			]
        );
        $repeater->add_control(
			'menu_url',
			[
				'label' 	=> __( 'Menu URL', 'digalu' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '#', 'digalu' )
			]
        );
        $repeater->add_control(
			'menu_icon_class',
			[
				'label' 	=> __( 'Icon Class', 'digalu' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fas fa-home"></i>', 'digalu' )
			]
        );
        

		$this->add_control(
			'menus_peramiter',
			[
				'label' 		=> __( 'Menus', 'digalu' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'menu_name'    => __( 'Home', 'digalu' ),
					],
				],
				'title_field' 	=> '{{{ menu_name }}}',
			]
		);
		$this->add_control(
			'video_url',
			[
				'label' 	=> __( 'Video URL', 'digalu' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '#', 'digalu' )
			]		);
        $this->end_controls_section();

		//---------------------------------------MenuBar Style---------------------------------------//

		$this->start_controls_section(
			'menubar_style_section',
			[
				'label' 	=> __( 'MenuBar Style', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'menubar_color',
			[
				'label' 		=> __( 'Menubar Background Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs.no-background' => 'background-color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_control(
			'sticky_menubar_color',
			[
				'label' 		=> __( 'Sticky Menubar Background Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs' => 'background-color: {{VALUE}}!important;',
                ],
			]
        );
        $this->end_controls_section();

        //---------------------------------------Menu Style---------------------------------------//


		$this->start_controls_section(
			'section_con_styling',
			[
				'label' 	=> __( 'Menu Control', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs3'
		);


		$this->start_controls_tab(
			'style_normal_tab3',
			[
				'label' => esc_html__( 'Menu', 'ambrox' ),
			]
		);
         $this->add_control(
			'menu_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .no-background ul.nav > li > a' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'menu_hvr_color',
			[
				'label' 		=> __( 'Hover Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .no-background ul.nav > li > a:hover' => 'color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} nav.navbar ul.nav > li > a',
			]
		);

        
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'submenu_normal_tab3',
			[
				'label' => esc_html__( 'Submenu', 'ambrox' ),
			]
		);
         $this->add_control(
			'submenu_menu_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'submenu_menu_hvr_color',
			[
				'label' 		=> __( 'Hover Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a:hover' => 'color: {{VALUE}}!important;',
                ],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'submenu_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} nav.navbar.validnavs ul li.dropdown ul.dropdown-menu li a',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();


        //---------------------------------------Button Style---------------------------------------//

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'button_text!' =>  ''  ],
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .attr-nav > ul > li.button > a' => 'color: {{VALUE}}',
                ],
			]
        );


        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .navbar .attr-right .attr-nav li.button a,{{WRAPPER}} .navbar .attr-right .attr-nav li.button a:focus' => '--color-primary:{{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'ambrox' ),
                'selector' 	=> '{{WRAPPER}} .attr-nav > ul > li.button > a',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'ambrox' ),
                'selector' 	=> '{{WRAPPER}} .attr-nav > ul > li.button > a',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .attr-nav > ul > li.button > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .attr-nav > ul > li.button > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .attr-nav > ul > li.button > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'ambrox' ),
				'selector' => '{{WRAPPER}} .attr-nav > ul > li.button > a',
			]
		);
        $this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div id="home">';
	        echo '<!-- Start Navigation -->';
	        echo '<nav class="navbar mobile-sidenav onepage-menu mobile-nav-only attr-border navbar-default validnavs dark no-background">';


	            echo '<div class="container d-flex justify-content-between align-items-center">            ';

	                echo '<!-- Start Header Navigation -->';
	                echo '<div class="navbar-header">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">';
	                        echo '<i class="fa fa-bars"></i>';
	                    echo '</button>';
	                    if( ! empty( $settings['logo_image']['url'] ) ){
				                echo '<a class="navbar-brand" href="'.esc_url( $settings['logo_link']['url'] ).'">';
				                	echo ambrox_img_tag( array(
										'url'	=> esc_url( $settings['logo_image']['url'] ),
										'class' => 'logo'
									) );
				                echo '</a>';
				        }
	                echo '</div>';
	                echo '<!-- End Header Navigation -->';

	                echo '<!-- Collect the nav links, forms, and other content for toggling -->';
	                echo '<div class="collapse navbar-collapse" id="navbar-menu">';

	                    echo '<img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Logo">';
	                    echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">';
	                        echo '<i class="fa fa-times"></i>';
	                    echo '</button>';
	                    
	                    echo '<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">';
	                    	foreach( $settings['menus_peramiter'] as $single_data ){
	                    		$url = ($single_data['menu_url']) ? $single_data['menu_url'] : '#';
		                        echo '<li>';
		                        	if( ! empty( $single_data['menu_name'] ) ){
		                           		echo ' <a class="smooth-menu" href="'.esc_html($url).'">'.esc_html($single_data['menu_name']).'</a>';
		                           	}
		                        echo '</li>';
		                    }
	                        
	                    echo '</ul>';
	                echo '</div><!-- /.navbar-collapse -->';

	                echo '<!-- Main Nav -->';
	            echo '</div>   ';
	            echo '<!-- Overlay screen for menu -->';
	            echo '<div class="overlay-screen"></div>';
	            echo '<!-- End Overlay screen for menu -->';
	        echo '</nav>';
	        echo '<!-- End Navigation -->';
	    echo '</div>';
        

		echo '<header class="header-fixed">';
	        echo '<div class="f-flex">';
	        	if( ! empty( $settings['logo_icon']['url'] ) ){
		            echo '<div class="logo">';
		                echo '<a href="'.esc_url( $settings['logo_link']['url'] ).'">';
		                	echo ambrox_img_tag( array(
								'url'	=> esc_url( $settings['logo_icon']['url'] ),
							) );
		                echo '</a>';
		            echo '</div>';
		        }
	            echo '<div class="menu">';
	                echo '<ul class="nav">';
	                	foreach( $settings['menus_peramiter'] as $single_data ){
		                    echo '<li>';

		                    $url = ($single_data['menu_url']) ? $single_data['menu_url'] : '#';

		                        echo '<a class="smooth-menu" href="'.esc_html($url).'">';
		                        	if( ! empty( $single_data['menu_icon_class'] ) ){
			                            echo wp_kses_post($single_data['menu_icon_class']);
			                        }
		                            if( ! empty( $single_data['menu_name'] ) ){
			                            echo '<div class="menu-name">'.esc_html($single_data['menu_name']).'</div>';
			                        }
		                        echo '</a>';
		                    echo '</li>';
		                }
	                    
	                echo '</ul>';
	            echo '</div>';
	            echo '<div class="video">';
	                echo '<a href="'.esc_url($settings['video_url']).'" class="popup-youtube video-play-button theme">';
	                    echo '<i class="fas fa-play"></i>';
	                echo '</a>';
	            echo '</div>';
	        echo '</div>';
	    echo '</header>';
	}

}