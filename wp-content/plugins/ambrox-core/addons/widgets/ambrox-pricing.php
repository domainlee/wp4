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
 * Pricing Widget .
 *
 */
class Ambrox_pricing extends Widget_Base {

	public function get_name() {
		return 'ambroxpricing';
	}

	public function get_title() {
		return __( 'Ambrox Pricing', 'ambrox' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'pricing_section',
			[
				'label'		 	=> __( 'Pricing', 'ambrox' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
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
			'offer_text',
			[
				'label' 	=> __( 'Offer Text', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default'  	=> __( 'Save up to <strong>50%</strong> with your every order', 'ambrox' ),
			]
        );


        $repeater = new Repeater();

        $repeater->add_control(
			'package_name',
			[
				'label' 	=> __( 'Package Name', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'WordPress Development', 'ambrox' )
			]
        );
        $repeater->add_control(
			'package_icon',
			[
				'label' 	=> __( 'Package Icon', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fab fa-wordpress"></i>', 'ambrox' )
			]
        );
        $repeater->add_control(
			'package_features',
			[
				'label' 	=> __( 'Package Features', 'ambrox' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( '<i class="fab fa-wordpress"></i>', 'ambrox' )
			]
        );
        $repeater->add_control(
			'package_price',
			[
				'label' 	=> __( 'Package Price', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '48', 'ambrox' )
			]
        );
        $repeater->add_control(
			'package_button',
			[
				'label' 	=> __( 'Button Text', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '48', 'ambrox' )
			]
        );
        $repeater->add_control(
			'package_button_url',
			[
				'label' 	=> __( 'Button URL', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '#', 'ambrox' )
			]
        );
		$this->add_control(
			'plans',
			[
				'label' 		=> __( 'Pricing', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'title_field' 	=> '{{{ package_name }}}',
			]
		);

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<div class="pricing-area default-padding-top">';
	        echo '<div class="container">';
	            echo '<div class="pricing-box">';
	                echo '<div class="row">';
	                    echo '<div class="col-lg-5">';
	                        echo '<div class="heading-left">';
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
	                        if(!empty($settings['offer_text'])){
		                        echo '<div class="save-ammount mt-100 mt-md-50">';
		                            echo '<h4>'.wp_kses_post($settings['offer_text']).'</h4>';
		                            echo '<img src="'.AMBROX_PLUGDIRURI . 'assets/img/2.webp" alt="Thumb">';
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                    echo '<div class="col-lg-6 offset-lg-1">';

	                        foreach( $settings['plans'] as $single_data ){
		                        echo '<div class="pricing-style-one">';
		                           echo ' <div class="conntent">';
		                           		if(!empty($single_data['package_name'])){
			                                echo '<h4>'.esc_html($single_data['package_name']).'</h4>';
			                            }
			                            if(!empty($single_data['package_features'])){
			                                echo wp_kses_post($single_data['package_features']);
			                            }
		                                if(!empty($single_data['package_button'])){
			                                echo '<a class="btn mt-25 btn-sm circle btn-theme" href="'.esc_url($single_data['package_button_url']).'">'.esc_html($single_data['package_button']).'</a>';
			                            }
		                            echo '</div>';
		                            echo '<div class="price">';
		                            	if(!empty($single_data['package_price'])){
			                                echo '<h2>'.wp_kses_post($single_data['package_price']).'</h2>';
			                            }
			                            
			                            if(!empty($single_data['package_icon'])){
			                                echo wp_kses_post($single_data['package_icon']);
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}
}