<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Portfolio Service Widget .
 *
 */
class Ambrox_Portfolio_Service extends Widget_Base {

	public function get_name() {
		return 'ambroxportfolioservice';
	}

	public function get_title() {
		return __( 'Ambrox Portfolio Service', 'ambrox' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'ambrox_portfolio' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'features_section',
			[
				'label'     => __( 'Service', 'ambrox' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'use_it_as_slider',
			[
				'label' 		=> __( 'Use it as slider ?', 'ambrox' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'ambrox' ),
				'label_off' 	=> __( 'Hide', 'ambrox' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
        
		$this->add_control(
			'section_heading',
			[
				'label' 		=> __( 'Allow Section Heading ?', 'ambrox' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'ambrox' ),
				'label_off' 	=> __( 'Hide', 'ambrox' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'use_it_as_slider!' => [ 'yes']],
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'The Title', 'ambrox' ),
			]
        );
        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Subtitle', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> __( 'The Description area', 'ambrox' ),
                'condition'		=> [ 'section_heading' => [ 'yes']],
			]
        );
        //----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'ambrox_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'ambrox' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->ambrox_service_choose_option(),
				'default'	=> ''
			]
		);
        $repeater->add_control(
			'desc', [
				'label' 		=> __( 'Content', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'chose_icon_style',
			[
				'label' 		=> __( 'Icon Type', 'ambrox' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'class',
				'options' 		=> [
					'class'  	=> __( 'Class', 'ambrox' ),
					'img' 		=> __( 'Image', 'ambrox' ),
				],
			]
		);
        $repeater->add_control(
			'icon_class', [
				'label' 		=> __( 'Icon Class', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
				'condition'		=> [ 'chose_icon_style' => [ 'class' ] ],
			]
        );
        $repeater->add_control(
			'icon_image',
			[
				'label' 		=> __( 'Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'chose_icon_style' => [ 'img' ] ],
			]
		);
        
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Features', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'use_it_as_slider!' => [ 'yes']],
			]
		);

		//----------------------------style 2----------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'details_page', [
				'label' 		=> __( 'URL ', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '#' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );

        $repeater->add_control(
			'desc', [
				'label' 		=> __( 'Content', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'chose_icon_style',
			[
				'label' 		=> __( 'Icon Type', 'ambrox' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'class',
				'options' 		=> [
					'class'  	=> __( 'Class', 'ambrox' ),
					'img' 		=> __( 'Image', 'ambrox' ),
				],
			]
		);
        $repeater->add_control(
			'icon_class', [
				'label' 		=> __( 'Icon Class', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
				'condition'		=> [ 'chose_icon_style' => [ 'class' ] ],
			]
        );
        $repeater->add_control(
			'icon_image',
			[
				'label' 		=> __( 'Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'chose_icon_style' => [ 'img' ] ],
			]
		);
        
		$this->add_control(
			'slides2',
			[
				'label' 		=> __( 'Features', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'use_it_as_slider' => [ 'yes']],
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Banner Background Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'use_it_as_slider' => [ 'yes' ] ],
			]
		);
		$this->end_controls_section();

        /*-----------------------------------------section Content styling------------------------------------*/

		$this->start_controls_section(
			'section_con_styling',
			[
				'label' 	=> __( 'Section Content', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs1'
		);


		$this->start_controls_tab(
			'style_normal_tab1',
			[
				'label' => esc_html__( 'Title', 'ambrox' ),
				'condition' => [
                    'section_title!'    => ''
                ]
			]
		);
        $this->add_control(
			's_title_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h4'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .site-heading h4',
			]
		);

        $this->add_responsive_control(
			's_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			's_title_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

				],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Subtitle', 'ambrox' ),
				'condition' => [
                    'section_subtitle!'    => ''
                ]
			]
		);
		$this->add_control(
			's_content_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h2'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .site-heading h2',
			]
		);

        $this->add_responsive_control(
			's_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			's_content_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

		$this->end_controls_tab();

		

		$this->start_controls_tab(
			'style_normal_tab4',
			[
				'label' => esc_html__( 'Devider', 'ambrox' ),
			]
		);
        $this->add_control(
			'devider_color',
			[
				'label' 		=> __( 'Devider Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading .devider::before,{{WRAPPER}} .site-heading .devider'	=> '--color-primary: {{VALUE}}!important;',
				],
			]
        );
        
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();


		/*-----------------------------------------features styling------------------------------------*/

		$this->start_controls_section(
			'feturs_con_styling',
			[
				'label' 	=> __( 'Service', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs'
		);


		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Title', 'ambrox' ),
			]
		);
        $this->add_control(
			'f_title_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-style-one a'	=> 'color: {{VALUE}}!important;',

				],
			]
        );
        $this->add_control(
			'f_title_hvr_color',
			[
				'label' 		=> __( 'Hover Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a:hover'	=> 'color: {{VALUE}}!important;',

				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'f_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .service-style-one a',
			]
		);

        $this->add_responsive_control(
			'f_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-style-one a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			'f_title_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-style-one a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Content', 'ambrox' ),
			]
		);
		$this->add_control(
			'f_content_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-style-one p'	=> 'color: {{VALUE}}!important;'
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'f_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .service-style-one p',
			]
		);

        $this->add_responsive_control(
			'f_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-style-one p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			'f_content_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-style-one p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );



		$this->end_controls_tab();


		$this->end_controls_tabs();
		$this->end_controls_section();

    }
    public function ambrox_service_choose_option(){

		$ambrox_post_query = new WP_Query( array(
			'post_type'				=> 'ambrox_service',
			'posts_per_page'	    => -1,
		) );

		$ambrox_service_title = array();
		$ambrox_service_title[''] = __( 'Select a Service','Ambrox');

		while( $ambrox_post_query->have_posts() ) {
			$ambrox_post_query->the_post();
			$ambrox_service_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $ambrox_service_title;

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!------------------------------- Features Area start ------------------------------->';

        if( $settings['use_it_as_slider'] == 'yes' ){
        	echo '<div class="swiper-slide bg-cover" style="background: url('.esc_url($settings['bg_image']['url']).');">';
                echo '<div class="container">';
                    echo '<div class="content">';
                        echo '<div class="row align-center">';
                            echo '<div class="col-lg-1 info">';
                            	if(!empty($settings['section_title'])){
	                                echo '<h2 class="curbe-title">'.esc_html($settings['section_title']).'</h2>';
	                            }
                            echo '</div>';

                            echo '<div class="col-lg-10 offset-lg-1">';
                                echo '<div class="row">';
                                	foreach( $settings['slides2'] as $single_data ){
	                                    echo '<!-- Single Item -->';
	                                    echo '<div class="service-style-one col-lg-4 col-md-6">';
	                                        echo '<div class="service-style-one-item">';
	                                            if($single_data['chose_icon_style'] == 'class' ){
				                                	echo '<div class="icon">';
				                                		echo wp_kses_post($single_data['icon_class']);
				                                	echo '</div>';
				                                }else{
				                                	echo ambrox_img_tag( array(
														'url'	=> esc_url( $single_data['icon_image']['url'] ),
													) );
				                                }
				                                if(!empty($single_data['title'])){
		                                            echo '<h4><a href="'.esc_url( $single_data['details_page'] ).'" data-bs-toggle="modal" data-bs-target="#serviceSingleModal">'.esc_html($single_data['title']).'</a></h4>';
		                                        }
		                                        if(!empty($single_data['desc'])){
		                                            echo '<p>'.esc_html($single_data['desc']).'</p>';
		                                        }
	                                        echo '</div>';
	                                    echo '</div>';
	                                    echo '<!-- End Single Item -->';
	                                }
                                    
                                echo '</div>';
                            echo '</div>';
                            
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }else{
        	echo '<div class="services-style-one-area box-layout default-padding bottom-less bg-light">';
				echo '<div class="blur-bg"></div>';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="col-lg-8 offset-lg-2">';
							echo '<div class="site-heading text-center">';
								if(!empty($settings['section_title'])){
	                              	echo '<h4 class="sub-title">'.esc_html($settings['section_title']).'</h4>';
	                            }
	                            if(!empty($settings['section_subtitle'])){
	                               	echo '<h2 class="title">'.esc_html($settings['section_subtitle']).'</h2>';
	                            } 
	                            echo '<div class="devider"></div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="container">';
					echo '<div class="row">';
						$i = 1;
						foreach( $settings['slides'] as $single_data ){
							$i++;
							echo '<!-- Single Item -->';
							echo '<div class="service-style-one col-lg-4 col-md-6">';
								echo '<div class="service-style-one-item">';
									if($single_data['chose_icon_style'] == 'class' ){
	                                	echo '<div class="icon">';
	                                		echo wp_kses_post($single_data['icon_class']);
	                                	echo '</div>';
	                                }else{
	                                	echo '<div class="icon">';
		                                	echo ambrox_img_tag( array(
												'url'	=> esc_url( $single_data['icon_image']['url'] ),
											) );
										echo '</div>';
	                                }	
									if(!empty($single_data['title'])){
		                              	echo '<h4><a href="#" data-bs-toggle="modal" data-bs-target="#id'.esc_attr($i).'">'.esc_html($single_data['title']).'</a></h4>';
		                            }
		                            if(!empty($single_data['desc'])){
		                               	echo '<p>'.esc_html($single_data['desc']).'</p>';
		                            }
								echo '</div>';
							echo '</div>';
							echo '<!-- End Single Item -->';
						}
						
					echo '</div>';
				echo '</div>';
				$k = 1;
				foreach( $settings['slides'] as $single_data ){
					$k++;
					echo '<!-- Start Services Single Modal -->';
			        echo '<div class="modal fade" id="'.'id'.esc_attr($k).'" tabindex="-1" aria-hidden="true">';
			            echo '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">';
			                echo '<div class="modal-content">';
			                    
			                    echo '<div class="modal-body">';

			                        echo '<div class="modal-header">';
			                            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
			                        echo '</div>';

			                        $elementor = \Elementor\Plugin::instance();
									if( ! empty( $single_data['ambrox_tab_builder_option'] ) ){
									    echo $elementor->frontend->get_builder_content_for_display( $single_data['ambrox_tab_builder_option'] );
									}
			                        
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			    }
			echo '</div>';
        }

		

		echo '<!--------------------------------- Features Area end --------------------------------->';
	}
}