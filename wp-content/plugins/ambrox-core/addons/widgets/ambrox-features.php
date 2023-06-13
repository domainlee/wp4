<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * process Widget .
 *
 */
class Ambrox_Feature_List extends Widget_Base {

	public function get_name() {
		return 'ambroxfeaturelist';
	}

	public function get_title() {
		return __( 'Feature List', 'ambrox' );
	}


	public function get_icon() {
		return 'vt-icon';
    }


	public function get_categories() {
		return [ 'ambrox' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_list_section',
			[
				'label' 	=> __( 'Feature List', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $repeater = new Repeater();

		$repeater->add_control(
			'process_title',
			[
				'label'     => __( 'Title', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Project Planning' , 'ambrox' ),
			]
        );
        $repeater->add_control(
			'process_icon',
			[
				'label'     => __( 'Icon', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( '<i class="flaticon-development"></i>' , 'ambrox' ),
			]
        );
        $repeater->add_control(
			'process_con',
			[
				'label'     => __( 'Content', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 		=> __( 'Share processes and data secure lona need to know basis Our team assured your web site is always.' , 'ambrox' ),
			]
        );
        $repeater->add_control(
			'process_url',
			[
				'label'     => __( 'URL', 'ambrox' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'processs',
			[
				'label' 		=> __( 'Process', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ process_title }}}',
			]
		);

		
        $this->end_controls_section();

        //---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'appku' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} a',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Number Style---------------------------------------//

		$this->start_controls_section(
			'con_style',
			[
				'label' 	=> __( 'Description Style', 'appku' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'number_typography',
				'label' 	=> __( 'Typography', 'appku' ),
                'selector' 	=> '{{WRAPPER}} p',
			]
        );
        $this->add_responsive_control(
			'number_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'number_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<div class="services-more">';
            echo '<div class="row">';
                foreach( $settings['processs'] as $single_data ) {
                	$url = $single_data['process_url'] ;
					if(!empty($url)){
						$url_start_tag 	= '<a href="'.esc_url($url).'">';
						$url_end_tag 	= '</a>';
					}else{
						$url_start_tag 	= '';
						$url_end_tag 	= '';
					}
	                echo '<div class="col-md-6">';
	                    echo '<div class="item">';
	                    	if(!empty($single_data['process_icon'])){
	                    		echo wp_kses_post($single_data['process_icon']);
	                    	}
	                        
	                        if(!empty($single_data['process_title'])){
				                echo '<h4>'.$url_start_tag.esc_html($single_data['process_title']).$url_end_tag.'</h4>';
				            }
	                        if(!empty($single_data['process_con'])){
				                echo '<p>'.esc_html($single_data['process_con']).'</p>';
				            }
	                    echo '</div>';
	                echo '</div>';
	            }
                

            echo '</div>';
        echo '</div>';
	}
}