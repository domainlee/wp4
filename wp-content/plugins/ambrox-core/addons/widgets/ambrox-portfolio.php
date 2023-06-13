<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Portfolio Project Widget .
 *
 */
class Ambrox_Portfolio_Project extends Widget_Base {

	public function get_name() {
		return 'ambroxportfolioproject';
	}

	public function get_title() {
		return __( 'Ambrox Portfolio Project', 'ambrox' );
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
				'label'     => __( 'Project', 'ambrox' ),
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
			'counterup_title', [
				'label' 		=> __( 'Title', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'shafix', [
				'label' 		=> __( 'Shafix', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'counterup_number', [
				'label' 		=> __( 'Number', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );


		$this->add_control(
			'counter',
			[
				'label' 		=> __( 'Counter', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'use_it_as_slider!' => [ 'yes']],
			]
		);

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
			'cat', [
				'label' 		=> __( 'Category', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'ambrox_tab_builder_option',
			[
				'label'     => __( 'Select Project', 'ambrox' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->ambrox_project_choose_option(),
				'default'	=> ''
			]
		);
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Project', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'use_it_as_slider!' => [ 'yes']],
			]
		);

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
			'cat', [
				'label' 		=> __( 'Category', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'slides2',
			[
				'label' 		=> __( 'Project', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
					[
						'title' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'		=> [ 'use_it_as_slider' => [ 'yes']],
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' 		=> __( 'Shape Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'use_it_as_slider!' => [ 'yes']],
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background Image', 'ambrox' ),
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
					'{{WRAPPER}} .left-info h5'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .left-info h5',
			]
		);

        $this->add_responsive_control(
			's_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .left-info h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .left-info h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

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
					'{{WRAPPER}} .left-info h2'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .left-info h2',
			]
		);

        $this->add_responsive_control(
			's_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .left-info h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .left-info h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
				'label' 	=> __( 'Project', 'ambrox' ),
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
					'{{WRAPPER}} .overlay-content a'	=> 'color: {{VALUE}}!important;',

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
		 		'selector' 	=> '{{WRAPPER}} .overlay-content a',
			]
		);

        $this->add_responsive_control(
			'f_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .overlay-content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .overlay-content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Category', 'ambrox' ),
			]
		);
		$this->add_control(
			'f_content_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}}  span'	=> 'color: {{VALUE}}!important;'
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'f_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}}  span',
			]
		);

        $this->add_responsive_control(
			'f_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}}  span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );



		$this->end_controls_tab();


		$this->end_controls_tabs();
		$this->end_controls_section();

    }

    public function ambrox_project_choose_option(){

		$ambrox_post_query = new WP_Query( array(
			'post_type'				=> 'ambrox_project',
			'posts_per_page'	    => -1,
		) );

		$ambrox_project_title = array();
		$ambrox_project_title[''] = __( 'Select a Service','Ambrox');

		while( $ambrox_post_query->have_posts() ) {
			$ambrox_post_query->the_post();
			$ambrox_project_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $ambrox_project_title;

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

                            echo '<div class="col-lg-10 offset-lg-1 thumb">';
                                echo '<div id="portfolio-grid" class="gallery-items colums-3">';
                                	foreach( $settings['slides2'] as $single_data ){
	                                    echo '<!-- Single Item -->';
	                                    echo '<div class="pf-item">';
	                                        echo '<div class="overlay-content">';
	                                            if(!empty($single_data['image']['url'])){
													echo ambrox_img_tag( array(
														'url'	=> esc_url( $single_data['image']['url'] ),
													) );
												}
	                                            echo '<div class="content">';
	                                                echo '<div class="title">';
	                                                    if(!empty($single_data['cat'])){
															echo '<span>'.esc_html($single_data['cat']).'</span>';
														}
														if(!empty($single_data['title'])){
							                              	echo '<h5><a href="'.esc_url( $single_data['details_page'] ).'" data-bs-toggle="modal" data-bs-target="#id'.esc_attr($i).'">'.esc_html($single_data['title']).'</a></h5>';
							                            }
	                                                echo '</div>';
	                                                echo '<a href="'.esc_url( $single_data['details_page'] ).'" data-bs-toggle="modal" data-bs-target="#projectSingleModal"><i class="fas fa-arrow-right"></i></a>';
	                                            echo '</div>';
	                                        echo '</div>';
	                                    echo '</div>';
	                                    echo '<!-- End Single Item -->';
	                                }
                                    
                                echo '</div>';
                            echo '</div>';
                            
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
           echo ' </div>';
        }else{
        	echo '<div class="portfolio-style-six-area default-padding-top">';
				if(!empty($settings['shape_image']['url'] )){
					echo '<div class="shape-animated-right">';
						echo ambrox_img_tag( array(
							'url'	=> esc_url( $settings['shape_image']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="heading-left">';
						echo '<div class="row align-center">';

							echo '<div class="col-lg-5">';
								echo '<div class="left-info">';
									if(!empty($settings['section_title'])){
		                              	echo '<h5 class="sub-title">'.esc_html($settings['section_title']).'</h5>';
		                            }
		                            if(!empty($settings['section_subtitle'])){
		                               	echo '<h2 class="title">'.wp_kses_post($settings['section_subtitle']).'</h2>';
		                            }
		                            echo '<div class="heading-shape">';
		                                echo '<img src="'.AMBROX_PLUGDIRURI . 'assets/img/10.png" alt="Shape">';
		                            echo '</div>';

								echo '</div>';
							echo '</div>';
							echo '<div class="col-lg-6 offset-lg-1">';
		                        echo '<div class="right-info">';
		                            echo '<div class="fun-factor-default">';
		                                foreach( $settings['counter'] as $single_data ){
			                                echo '<div class="fun-fact">';
			                                    echo '<div class="counter">';
			                                    	if( ! empty( $single_data['counterup_number'] ) ){
				                                        echo '<div class="timer" data-to="'.esc_attr( $single_data['counterup_number'] ).'" data-speed="2000">'.esc_html( $single_data['counterup_number'] ).'</div>';
				                                    }
				                                    if( ! empty( $single_data['shafix'] ) ){
				                                        echo '<div class="operator">'.esc_html( $single_data['shafix'] ).'</div>';
				                                    }
			                                    echo '</div>';
			                                    if( ! empty( $single_data['counterup_title'] ) ){
				                                    echo '<span class="medium">'.esc_html( $single_data['counterup_title'] ).'</span>';
				                                }
			                                echo '</div>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
							
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="container">';
					echo '<div class="row">';
						echo '<div class="col-md-12 gallery-content">';
							echo '<div class="magnific-mix-gallery masonary">';
								echo '<div id="portfolio-grid" class="gallery-items colums-3 mb--15">';
									$i = 10;
									foreach( $settings['slides'] as $single_data ){
										$i++;
										echo '<!-- Single Item -->';
										echo '<div class="pf-item">';
											echo '<div class="overlay-content">';
												if(!empty($single_data['image']['url'])){
													echo ambrox_img_tag( array(
														'url'	=> esc_url( $single_data['image']['url'] ),
													) );
												}
												echo '<div class="content">';
													echo '<div class="title">';
														if(!empty($single_data['cat'])){
															echo '<span>'.esc_html($single_data['cat']).'</span>';
														}
														if(!empty($single_data['title'])){
							                              	echo '<h5><a href="#" data-bs-toggle="modal" data-bs-target="#id'.esc_attr($i).'">'.esc_html($single_data['title']).'</a></h5>';
							                            }
													echo '</div>';
														echo '<a href="#" data-bs-toggle="modal" data-bs-target="#id'.esc_attr($i).'"><i class="fas fa-arrow-right"></i></a>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
										echo '<!-- End Single Item -->';
									}
									
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				$k = 10;
				foreach( $settings['slides'] as $single_data ){
					$k++;
					echo '<div class="modal fade" id="'.'id'.esc_attr($k).'" tabindex="-1" aria-hidden="true">';
			            echo '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">';
			                echo '<div class="modal-content">';
			                    echo '<div class="modal-body">';

			                        echo '<div class="modal-header">';
			                            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
			                        echo '</div>';

			                        echo '<div class="project-details-items">';
			                        	$elementor = \Elementor\Plugin::instance();
											if( ! empty( $single_data['ambrox_tab_builder_option'] ) ){
											    echo $elementor->frontend->get_builder_content_for_display( $single_data['ambrox_tab_builder_option'] );
											}
			                            
			                        echo '</div>';
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