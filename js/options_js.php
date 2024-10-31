
<?php
function sanchari_testimonial_dynamic_js() {?>


	<script type="text/javascript">
	jQuery(document).ready(function() {
     
		jQuery(".testimonial_all").owlCarousel({
			  pagination : false,
			  singleItem : true,
			  responsive : true,
			  theme: "custom_owl_theme_one",
			  autoPlay : false ,
			  navigation : true ,
			 navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			  pagination : true,
			  transitionStyle : "goDown",
		   });
     
    });
	</script>
<?php
}
add_action('wp_footer', 'sanchari_testimonial_dynamic_js');









