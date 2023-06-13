<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Testimonials Widget .
 *
 */
class Ambrox_Testimonials extends Widget_Base {

	public function get_name() {
		return 'ambroxtestimonials';
	}

	public function get_title() {
		return __( 'Ambrox Testimonials', 'ambrox' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'features_section',
			[
				'label'     => __( 'Testimonials', 'ambrox' ),
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
        //----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'feedback', [
				'label' 		=> __( 'Feedback', 'ambrox' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rubaida Kanom' , 'ambrox' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'img',
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
				'label' 		=> __( 'Slides', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Rubaida Kanom', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
			]
		);
		$this->add_control(
			'shape',
			[
				'label' 		=> __( 'Shape Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();

		
        /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Testimonials Styling', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Name', 'ambrox' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h4'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} h4',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'ambrox' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} span',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();


		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'ambrox' ),
			]
		);
		$this->add_control(
			'counter_color',
			[
				'label' 		=> __( 'Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_typography',
		 		'label' 		=> __( 'Typography', 'ambrox' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'counter_margin',
			[
				'label' 		=> __( 'Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_padding',
			[
				'label' 		=> __( 'Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<!------------------------------- Testimonials Area start ------------------------------->';


        echo '<div class="testimonial-area default-padding">';

	        echo '<div class="container">';
	            echo '<div class="row">';
	                echo '<div class="col-lg-8 offset-lg-2">';
	                    echo '<div class="site-heading text-center">';
	                        if(!empty($settings['section_title'])){
                              	echo '<h4 class="sub-title">'.esc_html($settings['section_title']).'</h4>';
                            }
                            if(!empty($settings['section_subtitle'])){
                               	echo '<h2 class="title">'.wp_kses_post($settings['section_subtitle']).'</h2>';
                            }
	                        echo '<div class="devider"></div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';

	        echo '<div class="container">';
	            echo '<div class="testimonial-style-one-box text-center">';
	                echo '<div class="row align-center">';
	                    echo '<div class="col-lg-8 offset-lg-2">';
	                        echo '<div class="testimonial-style-one-carousel swiper">';
	                            echo '<!-- Additional required wrapper -->';
	                            echo '<div class="swiper-wrapper">';

	                            	foreach( $settings['slides'] as $single_data ){
		                                echo '<!-- Single item -->';
		                                echo '<div class="swiper-slide">';
		                                    echo '<div class="testimonial-style-one">';
		                                        
		                                        echo '<div class="item">';
		                                            if( ! empty( $single_data['img']['url'] ) ){
			                                            echo '<div class="thumb">';

			                                                echo ambrox_img_tag( array(
																'url'	=> esc_url( $single_data['img']['url'] ),
															) );
			                                                if( ! empty( $settings['shape']['url'] ) ){
				                                                echo '<div class="shape">';
				                                                    echo ambrox_img_tag( array(
																		'url'	=> esc_url( $settings['shape']['url'] ),
																	) );
				                                                echo '</div>';
				                                            }
			                                            echo '</div>';
			                                        }

		                                            if(!empty($single_data['feedback'])){
						                                echo '<div class="content">';
						                                    echo '<p>'.esc_html( $single_data['feedback'] ).'</p>';
						                                echo '</div>';
						                            }

		                                            echo '<div class="provider">';
		                                                echo '<div class="info">';
		                                                    if(!empty($single_data['name'])){
							                                    echo '<h4>'.wp_kses_post($single_data['name']).'</h4>';
							                                }
							                                if(!empty($single_data['designation'])){
							                                    echo '<span>'.wp_kses_post($single_data['designation']).'</span>';
							                                }
		                                                echo '</div>';
		                                            echo '</div>';
		                                        echo '</div>';
		                                    echo '</div>';
		                                echo '</div>';
		                                echo '<!-- End Single item -->';
		                            }
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
		echo '<!--------------------------------- Testimonials Area end --------------------------------->';
	}
}