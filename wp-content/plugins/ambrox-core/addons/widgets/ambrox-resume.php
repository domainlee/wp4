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
class Ambrox_Resume extends Widget_Base {

	public function get_name() {
		return 'ambroxresume';
	}

	public function get_title() {
		return __( 'Ambrox Resume', 'ambrox' );
	}

	public function get_icon() {
		return 'vt-icon';
    }

	public function get_categories() {
		return [ 'ambrox' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'bio_section',
			[
				'label'		 	=> __( 'Biography Information', 'ambrox' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'bio_title',
			[
				'label' 	=> __( 'Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Biography', 'ambrox' )
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'bio_label_name',
			[
				'label' 	=> __( 'Label Name', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Name', 'ambrox' )
			]
        );
        $repeater->add_control(
			'bio_label_info',
			[
				'label' 	=> __( 'Label Info', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Juniatur Rahman', 'ambrox' )
			]
        );
		$this->add_control(
			'bio_info',
			[
				'label' 		=> __( 'Biography', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'bio_label_name'    => __( 'Name', 'ambrox' ),
						'bio_label_info'      => __( 'Juniatur Rahman' ),
					],
					[
						'bio_label_name'    => __( 'Age', 'ambrox' ),
						'bio_label_info'      => __( '32' ),
					],
					
				],
				'title_field' 	=> '{{{ bio_label_name }}}',
			]
		);

        $this->end_controls_section();

        //---------------------------------------------skils---------------------------------------------//


        $this->start_controls_section(
			'skill_section',
			[
				'label'		 	=> __( 'Skill Information', 'ambrox' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'skill_title',
			[
				'label' 	=> __( 'Title', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Skills', 'ambrox' )
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'skill_label_name',
			[
				'label' 	=> __( 'Label Name', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Name', 'ambrox' )
			]
        );
        $repeater->add_control(
			'skill_label_info',
			[
				'label' 	=> __( 'Label Info', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '70', 'ambrox' )
			]
        );
        $repeater->add_control(
			'skill_icon',
			[
				'label' 	=> __( 'Icon', 'ambrox' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fab fa-laravel"></i>', 'ambrox' )
			]
        );
		$this->add_control(
			'skill_info',
			[
				'label' 		=> __( 'Biography', 'ambrox' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'skill_label_name'    => __( 'Object oriented programming', 'ambrox' ),
						'skill_label_info'      => __( '70' ),
						'skill_icon'      => __( '<i class="fab fa-laravel"></i>' ),
					],
				],
				'title_field' 	=> '{{{ skill_label_name }}}',
			]
		);

        $this->end_controls_section();

        //---------------------------------------------education---------------------------------------------//


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

        $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings_for_display();




        echo '<div class="resume-area default-padding-top">';
	        echo '<div class="shape-right-top-extra">';
	            echo '<img src="'.AMBROX_PLUGDIRURI . 'assets/img/14.png" alt="Shape">';
	        echo '</div>';
	        echo '<div class="container">';
	            echo '<div class="experience-content-box">';
	                echo '<div class="row">';
	                    echo '<div class="col-xl-10 offset-xl-1">';
	    
	                        echo '<div class="nav nav-tabs text-center resume-tab-navs" id="nav-tab" role="tablist">';
	    						if(!empty($settings['bio_title'])){
		                            echo '<button class="nav-link active" id="nav-id-1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">'.esc_html($settings['bio_title']).' <strong>01</strong></button>';
		                        }
		                        if(!empty($settings['skill_title'])){
		                            echo '<button class="nav-link" id="nav-id-2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">'.esc_html($settings['skill_title']).' <strong>02</strong></button>';
		                        }
		                        if(!empty($settings['education_title'])){
		                            echo '<button class="nav-link" id="nav-id-3" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">'.esc_html($settings['education_title']).' <strong>03</strong></button>';
		                        }
	    
	                        echo '</div>';
	    
	                        echo '<div class="tab-content resume-tab-content" id="nav-tabContent">';
	                        	if(!empty($settings['bio_info'])){
		                            echo '<!-- Single Item -->';
		                            echo '<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="nav-id-1">';
		                                echo '<div class="row">';
		                                    echo '<div class="col-lg-12">';
		                                        echo '<ul class="biography-table">';
		                                        	foreach( $settings['bio_info'] as $single_data ){
			                                            echo '<li>';
			                                            	if(!empty($single_data['bio_label_name'])){
				                                                echo '<h5>'.esc_html($single_data['bio_label_name']).'</h5>';
				                                            }
				                                            if(!empty($single_data['bio_label_info'])){
				                                                echo '<p>'.esc_html($single_data['bio_label_info']).'</p>';
				                                            }
			                                            echo '</li>';
			                                        }
		                                            
		                                        echo '</ul>';
		                                    echo '</div>';
		                                echo '</div>';
		                            echo '</div>';
		                            echo '<!-- End Single Item -->';
		                        }
		                        if(!empty($settings['skill_info'])){
	    
		                            echo '<!-- Single Item -->';
		                            echo '<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="nav-id-2">';
		                                echo '<div class="row align-center">';
		                                    echo '<div class="col-lg-12">';
		                                        echo '<ul class="skill-table">';
		                                        	foreach( $settings['skill_info'] as $single_data ){
			                                            echo '<li>';
			                                                echo '<div class="row align-center">';
			                                                	if(!empty($single_data['skill_icon'])){
				                                                    echo '<div class="col-lg-2">';
				                                                        echo '<div class="icon">';
				                                                            echo wp_kses_post($single_data['skill_icon']);
				                                                        echo '</div>';
				                                                    echo '</div>';
				                                                }
				                                                if(!empty($single_data['skill_label_name'])){
				                                                    echo '<div class="col-lg-5">';
				                                                        echo '<h4>'.esc_html($single_data['skill_label_name']).'</h4>';
				                                                    echo '</div>';
				                                                }
				                                                if(!empty($single_data['skill_label_info'])){
				                                                    echo '<div class="col-lg-5">';
				                                                        echo '<div class="progress-box">';
				                                                            echo '<h5>'.esc_html($single_data['skill_label_info']).'%</h5>';
				                                                            echo '<div class="progress">';
				                                                                echo '<div class="progress-bar" role="progressbar" data-width="'.esc_attr($single_data['skill_label_info']).'"></div>';
				                                                            echo '</div>';
				                                                        echo '</div>';
				                                                    echo '</div>';
				                                                }
			                                                echo '</div>';
			                                            echo '</li>';
			                                        }
		                                        echo '</ul>';
		                                    echo '</div>';
		                                echo '</div>';
		                            echo '</div>';
		                            echo '<!-- End Single Item -->';
		                        }
	    						if(!empty($settings['education_info'])){
		                            echo '<!-- Single Item -->';
		                            echo '<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="nav-id-3">';
		                                echo '<div class="row">';
		                                    echo '<div class="col-lg-12">';
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
		                            echo '<!-- End Single Item -->';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
	}
}