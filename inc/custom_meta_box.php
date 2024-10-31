<?php

function be_sample_metaboxes( $meta_boxes ) {
        $meta_boxes['test_metabox'] = array(
            'id' => 'test_metabox',
            'title' => 'sanchari testimonial ',
            'pages' => array('sanchari_testimonial'),
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true, // Show field names on the left
            'fields' => array(
                array(
                    'name' => 'testimonial website name ',
                    'desc' => 'enter testimonial website name (optional)',
                    'id' => 'testi_web_name',
                    'type' => 'text'
                ),
				 array(
                    'name' => 'testimonial website link ',
                    'desc' => 'enter testimonial website link (optional)',
                    'id' => 'testi_web_link',
                    'type' => 'text'
                )
            ),
        );
     
        return $meta_boxes;
    }
    add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );
     
     
    ?>