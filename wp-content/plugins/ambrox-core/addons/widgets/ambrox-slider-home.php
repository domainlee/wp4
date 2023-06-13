<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Tab Builder Widget .
 *
 */
class Ambrox_Tab_Builder extends Widget_Base {

	public function get_name() {
		return 'ambroxtabbuilder';
	}

	public function get_title() {
		return __( 'Tab Builder', 'ambrox' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	protected function register_controls() {

		$this->start_controls_section(
			'tab_builder_section',
			[
				'label' 	=> __( 'Tab Builder', 'ambrox' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Title', 'ambrox' )
			]
        );
        $this->add_control(
			'subtitle',
			[
				'label' 	=> __( 'Subtitle', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Subtitle', 'ambrox' )
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'tab_builder_text',
			[
				'label' 	=> __( 'Tab Builder Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Ut fermentum massa justo', 'ambrox' )
			]
        );

		$repeater->add_control(
			'ambrox_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'ambrox' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->ambrox_tab_builder_choose_option(),
				'default'	=> ''
			]
		);

        $repeater->add_control(
			'make_it_active',
			[
				'label' 		=> __( 'Make It Active?', 'ambrox' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'ambrox' ),
				'label_off' 	=> __( 'No', 'ambrox' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'tab_builder_repeater',
			[
				'label' 		=> __( 'Tab', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_builder_text'    => __( 'Cardiology', 'ambrox' ),
					],
					[
						'tab_builder_text'    => __( 'Gastroenterologist', 'ambrox' ),
					],
					[
						'tab_builder_text'    => __( 'Neurology', 'ambrox' ),
					],
				],
				'title_field' 	=> '{{{ tab_builder_text }}}',
			]
		);

        $this->end_controls_section();


    }

	public function ambrox_tab_builder_choose_option(){

		$ambrox_post_query = new WP_Query( array(
			'post_type'				=> 'ambrox_tab_builder',
			'posts_per_page'	    => -1,
		) );

		$ambrox_tab_builder_title = array();
		$ambrox_tab_builder_title[''] = __( 'Select a Tab','Foodelio');

		while( $ambrox_post_query->have_posts() ) {
			$ambrox_post_query->the_post();
			$ambrox_tab_builder_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $ambrox_tab_builder_title;

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="banner-area banner-style-one banner-three double-items navigation-between-bottom navigation-right-botom navigation-custom-large  overflow-hidden top-pad-80 text-light">';
	        echo '<!-- Slider main container -->';
	        echo '<div class="banner-slide-counter">';
	            echo '<!-- Additional required wrapper -->';
	            echo '<div class="swiper-wrapper">';

	            
	                foreach( $settings['tab_builder_repeater'] as $single_menu ){
		            		$title			= $single_menu['tab_builder_text'];
							$replace 		= array(' ',' - ');
							$with 			= array('-','-');
							$tabid 			= strtolower( str_replace( $replace, $with, $title ) );
							
			                
		                        $elementor = \Elementor\Plugin::instance();
		                        if( ! empty( $single_menu['ambrox_tab_builder_option'] ) ){
		                        	echo '<div class="swiper-slide">';
		                            	echo $elementor->frontend->get_builder_content_for_display( $single_menu['ambrox_tab_builder_option'] );
		                            echo '</div>';
		                        }
			                
			            }
	                    
	                    
	            echo '</div>';

	            echo '<!-- Pagination -->';
	            echo '<div class="swiper-pagination"></div>';

	            echo '<!-- Navigation -->';
	            echo '<div class="swiper-button-prev"></div>';
	            echo '<div class="swiper-button-next"></div>';

	        echo '</div>        ';
	    echo '</div>';



        	
	}
}