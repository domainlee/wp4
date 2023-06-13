<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Ambrox_Section_Title_Widget extends Widget_Base {

	public function get_name() {
		return 'ambroxsectiontitle';
	}

	public function get_title() {
		return __( 'Section Title', 'ambrox' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Section Title', 'ambrox' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'ambrox' )
			]
        );
        $this->add_control(
			'section_title_tag',
			[
				'label' 	=> __( 'Title Tag', 'ambrox' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default' => 'h4',
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'ambrox' )
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label' 	=> __( 'Subitle Tag', 'ambrox' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' 		=> 'H1',
					'h2' 		=> 'H2',
					'h3' 		=> 'H3',
					'h4' 		=> 'H4',
					'h5' 		=> 'H5',
					'h6' 		=> 'H6',
					'p'  		=> 'P',
					'span'  	=> 'SPAN',
				],
				'default' 	=> 'h2',
				'condition'	=> ['section_subtitle!' => '']
			]
		);

		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'ambrox' )
			]
        );

        $this->add_responsive_control(
			'section_title_align',
			[
				'label' 		=> __( 'Alignment', 'ambrox' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'ambrox' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'ambrox' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'ambrox' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading' => 'text-align: {{VALUE}};',
                ]
			]
		);
		$this->add_control(
			'use_seperator',
			[
				'label' 		=> __( 'Use Seperator ?', 'ambrox' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'ambrox' ),
				'label_off' 	=> __( 'Hide', 'ambrox' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Wrapper Configaration', 'ambrox' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'section_wrapper_margin',
			[
				'label' 		=> __( 'Section Wrapper Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'section_wrapper_padding',
			[
				'label' 		=> __( 'Section Wrapper Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .site-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' 	=> 'after'
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
					'{{WRAPPER}} .title-selector'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .title-selector',
			]
		);

        $this->add_responsive_control(
			's_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'

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
					'{{WRAPPER}} .subtitle-selector'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .subtitle-selector',
			]
		);

        $this->add_responsive_control(
			's_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .subtitle-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------third--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Description', 'ambrox' ),
				'condition' => [
                    'section_description!'    => ''
                ]
			]
		);
		$this->add_control(
			's_desc_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-text'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 's_desc_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} .sec-text',
			]
		);

        $this->add_responsive_control(
			's_desc_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->add_responsive_control(
			's_desc_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_normal_tab4',
			[
				'label' => esc_html__( 'Devider', 'ambrox' ),
				'condition' => [
                    'use_seperator'    => 'yes'
                ]
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

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'site-heading' );

        echo '<!-- Section Title -->';
		echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';
			if( !empty( $settings['section_title'] ) ) {
            	echo '<'.esc_attr($settings['section_title_tag']).' class="title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
			}
			if( !empty( $settings['section_subtitle'] ) ) {
				echo '<'.esc_attr($settings['section_subtitle_tag']).' class="subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
			}
			if( $settings['use_seperator'] == 'yes' ){
				echo'<div class="devider"></div>';
			}

			if( ! empty( $settings['section_description'] ) ){
				echo ambrox_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'sec-text'
				) );
			}
        echo '</div>';
        echo '<!-- End Section Title -->';
	}
}