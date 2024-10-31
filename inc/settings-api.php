<?php

/**
 * Plugin Name: WordPress Settings API
 * Plugin URI: http://tareq.sanchari.com/2012/06/wordpress-settings-api-php-class/
 * Description: WordPress Settings API testing
 * Author: Tareq Hasan
 * Author URI: http://tareq.weDevs.com
 * Version: 0.1
 */
 
require_once dirname( __FILE__ ) . '/class.settings-api.php';

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('sanchari_tesi_settings_api' ) ):
class sanchari_tesi_settings_api {

    private $settings_api;

    function __construct() {
        $this->settings_api = new sanchari_testimonial_settings_api;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_options_page( 'Sanchari Testimonial', 'Sanchari Testimonial', 'delete_posts', 'sanchari_testimonial_options_page', array($this, 'sanchari_testimonial_plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'sanchari_basics',
                'title' => __( 'Testimonial Options', 'sanchari' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'sanchari_basics' => array(
                array(
                    'name' => 'quote_left_color',
                    'label' => __( 'Quote Left Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color',
                ),
                array(
                    'name' => 'quote_right_color',
                    'label' => __( 'Quote Right Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
                array(
                    'name' => 'single_testimonial_pra_bg',
                    'label' => __( 'Testimonial Paragraf Background', 'sanchari' ),
                    'desc' => __( 'Choose your color from here.', 'sanchari' ),
                    'type' => 'color',
                ),
                array(
                    'name' => 'single_testimonial_pra_color',
                    'label' => __( 'Testimonial Paragraf Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
				 array(
                    'name' => 'testimonial_s_t_h2_color',
                    'label' => __( 'Testimonial Heading Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
				
				 array(
                    'name' => 'testimonial_s_t_h3_color',
                    'label' => __( 'Testimonial Heading three Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
				
				 array(
                    'name' => 'testimonial_column_bg_color',
                    'label' => __( 'Testimonial Column Background Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
				
				 array(
                    'name' => 'owl_carousel_navigation_left',
                    'label' => __( 'Carousel Left Navigation Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
				 array(
                    'name' => 'owl_carousel_navigation_right',
                    'label' => __( 'Carousel right Navigation Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                ),
				 array(
                    'name' => 'owl_carousel_controls_botton_bg',
                    'label' => __( 'Carousel Controls Botton Color', 'sanchari' ),
                    'desc' => __( 'Choose your color from here', 'sanchari' ),
                    'type' => 'color'
                )
				
            )
        );

        return $settings_fields;
    }

    function sanchari_testimonial_plugin_page() {
        echo '<div style="margin-top:20px;margin-right:20px;" class="cfb_adds"><a href="http://arnabportfolio.blogspot.in/" target="_blank"><img style="Width:100%;height:auto;" src="'.SANCHARI_TESTIMONIAL_FREE.'/images/adds1.jpg" alt=""></a></div>';
        echo '<div class="wrap">';
			$this->settings_api->show_navigation();
			$this->settings_api->show_forms();
		echo '</div>';
        echo '<div style="margin-top:20px;margin-right:20px;" class="cfb_adds"><a href="http://arnabportfolio.blogspot.in/" target="_blank"><img style="Width:100%;height:auto;" src="'.SANCHARI_TESTIMONIAL_FREE.'/images/adds2.jpg" alt=""></a></div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

$settings = new sanchari_tesi_settings_api();