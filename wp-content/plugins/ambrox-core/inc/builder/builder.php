<?php
    /**
     * Class For Builder
     */
    class AmbroxBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'ambrox_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'ambrox-core',AMBROX_PLUGDIRURI.'assets/js/ambrox-core.js',array( 'jquery' ),'1.0',true );
		}


        public function ambrox_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'ambrox_header_option',
                [
                    'label'     => __( 'Header Option', 'ambrox' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'ambrox_header_style',
                [
                    'label'     => __( 'Header Option', 'ambrox' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'ambrox' ),
    					'header_builder'       => __( 'Header Builder', 'ambrox' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'ambrox_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'ambrox' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->ambrox_header_choose_option(),
                    'condition' => [ 'ambrox_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'ambrox_footer_option',
                [
                    'label'     => __( 'Footer Option', 'ambrox' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'ambrox_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'ambrox' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'ambrox' ),
    				'label_off'     => __( 'No', 'ambrox' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'ambrox_footer_style',
                [
                    'label'     => __( 'Footer Style', 'ambrox' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'ambrox' ),
    					'footer_builder'       => __( 'Footer Builder', 'ambrox' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'ambrox_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'ambrox_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'ambrox' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->ambrox_footer_choose_option(),
                    'condition' => [ 'ambrox_footer_style' => 'footer_builder','ambrox_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Ambrox Builder', 'ambrox' ),
            	esc_html__( 'Ambrox Builder', 'ambrox' ),
				'manage_options',
				'ambrox',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('ambrox', esc_html__('Footer Builder', 'ambrox'), esc_html__('Footer Builder', 'ambrox'), 'manage_options', 'edit.php?post_type=ambrox_footer');
			add_submenu_page('ambrox', esc_html__('Header Builder', 'ambrox'), esc_html__('Header Builder', 'ambrox'), 'manage_options', 'edit.php?post_type=ambrox_header');
            add_submenu_page('ambrox', esc_html__('Tab Builder', 'ambrox'), esc_html__('Tab Builder', 'ambrox'), 'manage_options', 'edit.php?post_type=ambrox_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','ambrox' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'ambrox' ),
				'singular_name'      => __( 'Footer', 'ambrox' ),
				'menu_name'          => __( 'Ambrox Footer Builder', 'ambrox' ),
				'name_admin_bar'     => __( 'Footer', 'ambrox' ),
				'add_new'            => __( 'Add New', 'ambrox' ),
				'add_new_item'       => __( 'Add New Footer', 'ambrox' ),
				'new_item'           => __( 'New Footer', 'ambrox' ),
				'edit_item'          => __( 'Edit Footer', 'ambrox' ),
				'view_item'          => __( 'View Footer', 'ambrox' ),
				'all_items'          => __( 'All Footer', 'ambrox' ),
				'search_items'       => __( 'Search Footer', 'ambrox' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'ambrox' ),
				'not_found'          => __( 'No Footer found.', 'ambrox' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'ambrox' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'ambrox_footer', $args );

			$labels = array(
				'name'               => __( 'Header', 'ambrox' ),
				'singular_name'      => __( 'Header', 'ambrox' ),
				'menu_name'          => __( 'Ambrox Header Builder', 'ambrox' ),
				'name_admin_bar'     => __( 'Header', 'ambrox' ),
				'add_new'            => __( 'Add New', 'ambrox' ),
				'add_new_item'       => __( 'Add New Header', 'ambrox' ),
				'new_item'           => __( 'New Header', 'ambrox' ),
				'edit_item'          => __( 'Edit Header', 'ambrox' ),
				'view_item'          => __( 'View Header', 'ambrox' ),
				'all_items'          => __( 'All Header', 'ambrox' ),
				'search_items'       => __( 'Search Header', 'ambrox' ),
				'parent_item_colon'  => __( 'Parent Header:', 'ambrox' ),
				'not_found'          => __( 'No Header found.', 'ambrox' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'ambrox' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'ambrox_header', $args );

            $labels = array(
				'name'               => __( 'Tab Builder', 'ambrox' ),
				'singular_name'      => __( 'Tab Builder', 'ambrox' ),
				'menu_name'          => __( 'Ambrox Tab Builder', 'ambrox' ),
				'name_admin_bar'     => __( 'Tab Builder', 'ambrox' ),
				'add_new'            => __( 'Add New', 'ambrox' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'ambrox' ),
				'new_item'           => __( 'New Tab Builder', 'ambrox' ),
				'edit_item'          => __( 'Edit Tab Builder', 'ambrox' ),
				'view_item'          => __( 'View Tab Builder', 'ambrox' ),
				'all_items'          => __( 'All Tab Builder', 'ambrox' ),
				'search_items'       => __( 'Search Tab Builder', 'ambrox' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'ambrox' ),
				'not_found'          => __( 'No Tab Builder found.', 'ambrox' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'ambrox' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'ambrox_tab_builder', $args );

		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'ambrox_footer' == $post->post_type || 'ambrox_header' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			if('ambrox_tab_builder' == $post->post_type ){
				return AMBROX_CORE_PLUGIN_TEMP . 'ambrox-service-single.php';
			}
			return $single_template;
		}

        public function ambrox_footer_choose_option(){

			$ambrox_post_query = new WP_Query( array(
				'post_type'			=> 'ambrox_footer',
				'posts_per_page'	    => -1,
			) );

			$ambrox_builder_post_title = array();
			$ambrox_builder_post_title[''] = __('Select a Footer','Ambrox');

			while( $ambrox_post_query->have_posts() ) {
				$ambrox_post_query->the_post();
				$ambrox_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $ambrox_builder_post_title;

		}

		public function ambrox_header_choose_option(){

			$ambrox_post_query = new WP_Query( array(
				'post_type'			=> 'ambrox_header',
				'posts_per_page'	    => -1,
			) );

			$ambrox_builder_post_title = array();
			$ambrox_builder_post_title[''] = __('Select a Header','Ambrox');

			while( $ambrox_post_query->have_posts() ) {
				$ambrox_post_query->the_post();
				$ambrox_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $ambrox_builder_post_title;

        }

    }

    $builder_execute = new AmbroxBuilder();