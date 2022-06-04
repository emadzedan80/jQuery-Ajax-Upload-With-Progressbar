<?php
// Javascript=====================================
function gemini_tutorials_register_scripts()
{
	//All You Need From jQuery and bootstarp
	wp_enqueue_script('gemini-tutorials-jquery', "https://code.jquery.com/jquery-3.6.0.min.js", array(), '3.6.0', true);
	wp_enqueue_script('gemini-tutorials-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js", array('gemini-tutorials-jquery'), '4.6.1', true);
	wp_enqueue_script('gemini-tutorials-jquery-ui', "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap'), '1.12.1', true);
	wp_enqueue_script('gemini-tutorials-jquery-ui-touch-punch', "https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui'), '0.2.3', true);
	wp_enqueue_script('gemini-tutorials-jquery-easing', "https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui', 'gemini-tutorials-jquery-ui-touch-punch'), '2.2.1', true);

	//Library for easy cookies setting and getting: https://github.com/js-cookie/js-cookie
	wp_enqueue_script('gemini-tutorials-cookie', "https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui', 'gemini-tutorials-jquery-ui-touch-punch', 'gemini-tutorials-jquery-easing'), '2.2.1', true);

	//Theme Custom javascript
	if (is_front_page()) {
		wp_enqueue_script('gemini-version1-js', get_template_directory_uri() . "/assets/js/version1.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui', 'gemini-tutorials-jquery-ui-touch-punch', 'gemini-tutorials-jquery-easing', 'gemini-tutorials-cookie'), '1.0.0', true);
	}
	if (is_home()) {
		wp_enqueue_script('gemini-version2-js', get_template_directory_uri() . "/assets/js/version2.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui', 'gemini-tutorials-jquery-ui-touch-punch', 'gemini-tutorials-jquery-easing', 'gemini-tutorials-cookie'), '1.0.0', true);
	}
	global $template;
	if (basename( $template ) === 'template-version3.php') {
		wp_enqueue_script('gemini-version3-js', get_template_directory_uri() . "/assets/js/version3.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui', 'gemini-tutorials-jquery-ui-touch-punch', 'gemini-tutorials-jquery-easing', 'gemini-tutorials-cookie'), '1.0.0', true);
	}
	if (basename( $template ) === 'template-version4.php') {
		wp_enqueue_script('gemini-version4-js', get_template_directory_uri() . "/assets/js/version4.js", array('gemini-tutorials-jquery', 'gemini-tutorials-bootstrap', 'gemini-tutorials-jquery-ui', 'gemini-tutorials-jquery-ui-touch-punch', 'gemini-tutorials-jquery-easing', 'gemini-tutorials-cookie'), '1.0.0', true);
	}
}

add_action('wp_enqueue_scripts', 'gemini_tutorials_register_scripts');
// End of Javascript==============================