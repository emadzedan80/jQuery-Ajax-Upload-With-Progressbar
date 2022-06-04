<?php
// Styles=========================================
function gemini_tutorials_register_styles()
{
	//Reset All CSS for All Browswers Defaults
	wp_enqueue_style('gemini-tutorials-reset', "https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css", array(), '2.0', 'all');
	//Font Awesome
	wp_enqueue_style('gemini-tutorials-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
	//Bootstrap CSS 4.6.1
	wp_enqueue_style('gemini-tutorials-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css", array(), '4.6.1', 'all');
	//https://animate.style
	wp_enqueue_style('gemini-tutorials-animate', "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css", array(), '4.1.1', 'all');
	//Theme Custom CSS
	wp_enqueue_style('gemini-tutorials-css', get_template_directory_uri() . "/assets/css/css.css", array('gemini-tutorials-reset', 'gemini-tutorials-bootstrap', 'gemini-tutorials-fontawesome', 'gemini-tutorials-animate'), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'gemini_tutorials_register_styles');
// End of Styles==================================