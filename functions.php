<?php
function create_entry_post_type() {
	register_post_type( 'beta_sprint_entry',
		array(
			'labels' => array(
				'name' => __( 'Beta Sprint Entries' ),
				'singular_name' => __( 'Beta Sprint Entry' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'entries'),
            'supports' => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments'
            )
        )
	);
}
function modify_pages() {
    register_taxonomy_for_object_type('category', 'page'); 
    register_taxonomy_for_object_type('category', 'beta_sprint_entry'); 
    add_post_type_support('page', 'excerpt');
}
function create_calendar_iframe($attributes) {
	extract( shortcode_atts( array(
		'height' => '450',
		'width' => '650',
		'src' => 'en.usa#holiday@group.v.calendar.google.com',
		'bgcolor' => 'FFFFFF',
		'color' => 'A32929',
		'mode' => 'MONTH'
	), $attributes ) );
	if (!empty($src)) {
		$src = 'src='.urlencode($src).'&amp;';
	}

    $src = '<iframe class="google-calendar" src="https://www.google.com/calendar/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height='.urlencode($height).'&amp;wkst=1&amp;mode='.urlencode(strtoupper($mode)).'&amp;bgcolor=%23'.urlencode($bgcolor).'&amp;'.$src.'color=%23'.urlencode($color).'&amp;ctz=America%2FNew_York" style=" border-width:0 " height="'.htmlentities($height).'" width="'.htmlentities($width).'" frameborder="0" scrolling="no"></iframe>';

	return $src;
}

function dpla_iframe( $atts ){
        extract( shortcode_atts( array(
                'width' => '250',
                'height' => '156',
                'url' => ''
                ), $atts ) 
        );
        $output = '<iframe src=" ' . esc_attr($url) . '" allowfullscreen="" width="'. esc_attr($width) . '" frameborder="0" height="' . esc_attr($height) . '" ></iframe>';
        return $output;
}

add_shortcode( 'dplaiframe', 'dpla_iframe' );

add_action( 'init', 'create_entry_post_type' );
add_action( 'init', 'modify_pages' );
add_shortcode( 'google-calendar', 'create_calendar_iframe' );
add_filter('widget_text', 'do_shortcode');
?>
