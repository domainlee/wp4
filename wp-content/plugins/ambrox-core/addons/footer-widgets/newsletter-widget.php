<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Newsletter Widget .
 *
 */
class Ambrox_Newsletter_Widgets extends Widget_Base {

	public function get_name() {
		return 'ambroxnewsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'ambrox' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'ambrox_footer_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'newsletter_section',
			[
				'label'     => __( 'Newsletter Options', 'ambrox' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'newsletter_placeholder',
			[
				'label'     => __( 'Newsletter Placeholder Text', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Placeholder Text', 'ambrox' ),
			]
        );

        $this->add_control(
			'newsletter_submit',
			[
				'label'     => __( 'Newsletter Submit Button Text', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Subscribe', 'ambrox' )
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'newsletter_title_style_section',
			[
				'label'     => __( 'Newsletter Style', 'ambrox' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'newsletter_write_color',
			[
				'label'     => __( 'Newsletter Color', 'ambrox' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_control(
			'newsletter_background_color',
			[
				'label'     => __( 'Newsletter Background Color', 'ambrox' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'newsletter_border_color',
			[
				'label'     => __( 'Newsletter Border Color', 'ambrox' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input' => 'border-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'newsletter_placeholder_color',
			[
				'label'     => __( 'Newsletter Placeholder Color', 'ambrox' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input::placeholder' => 'color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'input_border',
				'label'     => __( 'Border', 'ambrox' ),
				'selector'  => '{{WRAPPER}} .newsletter-form input',
			]
		);

        $this->add_control(
			'newsletter_button_color',
			[
				'label'     => __( 'Newsletter Button Color', 'ambrox' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'newsletter_button_color_hover',
			[
				'label'     => __( 'Newsletter Button Color Hover', 'ambrox' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .vs-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_button_typography',
				'label'     => __( 'Newsletter Button Typography', 'ambrox' ),
                'selector'  => '{{WRAPPER}} .newsletter-form .vs-btn',
			]
        );
		$this->add_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<form class="newsletter-style1 newsletter-form d-block">';
			echo '<div class="form-group">';
				echo '<input required type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
				if( ! empty( $settings['newsletter_submit'] ) ){
					echo '<button type="submit" class="vs-btn style5">'.esc_html( $settings['newsletter_submit'] ).' </button>';
				}
			echo '</div>';
		echo '</form>';
	}
}