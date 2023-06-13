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
 * Project Inforamtion Widget .
 *
 */
class Ambrox_Project_Info extends Widget_Base {

	public function get_name() {
		return 'ambroxprojectinfo';
	}

	public function get_title() {
		return __( 'Ambrox Project Info', 'ambrox' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label'     => __( 'Project Info', 'ambrox' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

	
		$project_info = new \Elementor\Repeater();

		$project_info->add_control(
			'info_label',
            [
				'label'         => __( 'Info Label', 'ambrox' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Date' , 'ambrox' ),
				'label_block'   => true,
			]
		);
		$project_info->add_control(
			'info_content',
            [
				'label'         => __( 'Information', 'ambrox' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '25 February, 2022' , 'ambrox' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'informations',
			[
				'label' 	=> __( 'Icon List', 'ambrox' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $project_info->get_controls(),
				'default' 	=> [
					[
						'info_label' 	=> __( 'Client', 'ambrox' ),
					],
					[
						'info_label' 	=> __( 'Date', 'ambrox' ),
					],
					[
						'info_label' 	=> __( 'Address', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ info_label }}}',
			]
		);

		$social_repeater = new \Elementor\Repeater();

		$social_repeater->add_control(
			'social_icon',
			[
				'label' 		=> __( 'Social Icon', 'ambrox' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'value' 		=> 'fas fa-star',
					'library' 		=> 'solid',
				],
			]
		);

		$social_repeater->add_control(
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
			'social_icon_repeat',
			[
				'label' 	=> __( 'Icon List', 'ambrox' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $social_repeater->get_controls(),
				'default' 	=> [
					[
						'social_icon' 	=> __( 'Icon #1', 'ambrox' ),
					],
					[
						'social_icon' 	=> __( 'Icon #2', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ social_icon.value }}}',
			]
		);
	
        $this->end_controls_section();

        //-----------------------------------------Label styling-----------------------------------------//


        $this->start_controls_section(
			'label_styling',
			[
				'label' 	=> __( 'Label Styling', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'label_color',
			[
				'label' 		=> __( 'Label Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-info .project-basic-info li'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'label_typography',
		 		'label' 		=> __( 'Label Typography', 'ambrox' ),
		 		'selector' 		=> '{{WRAPPER}} .project-info .project-basic-info li',
			]
		);

        $this->add_responsive_control(
			'label_margin',
			[
				'label' 		=> __( 'Label Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info .project-basic-info li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			'label_padding',
			[
				'label' 		=> __( 'Label Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info .project-basic-info li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->end_controls_section();
        //-----------------------------------------Value styling-----------------------------------------//


        $this->start_controls_section(
			'value_styling',
			[
				'label' 	=> __( 'Value Styling', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'value_color',
			[
				'label' 		=> __( 'Value Color', 'ambrox' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-info .project-basic-info li span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'value_typography',
		 		'label' 		=> __( 'Value Typography', 'ambrox' ),
		 		'selector' 		=> '{{WRAPPER}} .project-info .project-basic-info li span',
			]
		);

        $this->add_responsive_control(
			'value_margin',
			[
				'label' 		=> __( 'Value Margin', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info .project-basic-info li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
        );

        $this->add_responsive_control(
			'value_padding',
			[
				'label' 		=> __( 'Value Padding', 'ambrox' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-info .project-basic-info li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<!-----------------------Start Project Inforamtion Area----------------------->';



        echo'<div class="project-info mt-md-50 mt-xs-40">';
            echo'<div class="content">';
	            echo'<ul class="project-basic-info">';
	            	foreach( $settings['informations'] as $info ){
	            		if(!empty( $info['info_label'] && $info['info_content'] )){
			                echo'<li>'.esc_html($info['info_label']).' <span>'.esc_html($info['info_content']).'</span></li>';
			            }
		            }
	            echo'</ul>';
	            if( ! empty( $settings['social_icon_repeat'] ) ){
		            echo '<ul class="social">';
		            	echo '<h4>'.esc_html__('Follow us:', 'ambrox').'</h4>';
		            	foreach( $settings['social_icon_repeat'] as $single_icon ){
							$target 	= 	$single_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow 	= $single_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
	                    	echo '<li><a '.wp_kses_post( $target.$nofollow ).' href="'.esc_url( $single_icon['icon_link']['url'] ).'">';
							\Elementor\Icons_Manager::render_icon( $single_icon['social_icon'], [ 'aria-hidden' => 'true' ] );
							echo '</a></li>';
						}
		            echo'</ul>';
	        }
        	echo'</div>';
        echo'</div>';
		echo '<!-----------------------Start Project Inforamtion Area----------------------->';

	}

}