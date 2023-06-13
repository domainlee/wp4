<?php
/**
* @version  1.0
* @package  Ambrox
* @author   Validthemes <support@angfuzsoft.com>
*
* Websites: http://www.angfuzsoft.com
*
*/

/**************************************
* Creating Gallery Widget
***************************************/

class ambrox_gallery_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'ambrox_gallery_widget',

                // Widget name will appear in UI
                esc_html__( 'Ambrox :: Gallery', 'ambrox' ),

                // Widget description
                array(
                    'classname'                     => '',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Gallery Widget', 'ambrox' ),
                )
            );
        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title      = apply_filters( 'widget_title', $instance['title'] );

            //before and after widget arguments are defined by themes
            echo $args['before_widget'];

                if( !empty( $title  ) ){
                    echo $args['before_title'];
                        echo esc_html( $title );
                    echo $args['after_title'];
                }
				$ambrox_gallery_image = ambrox_opt( 'ambrox_gallery_image_widget' );

				if( !empty( $ambrox_gallery_image ) && isset( $ambrox_gallery_image ) ){
					echo '<div class="widget-gallery">';
						foreach( $ambrox_gallery_image as $single_image ){
							echo '<div class="gallery-thumb">';
								echo '<a class="popup-image" href="'.esc_url( $single_image['url'] ).'"><img src="'.esc_url( $single_image['url'] ).'" alt="'.esc_html__('Gallery Image', 'ambrox').'" class="w-100"></a>';
							echo '</div>';
						}
					echo '</div>';
				}

            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html__( 'Title:' ,'ambrox'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				<a href="<?php echo esc_url( home_url('/').'wp-admin/admin.php?page=Ambrox&tab=15' );?>"><?php esc_html__( 'Add Gallery Image', 'ambrox' )?></a>
            </p>

            <?php
        }


        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title'] 	        = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

            return $instance;
        }
    } // Class ambrox_gallery_widget ends here


    // Register and load the widget
    function ambrox_gallery_widget() {
        register_widget( 'ambrox_gallery_widget' );
    }
    add_action( 'widgets_init', 'ambrox_gallery_widget' );