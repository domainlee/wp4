<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Portfolio about Widget .
 *
 */
class Ambrox_Portfolio_About extends Widget_Base {

	public function get_name() {
		return 'ambroxportfolioabout';
	}

	public function get_title() {
		return __( 'Ambrox Portfolio About', 'ambrox' );
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
				'label'     => __( 'About', 'ambrox' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
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
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'The Title', 'ambrox' ),
                'condition'		=> [ 'section_heading' => [ 'yes']],
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
        $this->add_control(
			'section_desc',
			[
				'label' 	=> __( 'Description', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> __( 'The Description area', 'ambrox' ),
			]
        );
        $this->add_control(
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
			'subtitle', [
				'label' 		=> __( 'TSubtitle', 'ambrox' ),
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
				'label' 		=> __( 'About', 'ambrox' ),
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
					'{{WRAPPER}} .about-style-six .sub-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .about-style-six .sub-title',
			]
		);

        $this->add_responsive_control(
			's_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-six .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .about-style-six .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

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
					'{{WRAPPER}} .about-style-six h2'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .about-style-six h2',
			]
		);

        $this->add_responsive_control(
			's_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-six h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .about-style-six h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab7',
			[
				'label' => esc_html__( 'Content', 'ambrox' ),
			]
		);
		$this->add_control(
			's_content_color7',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-six p'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_content_typography7',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .about-style-six p',
			]
		);

        $this->add_responsive_control(
			's_content_margin7',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-six p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			's_content_padding7',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-style-six p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
				'label' 	=> __( 'About', 'ambrox' ),
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
					'{{WRAPPER}} .skill-list li h4'	=> 'color: {{VALUE}}!important;',

				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'f_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .skill-list li h4',
			]
		);

        $this->add_responsive_control(
			'f_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .skill-list li h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .skill-list li h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .skill-list span'	=> 'color: {{VALUE}}!important;'
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'f_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .skill-list span',
			]
		);

        $this->add_responsive_control(
			'f_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .skill-list span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .skill-list span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );



		$this->end_controls_tab();


		$this->end_controls_tabs();
		$this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!------------------------------- Features Area start ------------------------------->';


        echo '<div class="about-style-six-area default-padding-top">';
	        echo '<div class="container">';
	            echo '<div class="row align-center">';
	                echo '<div class="about-style-six col-lg-5">';
	                	if(!empty($settings['image']['url'])){
		                    echo '<div class="thumb">';
		                        echo '<img class="wow fadeInUp" src="'.esc_url($settings['image']['url']).'" alt="Thumb">';
		                    echo '</div>';
		                }
	                echo '</div>';
	                echo '<div class="about-style-six col-lg-6 offset-lg-1">';
	                	if(!empty($settings['section_title'])){
                          	echo '<h4 class="sub-title">'.esc_html($settings['section_title']).'</h4>';
                        }
                        if(!empty($settings['section_subtitle'])){
                           	echo '<h2 class="title">'.wp_kses_post($settings['section_subtitle']).'</h2>';
                        }
                        if(!empty($settings['section_desc'])){
                           	echo '<p>'.esc_html($settings['section_desc']).'</p>';
                        }
	                    echo '<div class="skill-list">';
	                        echo '<ul>';
	                        	foreach( $settings['slides'] as $single_data ){
		                            echo '<li>';
		                            	echo '<div class="icon">';
		                                    if($single_data['chose_icon_style'] == 'class' ){
		                                    	echo wp_kses_post($single_data['icon_class']);
		                                    }else{
		                                    	echo ambrox_img_tag( array(
													'url'	=> esc_url( $single_data['icon_image']['url'] ),
												) );
		                                    }			                                    
		                                echo '</div>';
		                                echo '<div class="content">';
		                                	if(!empty($single_data['title'])){
			                                    echo '<h4>'.esc_html($single_data['title']).'</h4>';
			                                }
			                                if(!empty($single_data['subtitle'])){
			                                    echo '<span>'.esc_html($single_data['subtitle']).'</span>';
			                                }
		                                echo '</div>';
		                            echo '</li>';
		                        }

	                        echo '</ul>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
		echo '<!--------------------------------- Features Area end --------------------------------->';
	}
}