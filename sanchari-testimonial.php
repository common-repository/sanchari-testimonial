<?php
/*
Plugin Name: Sanchari Testimonial
Plugin URI: http://etwoz.hostingsiteforfree.com/responsive-video-ultimate/
Description: This plugin will enable Testimonial in any wordpress site.You can set this Testimonial everywhere in your site using shortcode. It has an awesome option panel. With this option panel you can manage Testimonial very easily and effectively.
Author: Arnab Kumar Halder
Version: 1.0
Author URI: http://arnabportfolio.blogspot.in/
*/

// Wordpress jQuery

function sanchari_testimonial_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'sanchari_testimonial_jquery');

// Some Setup

define('SANCHARI_TESTIMONIAL_FREE', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );


                                  //js files
// owl.carousel js file

wp_enqueue_script('owl-carousel-js', SANCHARI_TESTIMONIAL_FREE.'js/owl.carousel.js', array( 'jquery' ), '1.1', TRUE );





                                   //css files
								   
// font-awesome css file	
wp_enqueue_style('font-awesome-style', SANCHARI_TESTIMONIAL_FREE.'css/font-awesome.css');
						   
								   
// owl.carousel css file
wp_enqueue_style('owl-carousel-style', SANCHARI_TESTIMONIAL_FREE.'css/owl.carousel.css');

// owl.transitions css file
wp_enqueue_style('owl-transitions-style', SANCHARI_TESTIMONIAL_FREE.'css/owl.transitions.css');

// custom_owl_theme css file
wp_enqueue_style('custom-owl-theme-style', SANCHARI_TESTIMONIAL_FREE.'css/custom_owl_theme.css');


// testimonial_style css file
wp_enqueue_style('testimonial-style', SANCHARI_TESTIMONIAL_FREE.'css/testimonial_style.css');


// This code will enable  Shortcodes in WordPress Text Widget add this code to functions.php
add_filter('widget_text', 'do_shortcode');

# Register Custom Post Type

function sanchari_testimonial_post_type() {
	register_post_type( 'sanchari_testimonial',
		array(
			'labels' => array(
				'name' => __( 'Testimonial' ),
				'singular_name' => __( 'Testimonial' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Testimonial' ),
				'edit_item' => __( 'Edit Testimonial' ),
				'new_item' => __( 'New Testimonial' ),
				'view_item' => __( 'View Testimonial' ),
				'not_found' => __( 'Sorry, we couldn\'t find the Testimonial you are looking for.' )
			),
		'public' => true,
		'menu_icon' => ('dashicons-book-alt'),
		'publicly_queryable' => false,
		'exclude_from_search' => true,
		'menu_position' => 15,
		'has_archive' => false,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'testimonial' ),
		'supports' => array( 'title', 'editor', 'thumbnail' , 'custom-fields')
		)
	);
	
}
add_action( 'init', 'sanchari_testimonial_post_type' );

//wp_theme_post-thumbnails

add_theme_support( 'post-thumbnails', array( 'sanchari_testimonial' ) );
//wp_theme_feature_img

add_image_size( 'client_photo', 150, 150, true );


# Register Taxonomy

function sanchari_testimonial_taxonomy() {
	register_taxonomy(
		'testimonial_cat',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'sanchari_testimonial',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Testimonial Category',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
				'slug' 			=> 'testimonial-category', // This controls the base slug that will display before each term
				'with_front' 	=> false // Don't display the category base before
				)
			)
	);
}
add_action( 'init', 'sanchari_testimonial_taxonomy');



# Register Shortcode and Query post/custom-post to Rotate Sanchari Testimonial

function sanchari_testimonial_shortcode($atts){
	extract( shortcode_atts( array(
		'count' => '5',
		'category' => '',
	), $atts, 'sanchari_testi_shortcode' ) );
	
    $q = new WP_Query(
        array('post_type' => 'sanchari_testimonial','posts_per_page' => $count, 'testimonial_cat' => $category,)
        );		
		
	$list = '<div class="testimonial_column"> 
			<h2 class="s_t_h2">Client Testimonials</h2>
			<div class="testimonial_all">
			';
	
	
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$testi_web_name = get_post_meta($idd, 'testi_web_name', true);
		$testi_web_link = get_post_meta($idd, 'testi_web_link', true);
		$list .= '
			<div class="single_testimonial">
				'.get_the_post_thumbnail($idd, 'client_photo').'
				<h3 class="s_t_h3">'.get_the_title().'</h3>
				 <a href="'.$testi_web_link.'" target="_blank" class="testi_link">'.$testi_web_name.'</a>
				  <div class="pra"><p>'.get_the_excerpt().'</p></div>
			</div>
			
		';        
	endwhile;
	$list.= '</div></div>';
	wp_reset_query();
	return $list;
}
add_shortcode('sanchari_testi_shortcode', 'sanchari_testimonial_shortcode');



//Control post Excerpt in WordPress from functions.php (this code for length)
function new_excerpt_length($length) {
return 100; //5 this nubmber is word number
}
add_filter('excerpt_length', 'new_excerpt_length');



function new_excerpt_more( $more ) {            //(this code for readmore)
return ' <a class="readmore" href="'. get_permalink( get_the_ID() ).'"></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );







    
   /* Custom-Metaboxes-and-Fields-for-WordPress-master */
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'inc/cmb/init.php';
}

 //custom_meta_box
     
include_once( 'inc/custom_meta_box.php' );


// options panel css

require_once('css/style.php');

// options_js

require_once('js/options_js.php');

// options panel  Framework
require_once('inc/class.settings-api.php');

require_once('inc/settings-api.php');


//Functin for settings panel (note: Dont Try to edit this code its can be hurm your website)
function sanchari_get_option( $option, $section, $default = '' ) { 
    $options = get_option( $section ); 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    } 
    return $default;
}








 // Hooks your functions into the correct filters
function my_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'my_register_mce_button' );
	}
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugin_dir_url( __FILE__ ) .'/js/mce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}



// my-mce-botton-style
wp_enqueue_style('my-mce-botton-style', SANCHARI_TESTIMONIAL_FREE.'css/my-mce-style.css');



?>







