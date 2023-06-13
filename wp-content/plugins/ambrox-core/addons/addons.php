<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Ambrox Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Ambrox_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

        // Register widget scripts
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);

        // category register
		add_action( 'elementor/elements/categories_registered',[ $this, 'ambrox_elementor_widget_categories' ] );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ambrox' ),
			'<strong>' . esc_html__( 'Ambrox Core', 'ambrox' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ambrox' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ambrox' ),
			'<strong>' . esc_html__( 'Ambrox Core', 'ambrox' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ambrox' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ambrox' ),
			'<strong>' . esc_html__( 'Ambrox Core', 'ambrox' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'ambrox' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( AMBROX_ADDONS . '/widgets/section-title.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-banner.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-faq.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-features.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-service.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-portfolio.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-about-me.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-resume.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-pricing.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-gallery.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-testimonials.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-hireme.php' );
		require_once( AMBROX_ADDONS . '/widgets/blog-post.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-project-info.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-contact-info.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-slider-home.php' );
		require_once( AMBROX_ADDONS . '/widgets/ambrox-education.php' );

		

		// Header Elements
		require_once( AMBROX_ADDONS . '/header/header.php' );
		require_once( AMBROX_ADDONS . '/header/header-v2.php' );


		// Footer Elements
		require_once( AMBROX_ADDONS . '/footer-widgets/newsletter-widget.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Portfolio_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Feature_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Portfolio_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Portfolio_Project() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Portfolio_About() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Resume() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Gallery_Filter() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Portfolio_Hireme() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Project_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Contact_Form() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Tab_Builder() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Education() );
		
		
		// Header Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Header_v2() );


		// Footer Widget Register
		\Elementor\Plugin::instance()->widgets_manager->register( new \Ambrox_Newsletter_Widgets() );

	}

    public function widget_scripts() {
        wp_enqueue_script(
            'ambrox-frontend-script',
            AMBROX_PLUGDIRURI . 'assets/js/ambrox-frontend.js',
            array('jquery'),
            false,
            true
		);
	}
	

    function ambrox_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'ambrox',
            [
                'title' => __( 'Ambrox', 'ambrox' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
        $elements_manager->add_category(
            'ambrox_footer_elements',
            [
                'title' => __( 'Ambrox Footer Elements', 'ambrox' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'ambrox_header_elements',
            [
                'title' => __( 'Ambrox Header Elements', 'ambrox' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

	}

}

Ambrox_Extension::instance();