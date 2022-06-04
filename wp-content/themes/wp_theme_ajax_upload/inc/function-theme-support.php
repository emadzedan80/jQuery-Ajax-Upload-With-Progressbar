<?php
// Theme Support =================================
function ta_theme_features()
{
	//Enable Post Thumbnail
	add_theme_support('post-thumbnails');
	//Add Your Own Custom THumbnails Sizes
	add_image_size('postThumb', 600, 300, true);
	add_image_size('tutorThumb', 60, 60, true);
	//Define Logo In The Custimze Sidebar
	$defaults = array(
		'height'               => 70,
		'width'                => 200,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('Basic WordPress Theme', 'Starter Template'),
		'unlink-homepage-logo' => true,
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'ta_theme_features');
// End of Theme Support ==========================