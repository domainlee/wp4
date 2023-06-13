<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class Ambrox_Faq extends Widget_Base {

	public function get_name() {
		return 'ambroxfaq';
	}

	public function get_title() {
		return __( 'Ambrox Faq', 'ambrox' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'ambrox' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Ut fermentum massa justo', 'ambrox' )
			]
        );
        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna .', 'ambrox' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'If I face issue then how can I contact with you?', 'ambrox' ),
						'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.' ),
					],
					[
						'faq_question'    => __( 'When Your Consult Business Begins To Grow?', 'ambrox' ),
                        'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.' ),
					],
					[
						'faq_question'    => __( 'Common Misconcep About Building A Team?', 'ambrox' ),
                        'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.' ),
					],
				],
				'title_field' 	=> '{{{ faq_question }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Style', 'ambrox' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Faq Question Color', 'ambrox' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Faq Question Typography', 'ambrox' ),
                'selector' 	=> '{{WRAPPER}} .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Faq Question Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Faq Question Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->add_control(
			'faq_answer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before'
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography',
				'label' 	=> __( 'Faq Answer Typography', 'ambrox' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin',
			[
				'label' 		=> __( 'Faq Answer Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Faq Answer Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        if( ! empty( $settings['faq_repeater'] ) ){
        	$idd = uniqid();
        	echo '<div class="faq-style-one">';
	        	echo '<div class="accordion" id="faqAccordion'.esc_attr($idd).'">';
	        		$x = 1;
	        		
	                foreach( $settings['faq_repeater'] as $single_data ){
	                	$idds = uniqid();

						if( $x == '1' ){
							$ariaexpanded 	= 'true';
							$class 			= 'show';
							$collesed 		= '';
						}else{
							$ariaexpanded 	= 'false';
							$class 			= '';
							$collesed 		= 'collapsed';
						}

		                echo '<div class="accordion-item">';
		                	if( ! empty( $single_data['faq_question'] ) ){
			                    echo '<h2 class="accordion-header" id="heading'.esc_attr($idds).'">';
			                        echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.esc_attr($idds).'" aria-expanded="'.esc_attr($ariaexpanded).'" aria-controls="collapse'.esc_attr($idds).'">'.esc_html($single_data['faq_question']).'</button>';
			                    echo '</h2>';
			                }
			                if( ! empty( $single_data['faq_answer'] ) ){
			                    echo '<div id="collapse'.esc_attr($idds).'" class="accordion-collapse collapse '.esc_attr($class).'" aria-labelledby="heading'.esc_attr($idds).'" data-bs-parent="#faqAccordion'.esc_attr($idd).'">';
			                        echo '<div class="accordion-body">';
			                            echo '<p>'.esc_html($single_data['faq_answer']).'</p>';
			                        echo '</div>';
			                    echo '</div>';
			                }
		                echo '</div>';
		               $x++;
		            }
	            echo '</div>';
            echo '</div>';
        }
	}
}