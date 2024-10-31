<?php
function login_formo_css() {?>
	<style type="text/css">
	  
	   .testimonial_all:before{color:<?php echo sanchari_get_option('quote_left_color' ,'sanchari_basics','true');?>;}
		
		.testimonial_all:after{color:<?php echo sanchari_get_option('quote_right_color' ,'sanchari_basics','true');?>;}
		
		div.pra,div.pra:before{background:<?php echo sanchari_get_option('single_testimonial_pra_bg' ,'sanchari_basics','true');?>;}
		
		div.pra{color:<?php echo sanchari_get_option('single_testimonial_pra_color' ,'sanchari_basics','true');?>;}
		
		.testimonial_column h2.s_t_h2{color:<?php echo sanchari_get_option('testimonial_s_t_h2_color' ,'sanchari_basics','true');?>;}
		
		div.single_testimonial h3.s_t_h3{color:<?php echo sanchari_get_option('testimonial_s_t_h3_color' ,'sanchari_basics','true');?>;}
		
		div.testimonial_column{background:<?php echo sanchari_get_option('testimonial_column_bg_color' ,'sanchari_basics','true');?>;}
		
	
		div.testimonial_column div.custom_owl_theme_one.owl-carousel .owl-controls .owl-buttons .owl-prev{background:<?php echo sanchari_get_option('owl_carousel_navigation_left' ,'sanchari_basics','true');?>;}
		
		div.custom_owl_theme_one.owl-carousel .owl-controls .owl-buttons .owl-next{background:<?php echo sanchari_get_option('owl_carousel_navigation_right' ,'sanchari_basics','true');?>;}
		
		div.custom_owl_theme_one .owl-controls .owl-page span{background:<?php echo sanchari_get_option('owl_carousel_controls_botton_bg' ,'sanchari_basics','true');?>;}
		
		
		
		
	</style>
<?php
}
add_action('wp_head', 'login_formo_css');