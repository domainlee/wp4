<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * gallery filter Widget .
 *
 */
class Ambrox_Gallery_Filter extends Widget_Base {

	public function get_name() {
		return 'ambroxgalleryfilter';
	}

	public function get_title() {
		return __( 'Ambrox Gallery', 'ambrox' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Gallery', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        ); 
           
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Slider', 'ambrox' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="brand-style-one-area text-center default-padding-top">';
	        echo '<div class="container">';
	            echo '<div class="brand-style-one">';
	                echo '<div class="row">';
	                    echo '<div class="col-lg-12">';
	                        echo '<div class="brand5col swiper">';
	                            echo '<!-- Additional required wrapper -->';
	                            echo '<div class="swiper-wrapper align-center">';
	                            	foreach ( $settings['gallery'] as $single_data ) {
		                                echo '<!-- Single Item -->';
		                                echo '<div class="swiper-slide">';
		                                    echo ambrox_img_tag( array(
					                            'url'   => esc_url( $single_data['url'] )
					                        ) );
		                                echo '</div>';
		                                echo '<!-- End Single Item -->';
		                            }
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	                echo '<!-- End Brand -->';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}

}