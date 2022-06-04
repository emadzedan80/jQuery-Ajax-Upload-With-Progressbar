<?php
//this if statement enables using sessions in PHP
if (!session_id()) {
	session_start();
}

require get_template_directory() . '/inc/function-frontend-styles.php';
require get_template_directory() . '/inc/function-frontend-scripts.php';
require get_template_directory() . '/inc/function-theme-support.php';