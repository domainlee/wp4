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
 * Resume Widget .
 *
 */
class Ambrox_Education extends Widget_Base {

	public function get_name() {
		return 'ambroxeducation';
	}

	public function get_title() {
		return __( 'Ambrox Education', 'ambrox' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		
        $this->start_controls_section(
			'education_section',
			[
				'label'		 	=> __( 'Education Information', 'ambrox' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'education_title',
			[
				'label' 	=> __( 'Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Education', 'ambrox' )
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'inistitute_name',
			[
				'label' 	=> __( 'Inistitute Name', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'SuperKing College', 'ambrox' )
			]
        );

        $repeater->add_control(
			'digree_name',
			[
				'label' 	=> __( 'Digree Name', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'AS - Science & Information', 'ambrox' )
			]
        );
        $repeater->add_control(
			'study_year',
			[
				'label' 	=> __( 'Duration', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '2001 - 2005', 'ambrox' )
			]
        );
        $repeater->add_control(
			'desc',
			[
				'label' 	=> __( 'Short Description', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'The training provided by universities in order to prepare people to work in various sectors of the economy or areas of culture. ', 'ambrox' )
			]
        );
		$this->add_control(
			'education_info',
			[
				'label' 		=> __( 'Biography', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'title_field' 	=> '{{{ inistitute_name }}}',
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Banner Background Image', 'ambrox' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="swiper-slide bg-cover" style="background: url('.esc_url($settings['bg_image']['url']).');">';
            echo '<div class="container">';
                echo '<div class="content">';
                    echo '<div class="row align-center">';
                        echo '<div class="col-lg-1 info">';
                            if(!empty($settings['education_title'])){
                                echo '<h2 class="curbe-title">'.esc_html($settings['education_title']).'</h2>';
                            }
                        echo '</div>';

                        echo '<div class="col-lg-10 offset-lg-1 thumb">';
                            echo '<ul class="education-table">';
                                                              
                                foreach( $settings['education_info'] as $single_data ){
                                    echo '<li>';
                                        if(!empty($single_data['digree_name'])){
                                            echo '<h4>'.esc_html($single_data['digree_name']).'</h4>';
                                        }
                                        if(!empty($single_data['inistitute_name'])){
                                            echo '<h5>'.esc_html($single_data['inistitute_name']).'</h5>';
                                        }
                                        if(!empty($single_data['study_year'])){
                                            echo '<span>'.esc_html($single_data['study_year']).'</span>';
                                        }
                                        if(!empty($single_data['desc'])){
                                            echo '<p>'.esc_html($single_data['desc']).'</p>';
                                        }
                                    echo '</li>';
                                }
                            echo '</ul>';
                        echo '</div>';
                        
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
	}
}